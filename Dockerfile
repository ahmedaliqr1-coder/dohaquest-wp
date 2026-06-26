FROM wordpress:6.7-php8.3-apache

# Install tools
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    less \
    curl \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install WP-CLI
RUN curl -o /usr/local/bin/wp https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x /usr/local/bin/wp

# Enable mod_rewrite
RUN a2enmod rewrite && sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Copy theme
COPY wp-content/themes/dohaquest /var/www/html/wp-content/themes/dohaquest

# Copy scripts
COPY init.sql /var/www/html/init.sql
COPY apply-settings.php /var/www/html/apply-settings.php
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Permissions
RUN chown -R www-data:www-data /var/www/html/wp-content \
    && chmod -R 755 /var/www/html/wp-content

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["apache2-foreground"]
