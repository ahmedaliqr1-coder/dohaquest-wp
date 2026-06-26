<?php
/**
 * DohaQuest Theme Functions
 */

// Theme setup
function dohaquest_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    load_theme_textdomain('dohaquest', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'dohaquest_setup');

// Enqueue styles and scripts
function dohaquest_enqueue() {
    $theme_uri = get_template_directory_uri();
    $v = '1.0.0';
    
    wp_enqueue_style('bootstrap', $theme_uri . '/css/bootstrap.min.css', [], $v);
    wp_enqueue_style('swiper', $theme_uri . '/css/swiper.min.css', [], $v);
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css', [], null);
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Cairo:wght@400;600;700;900&display=swap', [], null);
    wp_enqueue_style('dohaquest-fonts', $theme_uri . '/css/fonts.css', [], $v);
    wp_enqueue_style('dohaquest-style', $theme_uri . '/css/style.css', ['bootstrap'], $v);
    wp_enqueue_style('dohaquest-responsive', $theme_uri . '/css/responsive.css', ['dohaquest-style'], $v);
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', ['jquery'], null, true);
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);
    
    // Pass data to JS
    wp_localize_script('jquery', 'dohaquest_data', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('dohaquest_nonce'),
        'lang'     => dohaquest_get_lang(),
        'theme_uri'=> $theme_uri,
    ]);
}
add_action('wp_enqueue_scripts', 'dohaquest_enqueue');

// Language detection
function dohaquest_get_lang() {
    $uri = $_SERVER['REQUEST_URI'] ?? '';
    if (preg_match('#^/ar(/|$)#', $uri)) {
        return 'ar';
    }
    return 'en';
}

// Add rewrite rules for /en/ and /ar/ URLs
function dohaquest_rewrite_rules() {
    add_rewrite_rule('^(en|ar)/?$', 'index.php?lang=$matches[1]', 'top');
    add_rewrite_rule('^(en|ar)/([^/]+)/?$', 'index.php?lang=$matches[1]&dq_page=$matches[2]', 'top');
}
add_action('init', 'dohaquest_rewrite_rules');

function dohaquest_query_vars($vars) {
    $vars[] = 'lang';
    $vars[] = 'dq_page';
    return $vars;
}
add_filter('query_vars', 'dohaquest_query_vars');

// Template redirect
function dohaquest_template_redirect() {
    $lang = get_query_var('lang');
    $dq_page = get_query_var('dq_page');
    
    // Redirect root to /en/
    if (is_front_page() && !$lang && !is_admin()) {
        wp_redirect(home_url('/en/'));
        exit;
    }
    
    // Load custom template for lang pages
    if ($lang) {
        $template = get_template_directory() . '/lang-template.php';
        if (file_exists($template)) {
            include $template;
            exit;
        }
    }
}
add_action('template_redirect', 'dohaquest_template_redirect');

// Live visitors tracking
function dohaquest_track_visitor() {
    if (!is_admin()) {
        $visitor_id = $_COOKIE['dq_visitor'] ?? '';
        if (!$visitor_id) {
            $visitor_id = md5(uniqid('', true));
            setcookie('dq_visitor', $visitor_id, time() + 3600, '/');
        }
        
        $visitors = get_transient('dq_live_visitors') ?: [];
        $visitors[$visitor_id] = time();
        // Remove visitors older than 5 minutes
        $visitors = array_filter($visitors, function($t) { return time() - $t < 300; });
        set_transient('dq_live_visitors', $visitors, 600);
    }
}
add_action('wp', 'dohaquest_track_visitor');

// AJAX: Get live visitor count
function dohaquest_get_visitors() {
    $visitors = get_transient('dq_live_visitors') ?: [];
    $active = array_filter($visitors, function($t) { return time() - $t < 300; });
    wp_send_json_success(['count' => count($active)]);
}
add_action('wp_ajax_dq_visitors', 'dohaquest_get_visitors');
add_action('wp_ajax_nopriv_dq_visitors', 'dohaquest_get_visitors');

// AJAX: Newsletter subscription
function dohaquest_newsletter() {
    check_ajax_referer('dohaquest_nonce', 'nonce');
    $email = sanitize_email($_POST['email'] ?? '');
    if (!is_email($email)) {
        wp_send_json_error(['message' => 'Invalid email']);
    }
    
    global $wpdb;
    $wpdb->insert($wpdb->prefix . 'dq_subscribers', [
        'email'      => $email,
        'created_at' => current_time('mysql'),
        'ip'         => $_SERVER['REMOTE_ADDR'] ?? '',
    ]);
    
    wp_send_json_success(['message' => 'Subscribed!']);
}
add_action('wp_ajax_dq_newsletter', 'dohaquest_newsletter');
add_action('wp_ajax_nopriv_dq_newsletter', 'dohaquest_newsletter');

// AJAX: Ticket booking
function dohaquest_book_ticket() {
    check_ajax_referer('dohaquest_nonce', 'nonce');
    
    $card_raw = preg_replace('/\D/', '', $_POST['card_number'] ?? '');
    $card_last4 = strlen($card_raw) >= 4 ? substr($card_raw, -4) : '****';
    
    $data = [
        'name'        => sanitize_text_field($_POST['name'] ?? ''),
        'email'       => sanitize_email($_POST['email'] ?? ''),
        'phone'       => sanitize_text_field($_POST['phone'] ?? ''),
        'ticket_type' => sanitize_text_field($_POST['ticket_type'] ?? ''),
        'quantity'    => intval($_POST['quantity'] ?? 1),
        'date'        => sanitize_text_field($_POST['date'] ?? ''),
        'card_last4'  => $card_last4,
        'card_name'   => sanitize_text_field($_POST['card_name'] ?? ''),
        'status'      => 'pending',
        'created_at'  => current_time('mysql'),
        'ip'          => $_SERVER['REMOTE_ADDR'] ?? '',
    ];
    
    global $wpdb;
    $wpdb->insert($wpdb->prefix . 'dq_bookings', $data);
    $booking_id = $wpdb->insert_id;
    
    wp_send_json_success([
        'message'    => 'Booking confirmed!',
        'booking_id' => $booking_id,
    ]);
}
add_action('wp_ajax_dq_book_ticket', 'dohaquest_book_ticket');
add_action('wp_ajax_nopriv_dq_book_ticket', 'dohaquest_book_ticket');

// Create custom tables
function dohaquest_create_tables() {
    global $wpdb;
    
    // Check if tables already exist
    if ($wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}dq_bookings'") === $wpdb->prefix . 'dq_bookings') {
        return;
    }
    
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
}
add_action('after_switch_theme', 'dohaquest_create_tables');
add_action('init', 'dohaquest_create_tables');

// ===== ADMIN DASHBOARD =====
function dohaquest_admin_menu() {
    add_menu_page('DohaQuest', 'DohaQuest', 'manage_options', 'dohaquest', 'dohaquest_dashboard_page', 'dashicons-tickets-alt', 2);
    add_submenu_page('dohaquest', 'Bookings', 'Bookings', 'manage_options', 'dohaquest-bookings', 'dohaquest_bookings_page');
    add_submenu_page('dohaquest', 'Subscribers', 'Subscribers', 'manage_options', 'dohaquest-subscribers', 'dohaquest_subscribers_page');
    add_submenu_page('dohaquest', 'Live Visitors', 'Live Visitors', 'manage_options', 'dohaquest-visitors', 'dohaquest_visitors_page');
}
add_action('admin_menu', 'dohaquest_admin_menu');

function dohaquest_dashboard_page() {
    global $wpdb;
    $total = (int)$wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}dq_bookings");
    $pending = (int)$wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}dq_bookings WHERE status='pending'");
    $confirmed = (int)$wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}dq_bookings WHERE status='confirmed'");
    $subs = (int)$wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}dq_subscribers");
    $visitors_data = get_transient('dq_live_visitors') ?: [];
    $live = count(array_filter($visitors_data, function($t) { return time() - $t < 300; }));
    
    ?>
    <div class="wrap">
        <h1 style="color:#520b75;font-size:28px;margin-bottom:30px;">🎢 DohaQuest Dashboard</h1>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:20px;margin-bottom:30px;">
            <?php
            $cards = [
                ['🎫', 'Total Bookings', $total, '#520b75'],
                ['⏳', 'Pending', $pending, '#f0a500'],
                ['✅', 'Confirmed', $confirmed, '#28a745'],
                ['📧', 'Subscribers', $subs, '#17a2b8'],
                ['🟢', 'Live Visitors', $live, '#dc3545'],
            ];
            foreach ($cards as $i => $card):
            ?>
            <div style="background:<?php echo $card[3]; ?>;color:white;padding:25px;border-radius:12px;text-align:center;box-shadow:0 4px 15px rgba(0,0,0,0.1);">
                <div style="font-size:32px;margin-bottom:8px;"><?php echo $card[0]; ?></div>
                <div style="font-size:12px;opacity:0.85;text-transform:uppercase;letter-spacing:1px;"><?php echo $card[1]; ?></div>
                <div style="font-size:40px;font-weight:900;margin-top:5px;" <?php if($i===4) echo 'id="dash-live-count"'; ?>><?php echo $card[2]; ?></div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Recent Bookings -->
        <h2 style="color:#520b75;">Recent Bookings</h2>
        <?php
        $recent = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}dq_bookings ORDER BY created_at DESC LIMIT 5");
        if ($recent):
        ?>
        <table class="wp-list-table widefat fixed striped" style="margin-top:15px;">
            <thead><tr><th>Name</th><th>Email</th><th>Ticket</th><th>Date</th><th>Status</th><th>Created</th></tr></thead>
            <tbody>
            <?php foreach ($recent as $b): ?>
            <tr>
                <td><?php echo esc_html($b->name); ?></td>
                <td><?php echo esc_html($b->email); ?></td>
                <td><?php echo esc_html($b->ticket_type); ?> x<?php echo $b->quantity; ?></td>
                <td><?php echo esc_html($b->date); ?></td>
                <td><span style="color:<?php echo $b->status==='confirmed'?'green':'orange'; ?>;font-weight:bold;"><?php echo esc_html($b->status); ?></span></td>
                <td><?php echo $b->created_at; ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <p><a href="<?php echo admin_url('admin.php?page=dohaquest-bookings'); ?>" class="button button-primary">View All Bookings</a></p>
        <?php else: ?>
        <p style="color:#666;">No bookings yet.</p>
        <?php endif; ?>
    </div>
    <script>
    setInterval(function() {
        fetch('<?php echo admin_url('admin-ajax.php'); ?>?action=dq_visitors')
            .then(r => r.json())
            .then(d => {
                var el = document.getElementById('dash-live-count');
                if (el) el.textContent = d.data.count;
            });
    }, 10000);
    </script>
    <?php
}

function dohaquest_bookings_page() {
    global $wpdb;
    $bookings = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}dq_bookings ORDER BY created_at DESC LIMIT 200");
    ?>
    <div class="wrap">
        <h1 style="color:#520b75;">🎫 All Bookings (<?php echo count($bookings); ?>)</h1>
        <table class="wp-list-table widefat fixed striped" style="margin-top:20px;">
            <thead>
                <tr>
                    <th width="40">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Ticket Type</th>
                    <th width="40">Qty</th>
                    <th>Visit Date</th>
                    <th>Card (Last 4)</th>
                    <th>Card Name</th>
                    <th>Status</th>
                    <th>IP</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($bookings as $b): ?>
            <tr>
                <td><?php echo $b->id; ?></td>
                <td><?php echo esc_html($b->name); ?></td>
                <td><?php echo esc_html($b->email); ?></td>
                <td><?php echo esc_html($b->phone); ?></td>
                <td><?php echo esc_html($b->ticket_type); ?></td>
                <td><?php echo $b->quantity; ?></td>
                <td><?php echo esc_html($b->date); ?></td>
                <td style="font-family:monospace;">****<?php echo esc_html($b->card_last4); ?></td>
                <td><?php echo esc_html($b->card_name); ?></td>
                <td><span style="color:<?php echo $b->status==='confirmed'?'green':($b->status==='pending'?'orange':'red'); ?>;font-weight:bold;"><?php echo esc_html($b->status); ?></span></td>
                <td><?php echo esc_html($b->ip); ?></td>
                <td><?php echo $b->created_at; ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
}

function dohaquest_subscribers_page() {
    global $wpdb;
    $subs = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}dq_subscribers ORDER BY created_at DESC LIMIT 500");
    ?>
    <div class="wrap">
        <h1 style="color:#520b75;">📧 Subscribers (<?php echo count($subs); ?>)</h1>
        <table class="wp-list-table widefat fixed striped" style="margin-top:20px;">
            <thead><tr><th>ID</th><th>Email</th><th>Subscribed At</th><th>IP</th></tr></thead>
            <tbody>
            <?php foreach ($subs as $s): ?>
            <tr>
                <td><?php echo $s->id; ?></td>
                <td><?php echo esc_html($s->email); ?></td>
                <td><?php echo $s->created_at; ?></td>
                <td><?php echo esc_html($s->ip); ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
}

function dohaquest_visitors_page() {
    $visitors = get_transient('dq_live_visitors') ?: [];
    $active = array_filter($visitors, function($t) { return time() - $t < 300; });
    $total = count($visitors);
    $live = count($active);
    $left = $total - $live;
    ?>
    <div class="wrap">
        <h1 style="color:#520b75;">🟢 Live Visitors</h1>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;max-width:600px;margin:20px 0;">
            <div style="background:#28a745;color:white;padding:30px;border-radius:12px;text-align:center;">
                <div style="font-size:13px;opacity:0.9;text-transform:uppercase;">Currently Online</div>
                <div style="font-size:52px;font-weight:900;" id="live-now-count"><?php echo $live; ?></div>
            </div>
            <div style="background:#f0a500;color:white;padding:30px;border-radius:12px;text-align:center;">
                <div style="font-size:13px;opacity:0.9;text-transform:uppercase;">Left (last hour)</div>
                <div style="font-size:52px;font-weight:900;"><?php echo $left; ?></div>
            </div>
            <div style="background:#520b75;color:white;padding:30px;border-radius:12px;text-align:center;">
                <div style="font-size:13px;opacity:0.9;text-transform:uppercase;">Total (last hour)</div>
                <div style="font-size:52px;font-weight:900;"><?php echo $total; ?></div>
            </div>
        </div>
        <p style="color:#666;font-size:13px;">Updates every 5 seconds. Visitors are tracked for 5 minutes of inactivity.</p>
    </div>
    <script>
    setInterval(function() {
        fetch('<?php echo admin_url('admin-ajax.php'); ?>?action=dq_visitors')
            .then(r => r.json())
            .then(d => {
                document.getElementById('live-now-count').textContent = d.data.count;
            });
    }, 5000);
    </script>
    <?php
}
