<?php 
require_once('includes/db_connect.php');
require_once('includes/config.php');
require_once('includes/functions.php');

$chalet_id = isset($_GET['chalet_id']) ? (int)$_GET['chalet_id'] : 0;
$check_in = isset($_GET['check_in']) ? sanitize($_GET['check_in']) : date('Y-m-d');
$check_out = isset($_GET['check_out']) ? sanitize($_GET['check_out']) : date('Y-m-d', strtotime('+1 day'));
$guests = isset($_GET['guests']) ? (int)$_GET['guests'] : 2;

$stmt = $pdo->prepare("SELECT * FROM chalets WHERE id = ? AND status = 'active'");
$stmt->execute([$chalet_id]);
$chalet = $stmt->fetch();

if (!$chalet) {
    header('Location: index.php');
    exit;
}

$nights = calculateNights($check_in, $check_out);
if ($nights < 1) $nights = 1;

$subtotal = $chalet['price'] * $nights;
$cleaning_fee = 150;
$service_fee = round($subtotal * 0.05);
$total = $subtotal + $cleaning_fee + $service_fee;

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isLoggedIn()) {
        $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
        header('Location: login.php');
        exit;
    }
    
    $first_name = sanitize($_POST['first_name'] ?? '');
    $last_name = sanitize($_POST['last_name'] ?? '');
    $phone = sanitize($_POST['phone'] ?? '');
    
    if (empty($first_name) || empty($phone)) {
        $error = ($lang == 'ar') ? 'الرجاء ملء جميع الحقول المطلوبة' : 'Please fill all required fields';
    } else {
        $booking_ref = generateBookingRef();
        
        $stmt = $pdo->prepare("INSERT INTO bookings (user_id, chalet_id, check_in, check_out, guests, total_price, status) VALUES (?, ?, ?, ?, ?, ?, 'confirmed')");
        
        if ($stmt->execute([$_SESSION['user_id'], $chalet_id, $check_in, $check_out, $guests, $total])) {
            $booking_id = $pdo->lastInsertId();
            header("Location: booking-success.php?ref=$booking_ref&id=$booking_id");
            exit;
        } else {
            $error = ($lang == 'ar') ? 'حدث خطأ، حاول مرة أخرى' : 'An error occurred, please try again';
        }
    }
}

require_once('partials/header.php'); 
?>

<div class="container" style="margin-top: 40px; margin-bottom: 60px;">
    <h1 style="margin-bottom: 30px; font-size: 1.8rem;"><?php echo __('checkout_title'); ?></h1>

    <?php if ($error): ?>
    <div style="background: #ffebee; color: #c62828; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
        <?php echo $error; ?>
    </div>
    <?php endif; ?>

    <form method="POST" action="">
    <div class="details-layout">
        
        <div style="flex: 1;">
            
            <div style="background: var(--surface-alt); padding: 25px; border-radius: 20px; border: 1px solid var(--outline); margin-bottom: 25px;">
                <h3 style="margin-bottom: 20px; color: var(--primary);">1. <?php echo __('personal_info'); ?></h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label class="filter-label"><?php echo __('first_name'); ?></label>
                        <input type="text" name="first_name" class="m3-input" value="<?php echo isset($_SESSION['user_name']) ? explode(' ', $_SESSION['user_name'])[0] : ''; ?>" required>
                    </div>
                    <div>
                        <label class="filter-label"><?php echo __('last_name'); ?></label>
                        <input type="text" name="last_name" class="m3-input" value="<?php echo isset($_SESSION['user_name']) && count(explode(' ', $_SESSION['user_name'])) > 1 ? explode(' ', $_SESSION['user_name'])[1] : ''; ?>">
                    </div>
                    <div style="grid-column: span 2;">
                        <label class="filter-label"><?php echo __('phone'); ?></label>
                        <input type="tel" name="phone" class="m3-input" placeholder="05xxxxxxxx" required>
                    </div>
                </div>
            </div>

            <div style="background: var(--surface-alt); padding: 25px; border-radius: 20px; border: 1px solid var(--outline);">
                <h3 style="margin-bottom: 20px; color: var(--primary);">2. <?php echo __('secure_payment'); ?></h3>
                
                <div style="display: flex; gap: 10px; margin-bottom: 20px;">
                    <div style="border: 1px solid var(--primary); padding: 5px 15px; border-radius: 8px; background: rgba(5, 124, 200, 0.1);">Mada / Visa</div>
                    <div style="border: 1px solid var(--outline); padding: 5px 15px; border-radius: 8px; opacity: 0.5;">Apple Pay</div>
                </div>

                <div style="margin-bottom: 15px;">
                    <label class="filter-label"><?php echo __('card_number'); ?></label>
                    <input type="text" class="m3-input" placeholder="0000 0000 0000 0000">
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label class="filter-label"><?php echo __('expiry_date'); ?></label>
                        <input type="text" class="m3-input" placeholder="MM/YY">
                    </div>
                    <div>
                        <label class="filter-label"><?php echo __('cvc_code'); ?></label>
                        <input type="text" class="m3-input" placeholder="123">
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; padding: 15px; margin-top: 30px; font-size: 1.2rem;">
                <?php echo __('confirm_pay'); ?> <?php echo formatPrice($total); ?>
            </button>
            <p style="text-align: center; font-size: 0.8rem; margin-top: 10px; opacity: 0.7;">
                <?php echo __('agree_terms'); ?>
            </p>

        </div>

        <div style="width: 100%; max-width: 400px;">
            <div style="background: var(--surface-alt); padding: 25px; border-radius: 20px; border: 1px solid var(--outline); position: sticky; top: 100px;">
                <h3 style="margin-bottom: 20px;"><?php echo __('booking_summary'); ?></h3>
                
                <div style="display: flex; gap: 15px; margin-bottom: 20px;">
                    <img src="<?php echo $chalet['image_url'] ?: 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=150'; ?>" style="width: 80px; height: 80px; border-radius: 12px; object-fit: cover;">
                    <div>
                        <h4 style="font-size: 1rem; margin-bottom: 5px;"><?php echo ($lang == 'ar') ? $chalet['name_ar'] : ($chalet['name_en'] ?: $chalet['name_ar']); ?></h4>
                        <div style="font-size: 0.9rem;">★ <?php echo number_format($chalet['rating'], 1); ?> (<?php echo $chalet['reviews_count']; ?> <?php echo __('reviews'); ?>)</div>
                    </div>
                </div>

                <hr class="m3-divider">

                <div style="margin-bottom: 15px;">
                    <div style="font-weight: bold; font-size: 0.9rem; margin-bottom: 5px;"><?php echo __('dates'); ?></div>
                    <div style="opacity: 0.8; font-size: 0.9rem;"><?php echo $check_in; ?> - <?php echo $check_out; ?> (<?php echo $nights; ?> <?php echo __('nights'); ?>)</div>
                </div>
                <div style="margin-bottom: 15px;">
                    <div style="font-weight: bold; font-size: 0.9rem; margin-bottom: 5px;"><?php echo __('guests'); ?></div>
                    <div style="opacity: 0.8; font-size: 0.9rem;"><?php echo $guests; ?> <?php echo __('adults'); ?></div>
                </div>

                <hr class="m3-divider">

                <div style="display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 0.9rem;">
                    <span><?php echo formatPrice($chalet['price']); ?> × <?php echo $nights; ?> <?php echo __('nights'); ?></span>
                    <span><?php echo formatPrice($subtotal); ?></span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 0.9rem;">
                    <span><?php echo __('cleaning_fee'); ?></span>
                    <span><?php echo formatPrice($cleaning_fee); ?></span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 0.9rem;">
                    <span><?php echo __('service_fee'); ?></span>
                    <span><?php echo formatPrice($service_fee); ?></span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-top: 15px; font-weight: bold; font-size: 1.1rem; color: var(--primary);">
                    <span><?php echo __('total'); ?></span>
                    <span><?php echo formatPrice($total); ?></span>
                </div>
            </div>
        </div>

    </div>
    </form>
</div>

<?php require_once('partials/footer.php'); ?>
