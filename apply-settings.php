<?php
/**
 * DohaQuest WordPress Settings Setup
 * Run via: wp eval-file apply-settings.php
 */

// Install WordPress if not installed
if (!is_blog_installed()) {
    $site_url = getenv('WORDPRESS_SITE_URL') ?: ('https://' . ($_SERVER['HTTP_HOST'] ?? 'localhost'));
    wp_install(
        'DohaQuest Theme Park',
        getenv('WP_ADMIN_USER') ?: 'admin',
        getenv('WP_ADMIN_EMAIL') ?: 'admin@dohaquest.com',
        true,
        '',
        getenv('WP_ADMIN_PASSWORD') ?: 'Admin@12345'
    );
    echo "WordPress installed!\n";
}

// Update site URL
$site_url = 'https://' . ($_SERVER['HTTP_HOST'] ?? 'localhost');
update_option('siteurl', $site_url);
update_option('home', $site_url);
echo "Site URL set to: $site_url\n";

// Activate theme
switch_theme('dohaquest');
echo "Theme activated: dohaquest\n";

// Set permalink structure
update_option('permalink_structure', '/%postname%/');
flush_rewrite_rules();
echo "Permalinks set!\n";

// Set timezone
update_option('timezone_string', 'Asia/Qatar');
update_option('time_format', 'g:i A');
update_option('date_format', 'F j, Y');

// Set blog description
update_option('blogdescription', "Qatar's Largest Indoor Theme Park");
update_option('blogname', 'DohaQuest');

// Disable comments
update_option('default_comment_status', 'closed');
update_option('default_ping_status', 'closed');

// Create pages
$pages = [
    'home'               => ['DohaQuest Home', 'en'],
    'rides'              => ['Rides & Attractions', 'en'],
    'characters'         => ['Characters', 'en'],
    'shows'              => ['Shows', 'en'],
    'ifly'               => ['iFly', 'en'],
    'park'               => ['Park Map', 'en'],
    'dine'               => ['Dine', 'en'],
    'visit'              => ['Plan Your Visit', 'en'],
    'faqs'               => ['FAQs', 'en'],
    'celebrate'          => ['Celebrate', 'en'],
    'corporate-bookings' => ['Corporate Bookings', 'en'],
    'school-bookings'    => ['School Bookings', 'en'],
    'who-we-are'         => ['Who We Are', 'en'],
    'awards'             => ['Awards', 'en'],
    'contact'            => ['Contact Us', 'en'],
    'tickets'            => ['Book Tickets', 'en'],
    'privacy'            => ['Privacy Policy', 'en'],
    'terms'              => ['Terms and Conditions', 'en'],
    'gift-cards'         => ['Gift Cards', 'en'],
];

foreach ($pages as $slug => $info) {
    $existing = get_page_by_path($slug);
    if (!$existing) {
        $page_id = wp_insert_post([
            'post_title'   => $info[0],
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '',
        ]);
        echo "Created page: $slug (ID: $page_id)\n";
    }
}

// Set front page
$home_page = get_page_by_path('home');
if ($home_page) {
    update_option('show_on_front', 'page');
    update_option('page_on_front', $home_page->ID);
    echo "Front page set to: home\n";
}

// Create custom tables
global $wpdb;
$charset = $wpdb->get_charset_collate();

require_once ABSPATH . 'wp-admin/includes/upgrade.php';

dbDelta("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}dq_bookings (
    id bigint(20) NOT NULL AUTO_INCREMENT,
    name varchar(200) NOT NULL,
    email varchar(200) NOT NULL,
    phone varchar(50),
    ticket_type varchar(100),
    quantity int(11) DEFAULT 1,
    date varchar(50),
    card_last4 varchar(4),
    card_name varchar(200),
    status varchar(50) DEFAULT 'pending',
    created_at datetime DEFAULT CURRENT_TIMESTAMP,
    ip varchar(50),
    PRIMARY KEY (id)
) $charset;");

dbDelta("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}dq_subscribers (
    id bigint(20) NOT NULL AUTO_INCREMENT,
    email varchar(200) NOT NULL,
    created_at datetime DEFAULT CURRENT_TIMESTAMP,
    ip varchar(50),
    PRIMARY KEY (id)
) $charset;");

echo "Custom tables created!\n";
echo "Setup complete!\n";
