<?php 
require_once('includes/db_connect.php');
require_once('includes/config.php');
require_once('includes/functions.php');

$booking_ref = isset($_GET['ref']) ? sanitize($_GET['ref']) : generateBookingRef();
$booking_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

require_once('partials/header.php'); 
?>

<div class="container" style="min-height: 60vh; display: flex; align-items: center; justify-content: center; text-align: center;">
    <div style="max-width: 500px; padding: 40px; background: var(--surface-alt); border-radius: 30px; border: 1px solid var(--outline); box-shadow: var(--shadow); width: 100%;">
        
        <div style="width: 80px; height: 80px; background: #e8f5e9; color: var(--success); font-size: 3rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
            ✔
        </div>

        <h1 style="color: var(--success); margin-bottom: 10px;"><?php echo __('booking_success_title'); ?></h1>
        <p style="font-size: 1.1rem; opacity: 0.8; margin-bottom: 30px;">
            <?php echo __('booking_success_msg'); ?>
        </p>

        <div style="background: rgba(0,0,0,0.03); padding: 15px; border-radius: 12px; margin-bottom: 30px;">
            <p style="margin-bottom: 5px; font-size: 0.9rem;"><?php echo __('booking_ref'); ?></p>
            <h2 style="letter-spacing: 2px; color: var(--primary);">#<?php echo $booking_ref; ?></h2>
        </div>

        <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
            <?php if (isLoggedIn()): ?>
            <a href="user/bookings.php" class="btn-primary" style="padding: 12px 30px;">
                <?php echo __('menu_my_bookings'); ?>
            </a>
            <?php endif; ?>
            <a href="index.php" class="btn-primary" style="background: transparent; color: var(--text); border: 1px solid var(--outline);">
                <?php echo __('back_home'); ?>
            </a>
        </div>
    </div>
</div>

<?php require_once('partials/footer.php'); ?>
