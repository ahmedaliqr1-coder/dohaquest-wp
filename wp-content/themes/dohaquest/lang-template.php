<?php
/**
 * Language-based template router
 * Handles /en/ and /ar/ URL routing
 */

$lang = get_query_var('lang') ?: 'en';
$dq_page = get_query_var('dq_page') ?: '';
$is_ar = ($lang === 'ar');
$base = home_url('/' . $lang);

// Set global variables for use in templates
$GLOBALS['dq_lang'] = $lang;
$GLOBALS['dq_is_ar'] = $is_ar;
$GLOBALS['dq_base'] = $base;

// Route to correct page template
if (empty($dq_page) || $dq_page === 'home') {
    // Homepage
    include get_template_directory() . '/index.php';
} else {
    // Check for specific page template
    $page_template = get_template_directory() . '/pages/' . $dq_page . '.php';
    if (file_exists($page_template)) {
        get_header();
        include $page_template;
        get_footer();
    } else {
        // Default page
        get_header();
        echo '<div style="padding:140px 20px 80px;text-align:center;min-height:60vh;">';
        echo '<h1 style="color:#520b75;">' . esc_html(ucwords(str_replace('-', ' ', $dq_page))) . '</h1>';
        echo '<p style="color:#666;margin-top:20px;">' . ($is_ar ? 'هذه الصفحة قيد الإنشاء.' : 'This page is coming soon.') . '</p>';
        echo '<a href="' . $base . '/" style="display:inline-block;margin-top:20px;background:#520b75;color:white;padding:12px 30px;border-radius:8px;text-decoration:none;">' . ($is_ar ? 'العودة للرئيسية' : 'Back to Home') . '</a>';
        echo '</div>';
        get_footer();
    }
}
