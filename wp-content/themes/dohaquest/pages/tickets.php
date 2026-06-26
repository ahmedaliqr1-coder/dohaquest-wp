<?php
$is_ar = ($lang === 'ar');
$base = home_url('/' . $lang);
?>

<!-- Page Hero -->
<div class="page-hero" style="background:linear-gradient(135deg,#520b75,#1a0a2e);padding:120px 0 60px;text-align:center;color:white;">
    <div class="container">
        <h1 class="fixed-title white"><?php echo $is_ar ? 'احجز تذاكرك' : 'Book Your Tickets'; ?></h1>
        <p><?php echo $is_ar ? 'استمتع بأفضل أسعارنا عند الحجز عبر الإنترنت' : 'Enjoy our best prices when booking online'; ?></p>
    </div>
</div>

<div class="tickets-page" style="padding:60px 0;background:#f8f4ff;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                
                <!-- Ticket Types -->
                <div class="ticket-types" style="margin-bottom:40px;">
                    <h2 style="color:#520b75;text-align:center;margin-bottom:30px;">
                        <?php echo $is_ar ? 'اختر نوع التذكرة' : 'Choose Your Ticket'; ?>
                    </h2>
                    <div class="row g-3">
                        <div class="col-12 col-md-4">
                            <label class="ticket-type-card" style="display:block;border:2px solid #ddd;border-radius:12px;padding:20px;text-align:center;cursor:pointer;transition:all 0.3s;">
                                <input type="radio" name="ticket_type" value="general" style="display:none;" onchange="selectTicket(this)">
                                <div class="ticket-icon" style="font-size:40px;margin-bottom:10px;">🎫</div>
                                <h4 style="color:#520b75;"><?php echo $is_ar ? 'تذكرة عامة' : 'General Admission'; ?></h4>
                                <div class="price" style="font-size:24px;font-weight:bold;color:#f0a500;">150 QAR</div>
                                <p style="font-size:13px;color:#666;"><?php echo $is_ar ? 'الدخول لجميع الألعاب' : 'Access to all rides'; ?></p>
                            </label>
                        </div>
                        <div class="col-12 col-md-4">
                            <label class="ticket-type-card" style="display:block;border:2px solid #ddd;border-radius:12px;padding:20px;text-align:center;cursor:pointer;transition:all 0.3s;background:#520b75;color:white;">
                                <input type="radio" name="ticket_type" value="premium" style="display:none;" onchange="selectTicket(this)">
                                <div class="ticket-icon" style="font-size:40px;margin-bottom:10px;">⭐</div>
                                <h4 style="color:white;"><?php echo $is_ar ? 'تذكرة بريميوم' : 'Premium'; ?></h4>
                                <div class="price" style="font-size:24px;font-weight:bold;color:#f0a500;">220 QAR</div>
                                <p style="font-size:13px;color:rgba(255,255,255,0.8);"><?php echo $is_ar ? 'دخول سريع + مزايا إضافية' : 'Fast pass + extras'; ?></p>
                                <span style="background:#f0a500;color:#520b75;padding:3px 10px;border-radius:20px;font-size:11px;font-weight:bold;"><?php echo $is_ar ? 'الأكثر شعبية' : 'MOST POPULAR'; ?></span>
                            </label>
                        </div>
                        <div class="col-12 col-md-4">
                            <label class="ticket-type-card" style="display:block;border:2px solid #ddd;border-radius:12px;padding:20px;text-align:center;cursor:pointer;transition:all 0.3s;">
                                <input type="radio" name="ticket_type" value="family" style="display:none;" onchange="selectTicket(this)">
                                <div class="ticket-icon" style="font-size:40px;margin-bottom:10px;">👨‍👩‍👧‍👦</div>
                                <h4 style="color:#520b75;"><?php echo $is_ar ? 'باقة عائلية' : 'Family Package'; ?></h4>
                                <div class="price" style="font-size:24px;font-weight:bold;color:#f0a500;">500 QAR</div>
                                <p style="font-size:13px;color:#666;"><?php echo $is_ar ? '2 بالغ + 2 طفل' : '2 adults + 2 children'; ?></p>
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- Booking Form -->
                <div class="booking-form" style="background:white;border-radius:16px;padding:40px;box-shadow:0 4px 20px rgba(0,0,0,0.08);">
                    <h3 style="color:#520b75;margin-bottom:25px;">
                        <?php echo $is_ar ? 'تفاصيل الحجز' : 'Booking Details'; ?>
                    </h3>
                    
                    <form id="booking-form">
                        <!-- Personal Info -->
                        <div class="row g-3 mb-4">
                            <div class="col-12 col-md-6">
                                <label style="font-weight:600;color:#333;"><?php echo $is_ar ? 'الاسم الكامل *' : 'Full Name *'; ?></label>
                                <input type="text" id="book-name" required placeholder="<?php echo $is_ar ? 'أدخل اسمك الكامل' : 'Enter your full name'; ?>" style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;margin-top:5px;font-size:15px;">
                            </div>
                            <div class="col-12 col-md-6">
                                <label style="font-weight:600;color:#333;"><?php echo $is_ar ? 'البريد الإلكتروني *' : 'Email Address *'; ?></label>
                                <input type="email" id="book-email" required placeholder="<?php echo $is_ar ? 'أدخل بريدك الإلكتروني' : 'Enter your email'; ?>" style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;margin-top:5px;font-size:15px;">
                            </div>
                            <div class="col-12 col-md-6">
                                <label style="font-weight:600;color:#333;"><?php echo $is_ar ? 'رقم الهاتف' : 'Phone Number'; ?></label>
                                <input type="tel" id="book-phone" placeholder="<?php echo $is_ar ? '+974 XXXX XXXX' : '+974 XXXX XXXX'; ?>" style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;margin-top:5px;font-size:15px;">
                            </div>
                            <div class="col-12 col-md-6">
                                <label style="font-weight:600;color:#333;"><?php echo $is_ar ? 'تاريخ الزيارة *' : 'Visit Date *'; ?></label>
                                <input type="date" id="book-date" required min="<?php echo date('Y-m-d'); ?>" style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;margin-top:5px;font-size:15px;">
                            </div>
                            <div class="col-12 col-md-6">
                                <label style="font-weight:600;color:#333;"><?php echo $is_ar ? 'عدد التذاكر *' : 'Number of Tickets *'; ?></label>
                                <select id="book-qty" style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;margin-top:5px;font-size:15px;">
                                    <?php for($i=1;$i<=10;$i++) echo "<option value='$i'>$i</option>"; ?>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label style="font-weight:600;color:#333;"><?php echo $is_ar ? 'نوع التذكرة *' : 'Ticket Type *'; ?></label>
                                <select id="book-ticket-type" style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;margin-top:5px;font-size:15px;">
                                    <option value="general"><?php echo $is_ar ? 'تذكرة عامة - 150 QAR' : 'General Admission - 150 QAR'; ?></option>
                                    <option value="premium"><?php echo $is_ar ? 'تذكرة بريميوم - 220 QAR' : 'Premium - 220 QAR'; ?></option>
                                    <option value="family"><?php echo $is_ar ? 'باقة عائلية - 500 QAR' : 'Family Package - 500 QAR'; ?></option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Payment Info (Test) -->
                        <div class="payment-section" style="border-top:1px solid #eee;padding-top:25px;margin-top:10px;">
                            <h4 style="color:#520b75;margin-bottom:20px;">
                                <i class="fa fa-lock" style="margin-right:8px;"></i>
                                <?php echo $is_ar ? 'معلومات الدفع (تجريبي)' : 'Payment Information (Test)'; ?>
                            </h4>
                            <div style="background:#fff3cd;border:1px solid #ffc107;border-radius:8px;padding:12px;margin-bottom:20px;font-size:13px;">
                                ⚠️ <?php echo $is_ar ? 'هذا نموذج تجريبي. لا يتم معالجة أي مدفوعات حقيقية.' : 'This is a test form. No real payments are processed.'; ?>
                            </div>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label style="font-weight:600;color:#333;"><?php echo $is_ar ? 'رقم البطاقة *' : 'Card Number *'; ?></label>
                                    <input type="text" id="card-number" placeholder="4242 4242 4242 4242" maxlength="19" style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;margin-top:5px;font-size:15px;letter-spacing:2px;" oninput="formatCard(this)">
                                </div>
                                <div class="col-12">
                                    <label style="font-weight:600;color:#333;"><?php echo $is_ar ? 'اسم حامل البطاقة *' : 'Cardholder Name *'; ?></label>
                                    <input type="text" id="card-name" placeholder="<?php echo $is_ar ? 'الاسم كما يظهر على البطاقة' : 'Name as on card'; ?>" style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;margin-top:5px;font-size:15px;">
                                </div>
                                <div class="col-6">
                                    <label style="font-weight:600;color:#333;"><?php echo $is_ar ? 'تاريخ الانتهاء *' : 'Expiry Date *'; ?></label>
                                    <input type="text" id="card-expiry" placeholder="MM/YY" maxlength="5" style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;margin-top:5px;font-size:15px;" oninput="formatExpiry(this)">
                                </div>
                                <div class="col-6">
                                    <label style="font-weight:600;color:#333;">CVV *</label>
                                    <input type="text" id="card-cvv" placeholder="123" maxlength="4" style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;margin-top:5px;font-size:15px;">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Total & Submit -->
                        <div style="border-top:1px solid #eee;padding-top:25px;margin-top:25px;">
                            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
                                <span style="font-size:18px;font-weight:600;"><?php echo $is_ar ? 'المجموع:' : 'Total:'; ?></span>
                                <span id="total-price" style="font-size:28px;font-weight:bold;color:#520b75;">150 QAR</span>
                            </div>
                            <button type="submit" class="btn-hero-book" style="width:100%;font-size:18px;padding:15px;">
                                <i class="fa fa-lock" style="margin-right:8px;"></i>
                                <?php echo $is_ar ? 'تأكيد الحجز' : 'Confirm Booking'; ?>
                            </button>
                        </div>
                    </form>
                    
                    <!-- Success Message -->
                    <div id="booking-success" style="display:none;text-align:center;padding:40px;">
                        <div style="font-size:60px;margin-bottom:20px;">🎉</div>
                        <h3 style="color:#28a745;"><?php echo $is_ar ? 'تم الحجز بنجاح!' : 'Booking Confirmed!'; ?></h3>
                        <p><?php echo $is_ar ? 'سيتم إرسال تفاصيل حجزك إلى بريدك الإلكتروني.' : 'Your booking details will be sent to your email.'; ?></p>
                        <p id="booking-ref" style="font-size:20px;font-weight:bold;color:#520b75;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function formatCard(input) {
    var v = input.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
    var matches = v.match(/\d{4,16}/g);
    var match = matches && matches[0] || '';
    var parts = [];
    for (var i=0, len=match.length; i<len; i+=4) {
        parts.push(match.substring(i, i+4));
    }
    input.value = parts.length ? parts.join(' ') : v;
    updateTotal();
}

function formatExpiry(input) {
    var v = input.value.replace(/\D/g, '');
    if (v.length >= 2) v = v.substring(0,2) + '/' + v.substring(2);
    input.value = v;
}

function updateTotal() {
    var type = document.getElementById('book-ticket-type').value;
    var qty = parseInt(document.getElementById('book-qty').value) || 1;
    var prices = {general: 150, premium: 220, family: 500};
    var total = (prices[type] || 150) * qty;
    document.getElementById('total-price').textContent = total + ' QAR';
}

document.getElementById('book-ticket-type').addEventListener('change', updateTotal);
document.getElementById('book-qty').addEventListener('change', updateTotal);

document.getElementById('booking-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    var btn = this.querySelector('button[type=submit]');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> <?php echo $is_ar ? "جاري المعالجة..." : "Processing..."; ?>';
    
    var data = new FormData();
    data.append('action', 'dq_book_ticket');
    data.append('nonce', '<?php echo wp_create_nonce('dohaquest_nonce'); ?>');
    data.append('name', document.getElementById('book-name').value);
    data.append('email', document.getElementById('book-email').value);
    data.append('phone', document.getElementById('book-phone').value);
    data.append('date', document.getElementById('book-date').value);
    data.append('quantity', document.getElementById('book-qty').value);
    data.append('ticket_type', document.getElementById('book-ticket-type').value);
    data.append('card_number', document.getElementById('card-number').value);
    data.append('card_name', document.getElementById('card-name').value);
    
    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {method:'POST', body: data})
        .then(r => r.json())
        .then(d => {
            if (d.success) {
                document.getElementById('booking-form').style.display = 'none';
                document.getElementById('booking-success').style.display = 'block';
                document.getElementById('booking-ref').textContent = '<?php echo $is_ar ? "رقم الحجز:" : "Booking #"; ?>' + d.data.booking_id;
            }
        });
});

function selectTicket(radio) {
    document.querySelectorAll('.ticket-type-card').forEach(function(card) {
        card.style.border = '2px solid #ddd';
        card.style.background = '';
        card.querySelector('h4').style.color = '#520b75';
    });
    var label = radio.closest('label');
    label.style.border = '2px solid #520b75';
    label.style.background = '#f8f4ff';
    document.getElementById('book-ticket-type').value = radio.value;
    updateTotal();
}
</script>
