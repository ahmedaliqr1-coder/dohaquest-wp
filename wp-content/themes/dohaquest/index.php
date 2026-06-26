<?php
/**
 * DohaQuest Main Template
 */

// Get language from globals or query vars
$lang = $GLOBALS['dq_lang'] ?? get_query_var('lang') ?? 'en';
$is_ar = ($lang === 'ar');
$base = $GLOBALS['dq_base'] ?? home_url('/' . $lang);
$theme_uri = get_template_directory_uri();

get_header();
?>

<!-- Hero Video Section -->
<div class="home-section quest-video-section" id="top">
    <video autoplay muted loop playsinline class="d-none d-lg-block" style="width:100%;height:100%;object-fit:cover;position:absolute;top:0;left:0;z-index:0;">
        <source src="https://dohaquest.com/storage/fixed-titles/LipVcIymRalhaSxg0dx7nT4Xuyh2sW8pM5r7deS4.mp4" type="video/mp4">
    </video>
    <video autoplay muted loop playsinline class="d-block d-lg-none" style="width:100%;height:100%;object-fit:cover;position:absolute;top:0;left:0;z-index:0;">
        <source src="https://dohaquest.com/storage/fixed-titles/LiEvQ5UdUhePmsdRPRu5hE6eKSN5UPJwhWzEL6UF.mp4" type="video/mp4">
    </video>
    <div class="hero-overlay" style="position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.35);z-index:1;"></div>
    <div class="hero-content" style="position:relative;z-index:2;text-align:center;color:white;padding:0 20px;max-width:900px;margin:0 auto;">
        <h1 class="hero-title">
            <?php echo $is_ar 
                ? 'اختبر أطول ألعاب الأفعوانية والبرج الداخلية في العالم'
                : "EXPERIENCE THE WORLD'S TALLEST INDOOR ROLLER COASTER AND DROP TOWER RIDE"; ?>
        </h1>
        <p class="hero-subtitle">
            <?php echo $is_ar 
                ? 'فقط في أكبر حديقة ترفيه داخلية في الدوحة!'
                : 'Only at the largest indoor theme park in Doha!'; ?>
        </p>
        <p style="margin-bottom:30px;opacity:0.9;">
            <?php echo $is_ar ? 'احصل على تذاكرك عبر الإنترنت.' : 'Get your tickets online.'; ?>
        </p>
        <a href="<?php echo $base; ?>/tickets" class="btn-hero-book">
            <?php echo $is_ar ? 'احجز الآن' : 'Book Now'; ?>
        </a>
        <div style="margin-top:25px;">
            <img src="https://dohaquest.com/storage/home/tripadvisor_rating_light.png" alt="TripAdvisor" style="height:45px;" onerror="this.style.display='none'">
        </div>
    </div>
</div>

<!-- Ticker Banner -->
<div style="background:#f2b02d;padding:10px 0;overflow:hidden;white-space:nowrap;">
    <div style="display:inline-block;animation:ticker 25s linear infinite;">
        <?php for($i=0;$i<4;$i++): ?>
        <a href="<?php echo $base; ?>/tickets" style="color:#520b75;font-weight:700;text-decoration:none;padding:0 50px;font-size:14px;text-transform:uppercase;">
            <?php echo $is_ar 
                ? '← احجز تذاكرك واستمتع بأفضل أسعارنا اليوم!' 
                : 'Book your tickets & enjoy our best prices today! →'; ?>
        </a>
        <?php endfor; ?>
    </div>
</div>
<style>
@keyframes ticker { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
</style>

<!-- Section Intro -->
<div class="section-intro center" style="padding:80px 0;background:white;">
    <div class="container">
        <h2 style="color:#520b75;font-size:clamp(22px,4vw,40px);font-weight:900;text-transform:uppercase;margin-bottom:20px;">
            <?php echo $is_ar ? 'حديقة دوحة كويست الترفيهية' : 'Doha Quest Theme Park'; ?>
        </h2>
        <div style="max-width:800px;margin:0 auto;font-size:16px;line-height:1.9;color:#555;">
            <?php if ($is_ar): ?>
                <p>تجرأ على تجربة أطول ألعاب الأفعوانية الداخلية في العالم وانطلق في أطول برج سقوط داخلي. ثم ادخل إلى عوالم الزمن الغامرة، حيث تحيا الأراضي القديمة والمدن المستقبلية والمحطات المجرية. مع أكثر من 30 لعبة ومنطقة جذب، تعد حديقة كويست في الدوحة التجربة الداخلية الغامرة المثالية على مدار العام. مغامرتك تبدأ هنا!</p>
            <?php else: ?>
                <p>Dare to try the world's tallest indoor roller coaster and take the plunge on the world's tallest indoor drop tower ride. Then enter our immersive Time Realms, where ancient lands, futuristic cities and intergalactic stations come to life. With over 30 rides and attractions, Quest theme park in Doha is the ultimate indoor, immersive experience all year round. Your Quest for adventure starts here!</p>
            <?php endif; ?>
            <div style="margin-top:25px;">
                <img src="https://dohaquest.com/storage/home/Guinness_World_Records_logo.png" alt="Guinness World Records" style="height:55px;margin-bottom:10px;" onerror="this.style.display='none'">
                <p style="font-weight:700;color:#520b75;">
                    <?php echo $is_ar ? "أكبر حديقة ترفيه داخلية في قطر!" : "Qatar's Largest Indoor Theme Park!"; ?>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Rides Overview -->
<div style="padding:80px 0;background:#fafafa;">
    <div class="container text-center">
        <h2 style="color:#520b75;font-size:clamp(22px,4vw,40px);font-weight:900;text-transform:uppercase;margin-bottom:15px;">
            <?php echo $is_ar ? '+30 لعبة ومنطقة جذب تحت سقف واحد' : '30+ Rides and Attractions Under One Roof'; ?>
        </h2>
        <p style="color:#666;max-width:700px;margin:0 auto 50px;">
            <?php echo $is_ar 
                ? 'استعد لألعاب مثيرة تجعل قلبك يتسارع ومناطق مغامرة تنقلك إلى عالم آخر. تجربة لا مثيل لها في أي حديقة ترفيه في قطر!'
                : "Get ready for thrill rides that get your heart pumping and adventure zones that pull you into another world. It's an experience unlike any other theme park in Qatar!"; ?>
        </p>
    </div>
    
    <!-- Time Realms -->
    <div style="margin-bottom:60px;">
        <div class="container text-center mb-4">
            <h3 style="color:#520b75;font-weight:700;"><?php echo $is_ar ? 'ادخل إلى عوالم الزمن' : 'Enter Our Time Realms'; ?></h3>
        </div>
        <div class="row g-0 mx-0">
            <div class="col-12 col-md-4" style="min-height:280px;background:linear-gradient(135deg,#1a0a2e,#520b75);position:relative;display:flex;align-items:flex-end;padding:25px;">
                <div style="color:white;">
                    <small style="opacity:0.7;text-transform:uppercase;font-size:11px;"><?php echo $is_ar ? 'العب في الحاضر' : 'Play in the present'; ?></small>
                    <h4 style="font-weight:900;text-transform:uppercase;margin:5px 0 0;"><?php echo $is_ar ? 'مدينة الخيال' : 'CITY OF IMAGINATION'; ?></h4>
                </div>
            </div>
            <div class="col-12 col-md-4" style="min-height:280px;background:linear-gradient(135deg,#0a0a1a,#1a0a2e);position:relative;display:flex;align-items:center;justify-content:center;">
                <div style="text-align:center;color:white;">
                    <small style="opacity:0.7;text-transform:uppercase;font-size:11px;"><?php echo $is_ar ? 'تخيل المستقبل' : 'Imagine the future'; ?></small>
                    <h4 style="font-weight:900;text-transform:uppercase;margin:5px 0 0;font-size:28px;">GRAVITY</h4>
                </div>
            </div>
            <div class="col-12 col-md-4" style="min-height:280px;background:linear-gradient(135deg,#2d1a0a,#8b4513);position:relative;display:flex;align-items:flex-end;padding:25px;">
                <div style="color:white;">
                    <small style="opacity:0.7;text-transform:uppercase;font-size:11px;"><?php echo $is_ar ? 'استكشف الماضي' : 'Explore the past'; ?></small>
                    <h4 style="font-weight:900;text-transform:uppercase;margin:5px 0 0;">ORYXVILLE</h4>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Ride Categories -->
    <div class="container">
        <div class="row g-4">
            <div class="col-12 col-md-4">
                <div style="background:white;padding:35px;border-radius:16px;text-align:center;box-shadow:0 4px 20px rgba(82,11,117,0.08);height:100%;">
                    <i class="fa fa-rocket" style="font-size:45px;color:#520b75;margin-bottom:15px;"></i>
                    <h4 style="color:#520b75;font-weight:700;margin-bottom:10px;"><?php echo $is_ar ? 'عش الإثارة' : 'Live the thrill'; ?></h4>
                    <p style="color:#666;font-size:14px;line-height:1.7;"><?php echo $is_ar ? 'كويست يضم أكثر الألعاب إثارة في قطر.' : 'Quest is home to the most thrilling and adventurous rides & attractions in Qatar.'; ?></p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div style="background:white;padding:35px;border-radius:16px;text-align:center;box-shadow:0 4px 20px rgba(82,11,117,0.08);height:100%;">
                    <i class="fa fa-vr-cardboard" style="font-size:45px;color:#520b75;margin-bottom:15px;"></i>
                    <h4 style="color:#520b75;font-weight:700;margin-bottom:10px;"><?php echo $is_ar ? 'تجارب الواقع الافتراضي' : 'Virtual reality experiences'; ?></h4>
                    <p style="color:#666;font-size:14px;line-height:1.7;"><?php echo $is_ar ? 'استمتع بانفجار الحواس من خلال تجاربنا ثلاثية الأبعاد.' : 'Enjoy an explosion of the senses through our 3D experiences.'; ?></p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div style="background:white;padding:35px;border-radius:16px;text-align:center;box-shadow:0 4px 20px rgba(82,11,117,0.08);height:100%;">
                    <i class="fa fa-child" style="font-size:45px;color:#520b75;margin-bottom:15px;"></i>
                    <h4 style="color:#520b75;font-weight:700;margin-bottom:10px;"><?php echo $is_ar ? 'للصغار' : 'For Juniors'; ?></h4>
                    <p style="color:#666;font-size:14px;line-height:1.7;"><?php echo $is_ar ? 'يمكن للأطفال بين 4 و10 سنوات الاستمتاع بنسخ مصغرة من ألعابنا.' : 'Children between the ages of 4 and 10 can enjoy miniature versions of our best rides.'; ?></p>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="<?php echo $base; ?>/rides" style="display:inline-block;background:#520b75;color:white;text-decoration:none;padding:14px 35px;border-radius:8px;font-weight:700;font-size:15px;transition:all 0.3s;">
                <?php echo $is_ar ? 'عرض جميع الألعاب والمناطق' : 'View All Rides & Attractions'; ?> →
            </a>
        </div>
    </div>
</div>

<!-- USP Section -->
<div style="background:#520b75;padding:80px 0;color:white;">
    <div class="container text-center">
        <h2 style="font-size:clamp(22px,4vw,40px);font-weight:900;text-transform:uppercase;margin-bottom:15px;">
            <?php echo $is_ar ? 'متعة لا تنتهي في دوحة كويست' : 'Non-Stop Fun at Doha Quest'; ?>
        </h2>
        <p style="opacity:0.85;margin-bottom:50px;">
            <?php echo $is_ar ? 'الخيار الأول للسحر والإثارة والذكريات التي لا تُنسى في قطر' : 'The top choice for magic, excitement, and unforgettable memories in Qatar'; ?>
        </p>
        <div class="row justify-content-center g-4">
            <?php
            $usps_en = [
                ['fa-snowflake', 'Climate Controlled', 'All-weather comfort and fun'],
                ['fa-ticket-alt', 'All-Access Tickets', 'Ride everything with one pass'],
                ['fa-trophy', 'Guinness Record Thrills', 'EpiQ Coaster & Magma Blast – world records'],
                ['fa-star', 'Exclusive Rides', 'Unique rides only at Doha Quest'],
            ];
            $usps_ar = [
                ['fa-snowflake', 'تحكم في المناخ', 'راحة ومتعة في كل الأحوال الجوية'],
                ['fa-ticket-alt', 'تذاكر شاملة', 'استمتع بكل شيء بتذكرة واحدة'],
                ['fa-trophy', 'أرقام قياسية جينيس', 'إيبيك كوستر وماغما بلاست - أرقام قياسية عالمية'],
                ['fa-star', 'ألعاب حصرية', 'ألعاب فريدة فقط في دوحة كويست'],
            ];
            $usps = $is_ar ? $usps_ar : $usps_en;
            foreach ($usps as $usp): ?>
            <div class="col-6 col-md-3">
                <div style="text-align:center;padding:20px;">
                    <i class="fa <?php echo $usp[0]; ?>" style="font-size:40px;color:#f2b02d;margin-bottom:15px;"></i>
                    <h4 style="font-weight:700;margin-bottom:8px;"><?php echo $usp[1]; ?></h4>
                    <p style="opacity:0.8;font-size:13px;"><?php echo $usp[2]; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="mt-5">
            <a href="<?php echo $base; ?>/tickets" style="display:inline-block;background:#f2b02d;color:#520b75;text-decoration:none;padding:14px 35px;border-radius:8px;font-weight:800;font-size:15px;">
                <?php echo $is_ar ? 'استكشف التذاكر' : 'Explore Tickets'; ?>
            </a>
        </div>
    </div>
</div>

<!-- Events Section -->
<div style="background:white;">
    <div class="row g-0 mx-0">
        <div class="col-12 col-md-6" style="min-height:400px;overflow:hidden;">
            <img src="https://dohaquest.com/storage/fixed-titles/oWAZ3eJkSkMYpuJt0P3qb5LlQMKQrf4aCBiEgP1N.webp" alt="Events" style="width:100%;height:100%;object-fit:cover;" onerror="this.style.background='#520b75'">
        </div>
        <div class="col-12 col-md-6" style="background:#520b75;padding:60px 50px;display:flex;flex-direction:column;justify-content:center;">
            <h2 style="color:white;font-size:clamp(22px,3vw,36px);font-weight:900;text-transform:uppercase;margin-bottom:20px;">
                <?php echo $is_ar ? 'ما الجديد في دوحة كويست؟' : "What's On at Doha Quest?"; ?>
            </h2>
            <p style="color:rgba(255,255,255,0.85);margin-bottom:30px;line-height:1.8;">
                <?php echo $is_ar ? 'ترقب! مخططات ترفيهية رائعة وفعاليات موسمية في طريقها إليك.' : 'Stay tuned! Spectacular entertainment schemes and seasonal events are coming your way.'; ?>
            </p>
            <div style="display:flex;gap:15px;flex-wrap:wrap;">
                <a href="<?php echo $base; ?>/shows" style="display:inline-block;border:2px solid white;color:white;text-decoration:none;padding:10px 24px;border-radius:8px;font-weight:600;font-size:14px;transition:all 0.3s;" onmouseover="this.style.background='white';this.style.color='#520b75'" onmouseout="this.style.background='transparent';this.style.color='white'">
                    <?php echo $is_ar ? 'عرض الفعاليات والعروض' : 'View Events & Shows'; ?>
                </a>
                <a href="<?php echo $base; ?>/celebrate" style="display:inline-block;border:2px solid white;color:white;text-decoration:none;padding:10px 24px;border-radius:8px;font-weight:600;font-size:14px;transition:all 0.3s;" onmouseover="this.style.background='white';this.style.color='#520b75'" onmouseout="this.style.background='transparent';this.style.color='white'">
                    <?php echo $is_ar ? 'احجز فعاليتك الخاصة' : 'Book Your Own Event'; ?>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Plan Your Visit -->
<div style="padding:80px 0;background:#f8f4ff;">
    <div class="container text-center">
        <h2 style="color:#520b75;font-size:clamp(22px,4vw,40px);font-weight:900;text-transform:uppercase;margin-bottom:15px;">
            <?php echo $is_ar ? 'خطط زيارتك' : 'Plan Your Visit'; ?>
        </h2>
        <p style="color:#666;margin-bottom:40px;">
            <?php echo $is_ar ? 'استفد إلى أقصى حد من يومك في أحب حديقة ترفيه في قطر!' : 'Make the most of your day at the most well-loved amusement park in Qatar!'; ?>
        </p>
        <div style="max-width:500px;margin:0 auto 40px;background:white;border-radius:16px;padding:30px;box-shadow:0 4px 20px rgba(82,11,117,0.08);">
            <h3 style="color:#520b75;font-weight:700;margin-bottom:20px;"><?php echo $is_ar ? 'ساعات العمل' : 'Opening Hours'; ?></h3>
            <div style="text-align:<?php echo $is_ar?'right':'left'; ?>;">
                <div style="display:flex;justify-content:space-between;padding:10px 0;border-bottom:1px solid #f0e8ff;">
                    <span style="font-weight:600;color:#520b75;"><?php echo $is_ar ? 'السبت' : 'Saturday'; ?></span>
                    <span style="color:#555;">12:00PM - 8:00PM</span>
                </div>
                <div style="display:flex;justify-content:space-between;padding:10px 0;border-bottom:1px solid #f0e8ff;">
                    <span style="font-weight:600;color:#520b75;"><?php echo $is_ar ? 'الجمعة' : 'Friday'; ?></span>
                    <span style="color:#555;">1:00PM - 10:00PM</span>
                </div>
                <div style="display:flex;justify-content:space-between;padding:10px 0;">
                    <span style="font-weight:600;color:#520b75;"><?php echo $is_ar ? 'الاثنين - الخميس' : 'Mon - Thu'; ?></span>
                    <span style="color:#555;">2:00PM - 10:00PM</span>
                </div>
            </div>
        </div>
        <div style="display:flex;gap:15px;justify-content:center;flex-wrap:wrap;">
            <a href="<?php echo $base; ?>/visit" style="display:inline-block;background:#520b75;color:white;text-decoration:none;padding:12px 28px;border-radius:8px;font-weight:600;font-size:14px;"><?php echo $is_ar ? 'كيف تصل' : 'How to Get Here'; ?> →</a>
            <a href="<?php echo $base; ?>/dine" style="display:inline-block;background:#520b75;color:white;text-decoration:none;padding:12px 28px;border-radius:8px;font-weight:600;font-size:14px;"><?php echo $is_ar ? 'الطعام والتجزئة' : 'Dining & Retail'; ?> →</a>
            <a href="<?php echo $base; ?>/park" style="display:inline-block;background:#520b75;color:white;text-decoration:none;padding:12px 28px;border-radius:8px;font-weight:600;font-size:14px;"><?php echo $is_ar ? 'خريطة الحديقة' : 'Park Map'; ?> →</a>
        </div>
    </div>
</div>

<!-- Characters Section -->
<div style="background:linear-gradient(rgba(82,11,117,0.85),rgba(26,10,46,0.9)),url(https://dohaquest.com/storage/fixed-titles/EyCdewGgj18AvYmM3MfqboU1ER1DIgS7JHMuECDv.jpg) center/cover;padding:80px 0;text-align:center;color:white;" id="characters">
    <div class="container">
        <h2 style="font-size:clamp(22px,4vw,40px);font-weight:900;text-transform:uppercase;margin-bottom:40px;">
            <?php echo $is_ar ? 'شخصياتنا' : 'Our Characters'; ?>
        </h2>
        <div style="max-width:350px;margin:0 auto 40px;background:rgba(255,255,255,0.1);backdrop-filter:blur(10px);border-radius:20px;padding:30px;border:1px solid rgba(255,255,255,0.2);">
            <small style="display:block;opacity:0.7;text-transform:uppercase;font-size:11px;margin-bottom:10px;">ORYXVILLE</small>
            <h4 style="font-weight:900;text-transform:uppercase;margin-bottom:10px;"><?php echo $is_ar ? 'مرحباً! اسمي ماجيس' : 'HELLO! MY NAME IS MAGIS'; ?></h4>
            <p style="opacity:0.85;font-size:14px;"><?php echo $is_ar ? 'أنا طيب القلب وغامض ومبهج' : 'I am kindhearted, mystical and flamboyant'; ?></p>
        </div>
        <a href="<?php echo $base; ?>/characters" style="display:inline-block;border:2px solid white;color:white;text-decoration:none;padding:12px 30px;border-radius:8px;font-weight:600;font-size:14px;">
            <?php echo $is_ar ? 'تعرف على المزيد عني وعن أصدقائي' : 'Learn more about me & my friends'; ?>
        </a>
    </div>
</div>

<!-- CTA Section -->
<div style="background:#520b75;padding:80px 0;text-align:center;color:white;">
    <div class="container">
        <h2 style="font-size:clamp(22px,4vw,40px);font-weight:900;text-transform:uppercase;margin-bottom:20px;">
            <?php echo $is_ar ? 'هل أنت مستعد لبدء مغامرتك؟' : 'Ready to begin your Quest?'; ?>
        </h2>
        <p style="opacity:0.85;margin-bottom:30px;font-size:16px;">
            <?php echo $is_ar ? 'احجز الآن وادخل إلى أكثر مغامرة داخلية إثارة في الدوحة.' : 'Book now and step into the most thrilling indoor adventure in Doha.'; ?>
        </p>
        <a href="<?php echo $base; ?>/tickets" style="display:inline-block;background:#f2b02d;color:#520b75;text-decoration:none;padding:16px 45px;border-radius:50px;font-weight:800;font-size:16px;text-transform:uppercase;letter-spacing:1px;margin-bottom:20px;">
            <?php echo $is_ar ? 'احجز تذاكرك الآن' : 'Book Your Tickets Now'; ?>
        </a>
        <p style="opacity:0.75;font-size:14px;">
            <?php echo $is_ar ? 'أو خطط لزيارة جماعية' : 'Or Plan a Group Visit'; ?>
            <a href="<?php echo $base; ?>/school-bookings" style="color:#f2b02d;"> <?php echo $is_ar ? 'للمدارس' : 'for schools'; ?></a>
            <?php echo $is_ar ? ' و' : ' & '; ?>
            <a href="<?php echo $base; ?>/corporate-bookings" style="color:#f2b02d;"><?php echo $is_ar ? 'مجموعات الشركات' : 'corporate groups'; ?></a>
        </p>
    </div>
</div>

<!-- FAQ Section -->
<div style="padding:80px 0;background:white;">
    <div class="container">
        <h2 style="color:#520b75;font-size:clamp(22px,4vw,40px);font-weight:900;text-transform:uppercase;text-align:center;margin-bottom:50px;">
            <?php echo $is_ar ? 'الأسئلة الشائعة' : 'Frequently Asked Questions'; ?>
        </h2>
        <div style="max-width:800px;margin:0 auto;">
            <?php
            $faqs = $is_ar ? [
                ['كم من الوقت يقضي الناس عادةً في دوحة كويست؟', 'يقضي معظم الزوار من 4 إلى 6 ساعات في دوحة كويست للاستمتاع بجميع الألعاب والمناطق.'],
                ['ما هي متطلبات العمر والطول؟', 'تختلف متطلبات الطول حسب اللعبة. تتطلب معظم الألعاب حداً أدنى للطول 100 سم. يجب أن يكون الأطفال دون سن 4 سنوات مصحوبين بشخص بالغ.'],
                ['هل تقدمون باقات أعياد الميلاد؟', 'نعم! نقدم باقات أعياد ميلاد خاصة. تواصل معنا على info@dohaquest.com لمزيد من التفاصيل.'],
                ['ما هي سياسة الاسترداد؟', 'التذاكر غير قابلة للاسترداد ولكن يمكن إعادة جدولتها قبل 24 ساعة من زيارتك.'],
                ['أين يقع دوحة كويست؟', 'يقع دوحة كويست في مول دوحة أوسيس، ويست باي، الدوحة، قطر.'],
            ] : [
                ['How long do people usually stay at Doha Quest?', 'Most visitors spend 4-6 hours at Doha Quest to enjoy all the rides and attractions.'],
                ['What are the age/height requirements?', 'Height requirements vary by ride. Most rides require a minimum height of 100cm. Children under 4 must be accompanied by an adult.'],
                ['Do you offer birthday packages?', 'Yes! We offer special birthday packages. Contact us at info@dohaquest.com for more details.'],
                ['What is your refund policy?', 'Tickets are non-refundable but can be rescheduled up to 24 hours before your visit.'],
                ['Where is Doha Quest located?', 'Doha Quest is located at Doha Oasis Mall, West Bay, Doha, Qatar.'],
            ];
            foreach ($faqs as $i => $faq): ?>
            <div style="border-bottom:1px solid #eee;margin-bottom:5px;">
                <button onclick="toggleFaq(<?php echo $i; ?>)" style="width:100%;text-align:<?php echo $is_ar?'right':'left'; ?>;background:none;border:none;padding:20px 0;font-size:16px;font-weight:600;cursor:pointer;color:#520b75;display:flex;justify-content:space-between;align-items:center;">
                    <?php echo esc_html($faq[0]); ?>
                    <i class="fa fa-chevron-down" id="faq-icon-<?php echo $i; ?>" style="transition:transform 0.3s;flex-shrink:0;margin-<?php echo $is_ar?'right':'left'; ?>:15px;"></i>
                </button>
                <div id="faq-<?php echo $i; ?>" style="display:none;padding:0 0 20px;color:#666;line-height:1.8;">
                    <?php echo esc_html($faq[1]); ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
function toggleFaq(i) {
    var el = document.getElementById('faq-' + i);
    var icon = document.getElementById('faq-icon-' + i);
    var isOpen = el.style.display !== 'none';
    el.style.display = isOpen ? 'none' : 'block';
    icon.style.transform = isOpen ? 'rotate(0deg)' : 'rotate(180deg)';
}

// Header scroll effect
window.addEventListener('scroll', function() {
    var header = document.getElementById('main-header');
    if (header) {
        if (window.scrollY > 50) {
            header.style.background = 'rgba(26,10,46,0.97)';
            header.style.backdropFilter = 'blur(10px)';
        } else {
            header.style.background = 'transparent';
            header.style.backdropFilter = 'none';
        }
    }
});
</script>

<?php get_footer(); ?>
