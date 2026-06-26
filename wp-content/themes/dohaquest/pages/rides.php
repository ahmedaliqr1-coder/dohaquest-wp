<?php
$is_ar = ($lang === 'ar');
$base = home_url('/' . $lang);

$rides = [
    ['id'=>'magma-blast','name'=>'MAGMA BLAST','name_ar'=>'ماغما بلاست','subtitle'=>"The World's Tallest Indoor Drop Tower",'subtitle_ar'=>'أطول برج سقوط داخلي في العالم','image'=>'https://dohaquest.com/storage/rides/2CseHat6umTjCFZTF7ITGifbQmsoOs9hcaHn2N7q.jpg','desc'=>'Experience the world\'s tallest indoor drop tower with the Magma Blast at Doha Quest.','desc_ar'=>'اختبر أطول برج سقوط داخلي في العالم مع ماغما بلاست في دوحة كويست.'],
    ['id'=>'epiq-coaster','name'=>'Epiq Coaster','name_ar'=>'إيبيك كوستر','subtitle'=>"The World's Tallest Indoor Roller Coaster",'subtitle_ar'=>'أطول ألعاب الأفعوانية الداخلية في العالم','image'=>'https://dohaquest.com/storage/rides/65c4bfWpzs6mrAWTN0crHBMRYHIp6LqqkyWFRUVB.jpg','desc'=>'Experience the world\'s tallest indoor roller coaster at Doha Quest!','desc_ar'=>'اختبر أطول ألعاب الأفعوانية الداخلية في العالم في دوحة كويست!'],
    ['id'=>'ifly-quest','name'=>'iFly Quest','name_ar'=>'آي فلاي كويست','subtitle'=>'Indoor Skydiving','subtitle_ar'=>'القفز بالمظلة الداخلي','image'=>'https://dohaquest.com/storage/rides/ZasfWWgslBOqa8Cuo41zevKVSwsSd0g13ed33NN6.jpg','desc'=>'iFly Quest is an experience that will take guests on an exciting flying adventure.','desc_ar'=>'آي فلاي كويست تجربة ستأخذ الضيوف في مغامرة طيران مثيرة.'],
    ['id'=>'gravity-swing','name'=>'Gravity Swing','name_ar'=>'غرافيتي سوينغ','subtitle'=>'Pendulum swing','subtitle_ar'=>'أرجوحة البندول','image'=>'https://dohaquest.com/storage/rides/sw4bO1PTMvuRoWGB45MTnWQTU0vWC6Zz0Lej7m7K.jpg','desc'=>'This spinning swing ride will make young adrenaline junkies giddy with excitement.','desc_ar'=>'هذه اللعبة الدوارة ستجعل عشاق الأدرينالين يشعرون بالإثارة.'],
    ['id'=>'quest-for-speed','name'=>'Quest for Speed','name_ar'=>'كويست فور سبيد','subtitle'=>'Racing Simulators','subtitle_ar'=>'محاكيات السباق','image'=>'https://dohaquest.com/storage/rides/DPx07Ptee2KCHM2ldMQS43nzKb7kZUNTdlBVFTj8.jpg','desc'=>'Racing simulators that will take guests on an exciting adventure of driving a racing car.','desc_ar'=>'محاكيات سباق ستأخذ الضيوف في مغامرة مثيرة لقيادة سيارة سباق.'],
    ['id'=>'time-warp','name'=>'Time Warp','name_ar'=>'تايم وارب','subtitle'=>'Time Travel Experience','subtitle_ar'=>'تجربة السفر عبر الزمن','image'=>'https://dohaquest.com/storage/rides/2CseHat6umTjCFZTF7ITGifbQmsoOs9hcaHn2N7q.jpg','desc'=>'Travel through time in this immersive experience.','desc_ar'=>'سافر عبر الزمن في هذه التجربة الغامرة.'],
    ['id'=>'storm-chaser','name'=>'Storm Chaser','name_ar'=>'ستورم تشيسر','subtitle'=>'Spinning Coaster','subtitle_ar'=>'أفعوانية دوارة','image'=>'https://dohaquest.com/storage/rides/65c4bfWpzs6mrAWTN0crHBMRYHIp6LqqkyWFRUVB.jpg','desc'=>'Chase the storm on this thrilling spinning coaster.','desc_ar'=>'طارد العاصفة على هذه الأفعوانية الدوارة المثيرة.'],
    ['id'=>'oryx-adventure','name'=>'Oryx Adventure','name_ar'=>'مغامرة المها','subtitle'=>'Family Adventure Ride','subtitle_ar'=>'لعبة مغامرة عائلية','image'=>'https://dohaquest.com/storage/rides/ZasfWWgslBOqa8Cuo41zevKVSwsSd0g13ed33NN6.jpg','desc'=>'A family-friendly adventure through the world of Oryxville.','desc_ar'=>'مغامرة عائلية في عالم أوريكسفيل.'],
];
?>

<!-- Page Hero -->
<div class="page-hero" style="background:linear-gradient(135deg,#520b75,#1a0a2e);padding:120px 0 60px;text-align:center;color:white;">
    <div class="container">
        <h1 class="fixed-title white"><?php echo $is_ar ? 'الألعاب والمناطق' : 'Rides & Attractions'; ?></h1>
        <p><?php echo $is_ar ? 'اكتشف أكثر من 30 لعبة ومنطقة جذب تحت سقف واحد' : 'Discover 30+ rides and attractions under one roof'; ?></p>
    </div>
</div>

<!-- Rides Grid -->
<div class="rides-page" style="padding:60px 0;">
    <div class="container">
        <div class="row g-4">
            <?php foreach ($rides as $ride): ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="ride-card" style="border-radius:16px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.1);height:100%;">
                    <div class="ride-image" style="height:220px;background-image:url(<?php echo esc_url($ride['image']); ?>);background-size:cover;background-position:center;position:relative;">
                        <div style="position:absolute;bottom:0;left:0;right:0;background:linear-gradient(transparent,rgba(0,0,0,0.7));padding:20px 15px 10px;">
                            <h3 style="color:white;margin:0;font-size:18px;"><?php echo $is_ar ? esc_html($ride['name_ar']) : esc_html($ride['name']); ?></h3>
                            <p style="color:#f0a500;margin:0;font-size:13px;"><?php echo $is_ar ? esc_html($ride['subtitle_ar']) : esc_html($ride['subtitle']); ?></p>
                        </div>
                    </div>
                    <div style="padding:20px;">
                        <p style="color:#666;font-size:14px;"><?php echo $is_ar ? esc_html($ride['desc_ar']) : esc_html($ride['desc']); ?></p>
                        <a href="https://tickets.dohaquest.com" target="_blank" class="btn-primary-dq" style="font-size:13px;padding:8px 20px;">
                            <?php echo $is_ar ? 'احجز الآن' : 'Book Now'; ?>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- CTA -->
<div style="background:#520b75;padding:60px 0;text-align:center;color:white;">
    <div class="container">
        <h2><?php echo $is_ar ? 'هل أنت مستعد للمغامرة؟' : 'Ready for the Adventure?'; ?></h2>
        <a href="https://tickets.dohaquest.com" target="_blank" class="btn-hero-book">
            <?php echo $is_ar ? 'احجز تذاكرك الآن' : 'Book Your Tickets Now'; ?>
        </a>
    </div>
</div>
