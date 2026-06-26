<?php
$lang = get_query_var('lang') ?: 'en';
$is_ar = ($lang === 'ar');
$base = home_url('/' . $lang);
?>

<!-- Footer -->
<footer class="footer-section">
    <!-- Newsletter -->
    <div class="container top-footer">
        <div class="row narrow-row align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-7">
                <h5 class="newsletter-title"><?php echo $is_ar ? 'ابق على اطلاع' : 'STAY UP TO DATE'; ?></h5>
                <p class="newsletter-subtitle">
                    <?php echo $is_ar 
                        ? 'كن أول من يعرف عن الألعاب الجديدة والعروض الحصرية والفعاليات القادمة في دوحة كويست!'
                        : 'Be the first to know about new rides, hot promos and upcoming events at Doha Quest! Sign up to get first access now!'; ?>
                </p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-5">
                <form class="newsletter" id="newsletter-form">
                    <input type="email" id="newsletter-email" placeholder="<?php echo $is_ar ? 'بريدك الإلكتروني' : 'Your email'; ?>">
                    <input type="submit" value="<?php echo $is_ar ? 'اشترك' : 'Submit'; ?>">
                </form>
                <span class="newsletter-msg success-msg" style="display:none;color:#4caf50;">
                    <?php echo $is_ar ? 'شكراً على اشتراكك!' : 'Thanks for subscribing!'; ?>
                </span>
                <span class="newsletter-msg error-msg" style="display:none;color:#f44336;">
                    <?php echo $is_ar ? 'حدث خطأ. حاول مرة أخرى.' : 'There has been a problem. Please try again later!'; ?>
                </span>
            </div>
        </div>
    </div>
    
    <!-- Main Footer -->
    <div class="container-fluid main-footer">
        <div class="container">
            <div class="row footer-links-row">
                <div class="col-6 col-md-3 footer-col">
                    <h6><?php echo $is_ar ? 'التجارب' : 'EXPERIENCES'; ?></h6>
                    <ul>
                        <li><a href="<?php echo $base; ?>/rides"><?php echo $is_ar ? 'الألعاب والمناطق' : 'Rides & Attractions'; ?></a></li>
                        <li><a href="<?php echo $base; ?>/characters"><?php echo $is_ar ? 'الشخصيات' : 'Characters'; ?></a></li>
                        <li><a href="<?php echo $base; ?>/shows"><?php echo $is_ar ? 'العروض' : 'Shows'; ?></a></li>
                        <li><a href="<?php echo $base; ?>/ifly"><?php echo $is_ar ? 'آي فلاي' : 'iFly'; ?></a></li>
                        <li><a href="<?php echo $base; ?>/park"><?php echo $is_ar ? 'الحديقة' : 'Park'; ?></a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 footer-col">
                    <h6><?php echo $is_ar ? 'خطط زيارتك' : 'PLAN YOUR VISIT'; ?></h6>
                    <ul>
                        <li><a href="<?php echo $base; ?>/visit"><?php echo $is_ar ? 'كيف تصل' : 'How to Get Here'; ?></a></li>
                        <li><a href="<?php echo $base; ?>/dine"><?php echo $is_ar ? 'الطعام والتجزئة' : 'Dining & Retail'; ?></a></li>
                        <li><a href="<?php echo $base; ?>/park"><?php echo $is_ar ? 'خريطة الحديقة' : 'Park Map'; ?></a></li>
                        <li><a href="<?php echo $base; ?>/gift-cards"><?php echo $is_ar ? 'بطاقات الهدايا' : 'Gift Cards'; ?></a></li>
                        <li><a href="<?php echo $base; ?>/faqs"><?php echo $is_ar ? 'الأسئلة الشائعة' : 'FAQs'; ?></a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 footer-col">
                    <h6><?php echo $is_ar ? 'الفعاليات' : 'EVENTS'; ?></h6>
                    <ul>
                        <li><a href="<?php echo $base; ?>/shows"><?php echo $is_ar ? 'العروض' : 'Shows'; ?></a></li>
                        <li><a href="<?php echo $base; ?>/celebrate"><?php echo $is_ar ? 'احتفل' : 'Celebrate'; ?></a></li>
                        <li><a href="<?php echo $base; ?>/corporate-bookings"><?php echo $is_ar ? 'حجوزات الشركات' : 'Corporate Bookings'; ?></a></li>
                        <li><a href="<?php echo $base; ?>/school-bookings"><?php echo $is_ar ? 'حجوزات المدارس' : 'School Bookings'; ?></a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 footer-col">
                    <h6><?php echo $is_ar ? 'من نحن' : 'ABOUT US'; ?></h6>
                    <ul>
                        <li><a href="<?php echo $base; ?>/who-we-are"><?php echo $is_ar ? 'من نحن' : 'Who We Are'; ?></a></li>
                        <li><a href="<?php echo $base; ?>/awards"><?php echo $is_ar ? 'الجوائز' : 'Awards'; ?></a></li>
                        <li><a href="<?php echo $base; ?>/press-release"><?php echo $is_ar ? 'البيانات الصحفية' : 'Press Release'; ?></a></li>
                        <li><a href="<?php echo $base; ?>/contact"><?php echo $is_ar ? 'اتصل بنا' : 'Contact Us'; ?></a></li>
                    </ul>
                </div>
            </div>
            
            <div class="row footer-bottom-row align-items-center">
                <div class="col-md-4">
                    <h6><?php echo $is_ar ? 'تواصل معنا' : 'SAY HELLO'; ?></h6>
                    <a href="mailto:info@dohaquest.com">info@dohaquest.com</a>
                </div>
                <div class="col-md-4">
                    <h6><?php echo $is_ar ? 'تواصل مع فريق المبيعات' : 'CONTACT SALES TEAM'; ?></h6>
                    <a href="mailto:sales@dohaquest.com">sales@dohaquest.com</a>
                </div>
                <div class="col-md-4">
                    <h6><?php echo $is_ar ? 'تابعنا على' : 'FOLLOW US ON'; ?></h6>
                    <div class="social-links d-flex gap-2">
                        <a href="https://www.facebook.com/dohaquestpark" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/dohaquestpark" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.tiktok.com/@dohaquestpark" target="_blank"><i class="fab fa-tiktok"></i></a>
                        <a href="https://www.youtube.com/dohaquestpark" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.tripadvisor.com/dohaquest" target="_blank"><i class="fab fa-tripadvisor"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="row footer-legal">
                <div class="col-12 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div class="footer-logo">
                        <img src="https://dohaquest.com/storage/main-information/LgVJIXLoS2S3dwuLKOTsG4G2o9ZeLJmZU2VFiJVc.png" alt="DohaQuest" style="height:40px;filter:brightness(0) invert(1);">
                    </div>
                    <div class="footer-links-legal d-flex gap-3">
                        <a href="<?php echo $base; ?>/privacy"><?php echo $is_ar ? 'سياسة الخصوصية' : 'Privacy Policy'; ?></a>
                        <a href="<?php echo $base; ?>/terms"><?php echo $is_ar ? 'الشروط والأحكام' : 'Terms and conditions'; ?></a>
                    </div>
                    <div class="footer-copyright">
                        <small>© <?php echo date('Y'); ?> Doha Quest. <?php echo $is_ar ? 'جميع الحقوق محفوظة' : 'All rights reserved'; ?>.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
// Newsletter form
document.getElementById('newsletter-form').addEventListener('submit', function(e) {
    e.preventDefault();
    var email = document.getElementById('newsletter-email').value;
    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'action=dq_newsletter&nonce=<?php echo wp_create_nonce('dohaquest_nonce'); ?>&email=' + encodeURIComponent(email)
    }).then(r => r.json()).then(d => {
        if (d.success) {
            document.querySelector('.success-msg').style.display = 'block';
            document.querySelector('.error-msg').style.display = 'none';
        } else {
            document.querySelector('.error-msg').style.display = 'block';
        }
    });
});
</script>

<?php wp_footer(); ?>
</body>
</html>
