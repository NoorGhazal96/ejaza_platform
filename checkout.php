<?php require_once('partials/header.php'); ?>

<div class="container" style="margin-top: 40px; margin-bottom: 60px;">
    <h1 style="margin-bottom: 30px; font-size: 1.8rem;"><?php echo __('checkout_title'); ?></h1>

    <div class="details-layout">
        
        <div style="flex: 1;">
            
            <div style="background: var(--surface-alt); padding: 25px; border-radius: 20px; border: 1px solid var(--outline); margin-bottom: 25px;">
                <h3 style="margin-bottom: 20px; color: var(--primary);">1. <?php echo __('personal_info'); ?></h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label class="filter-label"><?php echo __('first_name'); ?></label>
                        <input type="text" class="m3-input" value="محمد">
                    </div>
                    <div>
                        <label class="filter-label"><?php echo __('last_name'); ?></label>
                        <input type="text" class="m3-input" value="العلي">
                    </div>
                    <div style="grid-column: span 2;">
                        <label class="filter-label"><?php echo __('phone'); ?></label>
                        <input type="tel" class="m3-input" value="0551234567">
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
            
            <a href="booking-success.php" class="btn-primary" style="width: 100%; justify-content: center; padding: 15px; margin-top: 30px; font-size: 1.2rem;">
                <?php echo __('confirm_pay'); ?> <?php echo formatPrice(2550); ?>
            </a>
            <p style="text-align: center; font-size: 0.8rem; margin-top: 10px; opacity: 0.7;">
                <?php echo __('agree_terms'); ?>
            </p>

        </div>

        <div style="width: 100%; max-width: 400px;">
            <div style="background: var(--surface-alt); padding: 25px; border-radius: 20px; border: 1px solid var(--outline); position: sticky; top: 100px;">
                <h3 style="margin-bottom: 20px;"><?php echo __('booking_summary'); ?></h3>
                
                <div style="display: flex; gap: 15px; margin-bottom: 20px;">
                    <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=150" style="width: 80px; height: 80px; border-radius: 12px; object-fit: cover;">
                    <div>
                        <h4 style="font-size: 1rem; margin-bottom: 5px;">شاليه النسيم الفاخر</h4>
                        <div style="font-size: 0.9rem;">★ 4.9 (120 <?php echo __('reviews'); ?>)</div>
                    </div>
                </div>

                <hr class="m3-divider">

                <div style="margin-bottom: 15px;">
                    <div style="font-weight: bold; font-size: 0.9rem; margin-bottom: 5px;"><?php echo __('dates'); ?></div>
                    <div style="opacity: 0.8; font-size: 0.9rem;">20 May - 22 May (2 <?php echo __('nights'); ?>)</div>
                </div>
                <div style="margin-bottom: 15px;">
                    <div style="font-weight: bold; font-size: 0.9rem; margin-bottom: 5px;"><?php echo __('guests'); ?></div>
                    <div style="opacity: 0.8; font-size: 0.9rem;">2 <?php echo __('adults'); ?>, 1 <?php echo __('child'); ?></div>
                </div>

                <hr class="m3-divider">

                <div style="display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 0.9rem;">
                    <span><?php echo formatPrice(1200); ?> × 2 <?php echo __('nights'); ?></span>
                    <span><?php echo formatPrice(2400); ?></span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 0.9rem;">
                    <span><?php echo __('cleaning_fee'); ?></span>
                    <span><?php echo formatPrice(150); ?></span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-top: 15px; font-weight: bold; font-size: 1.1rem; color: var(--primary);">
                    <span><?php echo __('total'); ?></span>
                    <span><?php echo formatPrice(2550); ?></span>
                </div>
            </div>
        </div>

    </div>
</div>

<?php require_once('partials/footer.php'); ?>