<?php
// Support both MYSQL* and WORDPRESS_DB_* environment variables
$db_name = getenv('MYSQLDATABASE') ?: getenv('WORDPRESS_DB_NAME') ?: 'wordpress';
$db_user = getenv('MYSQLUSER') ?: getenv('WORDPRESS_DB_USER') ?: 'root';
$db_pass = getenv('MYSQLPASSWORD') ?: getenv('WORDPRESS_DB_PASSWORD') ?: '';
$db_host = getenv('MYSQLHOST') ?: getenv('WORDPRESS_DB_HOST') ?: 'localhost';
$db_port = getenv('MYSQLPORT') ?: '3306';

define('DB_NAME', $db_name);
define('DB_USER', $db_user);
define('DB_PASSWORD', $db_pass);
define('DB_HOST', $db_host . ':' . $db_port);
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

define('AUTH_KEY',         'dohaquest-auth-key-2026-xK9mP2qR');
define('SECURE_AUTH_KEY',  'dohaquest-secure-auth-key-2026-nL7vJ4wS');
define('LOGGED_IN_KEY',    'dohaquest-logged-in-key-2026-bH5tF8eQ');
define('NONCE_KEY',        'dohaquest-nonce-key-2026-cG3uD6yT');
define('AUTH_SALT',        'dohaquest-auth-salt-2026-mN1sA9zU');
define('SECURE_AUTH_SALT', 'dohaquest-secure-auth-salt-2026-pO2rB7xV');
define('LOGGED_IN_SALT',   'dohaquest-logged-in-salt-2026-qP4tC5wW');
define('NONCE_SALT',       'dohaquest-nonce-salt-2026-rQ6uD3vX');

$table_prefix = 'wp_';

define('WP_DEBUG', false);
define('WP_DEBUG_LOG', false);

// Dynamic site URL based on request
$site_url = 'https://' . ($_SERVER['HTTP_HOST'] ?? 'localhost');
define('WP_SITEURL', $site_url);
define('WP_HOME', $site_url);

// Allow uploads
define('ALLOW_UNFILTERED_UPLOADS', true);
define('WP_MEMORY_LIMIT', '256M');

if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}
require_once ABSPATH . 'wp-settings.php';
