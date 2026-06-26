<?php
$lang = get_query_var('lang') ?: 'en';
$is_ar = ($lang === 'ar');
$base = home_url('/' . $lang);
$slug = get_query_var('pagename') ?: '';

get_header();

// Route to correct page template
$template = get_template_directory() . '/pages/' . $slug . '.php';
if (file_exists($template)) {
    include $template;
} else {
    // Default page
    echo '<div class="page-wrapper container" style="padding:100px 20px;min-height:60vh;">';
    echo '<h1>' . esc_html(get_the_title()) . '</h1>';
    the_content();
    echo '</div>';
}

get_footer();
?>
