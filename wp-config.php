<?php
define('DB_NAME', getenv('MYSQLDATABASE') ?: 'wordpress');
define('DB_USER', getenv('MYSQLUSER') ?: 'root');
define('DB_PASSWORD', getenv('MYSQLPASSWORD') ?: '');
define('DB_HOST', (getenv('MYSQLHOST') ?: 'localhost') . ':' . (getenv('MYSQLPORT') ?: '3306'));
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

define('AUTH_KEY',         'dohaquest-auth-key-2026');
define('SECURE_AUTH_KEY',  'dohaquest-secure-auth-key-2026');
define('LOGGED_IN_KEY',    'dohaquest-logged-in-key-2026');
define('NONCE_KEY',        'dohaquest-nonce-key-2026');
define('AUTH_SALT',        'dohaquest-auth-salt-2026');
define('SECURE_AUTH_SALT', 'dohaquest-secure-auth-salt-2026');
define('LOGGED_IN_SALT',   'dohaquest-logged-in-salt-2026');
define('NONCE_SALT',       'dohaquest-nonce-salt-2026');

$table_prefix = 'wp_';

define('WP_DEBUG', false);
define('WP_SITEURL', 'https://' . ($_SERVER['HTTP_HOST'] ?? 'localhost'));
define('WP_HOME', 'https://' . ($_SERVER['HTTP_HOST'] ?? 'localhost'));

// Allow uploads
define('ALLOW_UNFILTERED_UPLOADS', true);

if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}
require_once ABSPATH . 'wp-settings.php';
