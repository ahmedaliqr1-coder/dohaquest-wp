#!/bin/bash
# This script runs in background after Apache starts

echo "=== DohaQuest Setup Script Starting ==="

# Wait for Apache to start
sleep 20

echo "Waiting for MySQL connection..."
MAX_TRIES=60
TRIES=0
while [ $TRIES -lt $MAX_TRIES ]; do
    if php -r "
        \$conn = @mysqli_connect(
            getenv('MYSQLHOST') ?: getenv('WORDPRESS_DB_HOST'),
            getenv('MYSQLUSER') ?: getenv('WORDPRESS_DB_USER'),
            getenv('MYSQLPASSWORD') ?: getenv('WORDPRESS_DB_PASSWORD'),
            getenv('MYSQLDATABASE') ?: getenv('WORDPRESS_DB_NAME'),
            (int)(getenv('MYSQLPORT') ?: 3306)
        );
        if (\$conn) { echo 'ok'; mysqli_close(\$conn); exit(0); }
        exit(1);
    " 2>/dev/null | grep -q 'ok'; then
        echo "MySQL is ready!"
        break
    fi
    TRIES=$((TRIES + 1))
    echo "Waiting for MySQL... attempt $TRIES/$MAX_TRIES"
    sleep 3
done

if [ $TRIES -eq $MAX_TRIES ]; then
    echo "ERROR: Could not connect to MySQL"
    exit 0
fi

# Check if WordPress is already installed
if wp --allow-root --path=/var/www/html core is-installed 2>/dev/null; then
    echo "WordPress already installed"
    exit 0
fi

echo "Setting up WordPress for first time..."

# Import database
if [ -f /var/www/html/init.sql ]; then
    echo "Importing database..."
    php -r "
        \$host = getenv('MYSQLHOST') ?: getenv('WORDPRESS_DB_HOST');
        \$user = getenv('MYSQLUSER') ?: getenv('WORDPRESS_DB_USER');
        \$pass = getenv('MYSQLPASSWORD') ?: getenv('WORDPRESS_DB_PASSWORD');
        \$db = getenv('MYSQLDATABASE') ?: getenv('WORDPRESS_DB_NAME');
        \$port = (int)(getenv('MYSQLPORT') ?: 3306);
        \$conn = mysqli_connect(\$host, \$user, \$pass, \$db, \$port);
        if (!\$conn) { echo 'DB connection failed: ' . mysqli_connect_error(); exit(1); }
        \$sql = file_get_contents('/var/www/html/init.sql');
        mysqli_multi_query(\$conn, \$sql);
        do { mysqli_store_result(\$conn); } while (mysqli_next_result(\$conn));
        echo 'DB imported successfully';
        mysqli_close(\$conn);
    " 2>&1
    echo "Database import done!"
fi

# Apply settings
if [ -f /var/www/html/apply-settings.php ]; then
    echo "Applying settings..."
    wp --allow-root --path=/var/www/html eval-file /var/www/html/apply-settings.php 2>&1 || true
    echo "Settings applied!"
fi

echo "=== Setup Complete ==="
