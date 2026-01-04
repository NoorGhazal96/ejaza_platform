<?php require_once('partials/header.php'); ?>

<section class="hero-section" style="padding: 60px 0 80px; background: var(--surface-alt); border-bottom: 1px solid var(--outline); border-radius: 0;">
    <div class="container" style="text-align: center;">
        <h1 style="font-size: 2.5rem; color: var(--primary); margin-bottom: 10px;">
            <?php echo __('terms_title'); ?>
        </h1>
        <p style="font-size: 1rem; opacity: 0.7;">
            <?php echo __('last_updated'); ?>: 20 May 2025
        </p>
    </div>
</section>

<div class="container" style="margin-top: 40px; margin-bottom: 60px;">
    
    <div class="details-layout" style="gap: 50px;">
        
        <div style="flex: 1;">
            
            <div style="margin-bottom: 40px;">
                <h2 style="font-size: 1.6rem; margin-bottom: 20px; color: var(--text);">
                    1. <?php echo __('terms_agreement_title'); ?>
                </h2>
                <p style="line-height: 1.8; opacity: 0.8; margin-bottom: 15px;">
                    <?php echo __('terms_agreement_text'); ?>
                </p>
                <div style="background: rgba(237, 108, 2, 0.1); padding: 15px; border-radius: 12px; border: 1px solid var(--warning); color: var(--text);">
                    <strong><?php echo __('warning_label'); ?>:</strong> <?php echo __('terms_warning_text'); ?>
                </div>
            </div>

            <hr class="m3-divider">

            <div style="margin-bottom: 40px;">
                <h2 style="font-size: 1.6rem; margin-bottom: 20px; color: var(--text);">
                    2. <?php echo __('terms_account_title'); ?>
                </h2>
                <ul style="list-style: disc; padding-inline-start: 20px; opacity: 0.8; line-height: 1.8;">
                    <li style="margin-bottom: 10px;"><?php echo __('terms_account_1'); ?></li>
                    <li style="margin-bottom: 10px;"><?php echo __('terms_account_2'); ?></li>
                    <li style="margin-bottom: 10px;"><?php echo __('terms_account_3'); ?></li>
                    <li style="margin-bottom: 10px;"><?php echo __('terms_account_4'); ?></li>
                </ul>
            </div>

            <hr class="m3-divider">

            <div style="margin-bottom: 40px;">
                <h2 style="font-size: 1.6rem; margin-bottom: 20px; color: var(--text);">
                    3. <?php echo __('terms_booking_title'); ?>
                </h2>
                <div style="display: grid; gap: 20px;">
                    <div style="background: var(--surface-alt); padding: 20px; border-radius: 16px; border: 1px solid var(--outline);">
                        <h3 style="font-size: 1.1rem; color: var(--primary); margin-bottom: 10px;">
                            <?php echo __('payment_policy_title'); ?>
                        </h3>
                        <p style="font-size: 0.95rem; opacity: 0.8;">
                            <?php echo __('payment_policy_desc'); ?>
                        </p>
                    </div>
                    <div style="background: var(--surface-alt); padding: 20px; border-radius: 16px; border: 1px solid var(--outline);">
                        <h3 style="font-size: 1.1rem; color: var(--primary); margin-bottom: 10px;">
                            <?php echo __('booking_confirm_title'); ?>
                        </h3>
                        <p style="font-size: 0.95rem; opacity: 0.8;">
                            <?php echo __('booking_confirm_desc'); ?>
                        </p>
                    </div>
                    <div style="background: var(--surface-alt); padding: 20px; border-radius: 16px; border: 1px solid var(--outline);">
                        <h3 style="font-size: 1.1rem; color: var(--primary); margin-bottom: 10px;">
                            <?php echo __('price_fees_title'); ?>
                        </h3>
                        <p style="font-size: 0.95rem; opacity: 0.8;">
                            <?php echo __('price_fees_desc'); ?>
                        </p>
                    </div>
                </div>
            </div>

            <hr class="m3-divider">

            <div style="margin-bottom: 40px;">
                <h2 style="font-size: 1.6rem; margin-bottom: 20px; color: var(--text);">
                    4. <?php echo __('cancellation_refund_title'); ?>
                </h2>
                <p style="line-height: 1.8; opacity: 0.8; margin-bottom: 15px;">
                    <?php echo __('cancellation_intro'); ?>
                </p>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 15px; display: flex; align-items: flex-start; gap: 10px;">
                        <span style="color: var(--success);">✔</span>
                        <span style="opacity: 0.8;"><strong><?php echo __('cancel_flexible'); ?>:</strong> <?php echo __('cancel_flexible_desc'); ?></span>
                    </li>
                    <li style="margin-bottom: 15px; display: flex; align-items: flex-start; gap: 10px;">
                        <span style="color: var(--warning);">⚠</span>
                        <span style="opacity: 0.8;"><strong><?php echo __('cancel_moderate'); ?>:</strong> <?php echo __('cancel_moderate_desc'); ?></span>
                    </li>
                    <li style="margin-bottom: 15px; display: flex; align-items: flex-start; gap: 10px;">
                        <span style="color: var(--error);">✖</span>
                        <span style="opacity: 0.8;"><strong><?php echo __('cancel_strict'); ?>:</strong> <?php echo __('cancel_strict_desc'); ?></span>
                    </li>
                </ul>
            </div>

            <hr class="m3-divider">

            <div style="margin-bottom: 40px;">
                <h2 style="font-size: 1.6rem; margin-bottom: 20px; color: var(--text);">
                    5. <?php echo __('disclaimer_title'); ?>
                </h2>
                <p style="line-height: 1.8; opacity: 0.8;">
                    <?php echo __('disclaimer_text'); ?>
                </p>
            </div>

        </div>

        <div style="min-width: 260px;">
            <div style="background: var(--surface-alt); padding: 25px; border-radius: 20px; border: 1px solid var(--outline); position: sticky; top: 100px;">
                <h3 style="margin-bottom: 20px; color: var(--primary);">
                    <?php echo __('important_links'); ?>
                </h3>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 15px;">
                        <a href="privacy.php" style="display: flex; align-items: center; gap: 10px; color: var(--text); opacity: 0.8;">
                            <span>🔒</span> <?php echo __('privacy_policy'); ?>
                        </a>
                    </li>
                    <li style="margin-bottom: 15px;">
                        <a href="about.php" style="display: flex; align-items: center; gap: 10px; color: var(--text); opacity: 0.8;">
                            <span>ℹ️</span> <?php echo __('nav_about'); ?>
                        </a>
                    </li>
                    <li style="margin-bottom: 15px;">
                        <a href="contact.php" style="display: flex; align-items: center; gap: 10px; color: var(--text); opacity: 0.8;">
                            <span>📞</span> <?php echo __('contact_us'); ?>
                        </a>
                    </li>
                </ul>
                <div class="m3-divider"></div>
                <p style="font-size: 0.85rem; opacity: 0.6; text-align: center;">
                    <?php echo __('copyright'); ?> &copy; <?php echo date('Y'); ?>
                </p>
            </div>
        </div>

    </div>

</div>

<?php require_once('partials/footer.php'); ?>