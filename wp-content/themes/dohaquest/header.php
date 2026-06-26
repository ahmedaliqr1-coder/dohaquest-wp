<?php
$lang = get_query_var('lang') ?: 'en';
$is_ar = ($lang === 'ar');
$dir = $is_ar ? 'rtl' : 'ltr';
$base = home_url('/' . $lang);
$theme_uri = get_template_directory_uri();
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); echo get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <?php if ($is_ar): ?>
    <style>
    body { font-family: 'Cairo', 'Tajawal', Arial, sans-serif !important; direction: rtl; }
    .header .inner-container .nav-menu { direction: rtl; }
    .submenu { right: 0; left: auto !important; }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
    <?php endif; ?>
</head>
<body class="<?php echo $is_ar ? 'lang-ar' : 'lang-en'; ?>">

<!-- Announcements Bar -->
<div class="announcements header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <div class="opening-hours">
                    <img src="<?php echo $theme_uri; ?>/images/<?php echo basename('https://dohaquest.com/img/clock-icon.png'); ?>" alt="" style="height:16px;margin-right:5px;" onerror="this.style.display='none'">
                    <strong><?php echo $is_ar ? 'ساعات العمل:' : 'OPENING HOURS:'; ?></strong>
                    <?php if ($is_ar): ?>
                        السبت 12:00م - 8:00م | الجمعة 1:00م - 10:00م | الاثنين إلى الخميس 2:00م - 10:00م
                    <?php else: ?>
                        Saturday 12:00PM - 8:00PM | Friday 1:00PM - 10:00PM | Monday to Thursday 2:00PM - 10:00PM
                    <?php endif; ?>
                </div>
                <div class="header-actions d-flex align-items-center gap-3">
                    <a href="<?php echo $is_ar ? home_url('/en/') : home_url('/ar/'); ?>" class="lang-switch">
                        <?php echo $is_ar ? 'EN' : 'AR'; ?>
                    </a>
                    <a href="https://tickets.dohaquest.com" target="_blank" class="btn-ticketing">
                        <?php echo $is_ar ? 'احجز الآن' : 'TICKETING'; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Header -->
<div class="header fixed" id="main-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 inner-container d-flex align-items-center justify-content-between">
                <a class="logo" href="<?php echo $base; ?>/">
                    <div class="img-wrapper">
                        <img alt="Doha Quest Logo" class="img-element" src="https://dohaquest.com/storage/main-information/LgVJIXLoS2S3dwuLKOTsG4G2o9ZeLJmZU2VFiJVc.png" style="height:50px;">
                    </div>
                </a>
                
                <ul class="desktop-menu nav-menu">
                    <li class="has-submenu">
                        <a href="#"><?php echo $is_ar ? 'التجارب' : 'Experiences'; ?></a>
                        <div class="submenu">
                            <div class="sub-container">
                                <img class="submenu-img" src="https://dohaquest.com/storage/fixed-titles/y2PRWw5HM6GGqJFol9nRnOFF94yV0lPCoP7FnuwF.jpg" loading="lazy">
                                <ul class="submenu-nav">
                                    <li><a href="<?php echo $base; ?>/quest-summer-camp"><?php echo $is_ar ? 'مخيم كويست الصيفي' : 'Quest Summer Camp'; ?></a></li>
                                    <li><a href="<?php echo $base; ?>/characters"><?php echo $is_ar ? 'الشخصيات' : 'Characters'; ?></a></li>
                                    <li><a href="<?php echo $base; ?>/shows"><?php echo $is_ar ? 'العروض' : 'Shows'; ?></a></li>
                                    <li><a href="<?php echo $base; ?>/ifly"><?php echo $is_ar ? 'آي فلاي' : 'iFly'; ?></a></li>
                                    <li><a href="<?php echo $base; ?>/park"><?php echo $is_ar ? 'الحديقة' : 'Park'; ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li><a href="<?php echo $base; ?>/rides"><?php echo $is_ar ? 'الألعاب والمناطق' : 'Rides & Attractions'; ?></a></li>
                    <li class="has-submenu">
                        <a href="#"><?php echo $is_ar ? 'الطعام والتسوق' : 'Food & Shopping'; ?></a>
                        <div class="submenu">
                            <div class="sub-container">
                                <img class="submenu-img" src="https://dohaquest.com/storage/fixed-titles/6aM1xwRnm33WLSP4gHbIZeviYiNmi4fWZUxqyHAR.jpg" loading="lazy">
                                <ul class="submenu-nav">
                                    <li><a href="https://store.dohaquest.com/" target="_blank"><?php echo $is_ar ? 'المتجر' : 'Shop'; ?></a></li>
                                    <li><a href="<?php echo $base; ?>/dine"><?php echo $is_ar ? 'المطاعم' : 'Dine'; ?></a></li>
                                    <li><a href="<?php echo $base; ?>/gift-cards"><?php echo $is_ar ? 'بطاقات الهدايا' : 'Gift Cards'; ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><?php echo $is_ar ? 'الفعاليات' : 'Events'; ?></a>
                        <div class="submenu">
                            <div class="sub-container">
                                <ul class="submenu-nav">
                                    <li><a href="<?php echo $base; ?>/shows"><?php echo $is_ar ? 'العروض' : 'Shows'; ?></a></li>
                                    <li><a href="<?php echo $base; ?>/celebrate"><?php echo $is_ar ? 'احتفل' : 'Celebrate'; ?></a></li>
                                    <li><a href="<?php echo $base; ?>/corporate-bookings"><?php echo $is_ar ? 'حجوزات الشركات' : 'Corporate Bookings'; ?></a></li>
                                    <li><a href="<?php echo $base; ?>/school-bookings"><?php echo $is_ar ? 'حجوزات المدارس' : 'School Bookings'; ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><?php echo $is_ar ? 'خطط زيارتك' : 'Plan Your Visit'; ?></a>
                        <div class="submenu">
                            <div class="sub-container">
                                <ul class="submenu-nav">
                                    <li><a href="<?php echo $base; ?>/visit"><?php echo $is_ar ? 'كيف تصل' : 'How to Get Here'; ?></a></li>
                                    <li><a href="<?php echo $base; ?>/dine"><?php echo $is_ar ? 'الطعام والتجزئة' : 'Dining & Retail'; ?></a></li>
                                    <li><a href="<?php echo $base; ?>/park"><?php echo $is_ar ? 'خريطة الحديقة' : 'Park Map'; ?></a></li>
                                    <li><a href="<?php echo $base; ?>/faqs"><?php echo $is_ar ? 'الأسئلة الشائعة' : 'FAQs'; ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><?php echo $is_ar ? 'من نحن' : 'About Us'; ?></a>
                        <div class="submenu">
                            <div class="sub-container">
                                <ul class="submenu-nav">
                                    <li><a href="<?php echo $base; ?>/who-we-are"><?php echo $is_ar ? 'من نحن' : 'Who We Are'; ?></a></li>
                                    <li><a href="<?php echo $base; ?>/awards"><?php echo $is_ar ? 'الجوائز' : 'Awards'; ?></a></li>
                                    <li><a href="<?php echo $base; ?>/contact"><?php echo $is_ar ? 'اتصل بنا' : 'Contact Us'; ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                
                <div class="header-right d-flex align-items-center gap-2">
                    <a href="https://tickets.dohaquest.com" target="_blank" class="btn-book-now">
                        <?php echo $is_ar ? 'احجز الآن' : 'Buy Tickets'; ?>
                    </a>
                    <button class="mobile-menu-toggle d-lg-none" onclick="document.querySelector('.overlay-menu').classList.toggle('active')">
                        <img src="<?php echo $theme_uri; ?>/images/menu-icon.png" alt="Menu" style="height:24px;" onerror="this.innerHTML='☰'">
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Menu Overlay -->
<div class="overlay-menu">
    <button class="close-menu" onclick="document.querySelector('.overlay-menu').classList.remove('active')" style="position:absolute;top:20px;right:20px;background:none;border:none;font-size:30px;color:white;cursor:pointer;">✕</button>
    <ul class="mobile-nav">
        <li><a href="<?php echo $base; ?>/rides"><?php echo $is_ar ? 'الألعاب والمناطق' : 'Rides & Attractions'; ?></a></li>
        <li><a href="<?php echo $base; ?>/characters"><?php echo $is_ar ? 'الشخصيات' : 'Characters'; ?></a></li>
        <li><a href="<?php echo $base; ?>/shows"><?php echo $is_ar ? 'العروض' : 'Shows'; ?></a></li>
        <li><a href="<?php echo $base; ?>/dine"><?php echo $is_ar ? 'المطاعم' : 'Dine'; ?></a></li>
        <li><a href="<?php echo $base; ?>/visit"><?php echo $is_ar ? 'خطط زيارتك' : 'Plan Your Visit'; ?></a></li>
        <li><a href="<?php echo $base; ?>/who-we-are"><?php echo $is_ar ? 'من نحن' : 'About Us'; ?></a></li>
        <li><a href="https://tickets.dohaquest.com" target="_blank" class="btn-book-now"><?php echo $is_ar ? 'احجز الآن' : 'Buy Tickets'; ?></a></li>
    </ul>
</div>
