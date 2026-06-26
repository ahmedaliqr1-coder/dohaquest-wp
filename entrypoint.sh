#!/bin/bash
set -e

# Run original WordPress entrypoint in background
docker-entrypoint.sh apache2-foreground &
WP_PID=$!

# Wait for WordPress files to be ready
sleep 15

# Wait for MySQL
echo "Waiting for MySQL..."
until mysql -h"$MYSQLHOST" -P"${MYSQLPORT:-3306}" -u"$MYSQLUSER" -p"$MYSQLPASSWORD" -e "SELECT 1" &>/dev/null; do
    sleep 2
done
echo "MySQL ready!"

# Check if WordPress is already installed
if ! wp --allow-root --path=/var/www/html core is-installed 2>/dev/null; then
    echo "Installing WordPress..."
    
    # Import database
    if [ -f /var/www/html/init.sql ]; then
        mysql -h"$MYSQLHOST" -P"${MYSQLPORT:-3306}" -u"$MYSQLUSER" -p"$MYSQLPASSWORD" "$MYSQLDATABASE" < /var/www/html/init.sql
        echo "Database imported!"
    fi
    
    # Run settings script
    wp --allow-root --path=/var/www/html eval-file /var/www/html/apply-settings.php 2>/dev/null || true
    echo "Settings applied!"
fi

# Keep container running
wait $WP_PID
