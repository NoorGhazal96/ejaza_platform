<?php require_once('partials/header.php'); ?>

<section class="hero-section" style="padding: 60px 0 80px; background: var(--surface-alt); border-bottom: 1px solid var(--outline); border-radius: 0;">
    <div class="container" style="text-align: center;">
        <h1 style="font-size: 2.5rem; color: var(--primary); margin-bottom: 10px;">
            <?php echo __('privacy_title'); ?>
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
                <h2 style="font-size: 1.8rem; margin-bottom: 20px; color: var(--text);">
                    1. <?php echo __('privacy_intro_title'); ?>
                </h2>
                <p style="line-height: 1.8; opacity: 0.8; margin-bottom: 15px;">
                    <?php echo __('privacy_intro_text'); ?>
                </p>
            </div>

            <hr class="m3-divider">

            <div style="margin-bottom: 40px;">
                <h2 style="font-size: 1.8rem; margin-bottom: 20px; color: var(--text);">
                    2. <?php echo __('privacy_collection_title'); ?>
                </h2>
                <ul style="list-style: disc; padding-inline-start: 20px; opacity: 0.8; line-height: 1.8;">
                    <li style="margin-bottom: 10px;">
                        <strong><?php echo __('privacy_col_1_title'); ?>:</strong> <?php echo __('privacy_col_1_desc'); ?>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <strong><?php echo __('privacy_col_2_title'); ?>:</strong> <?php echo __('privacy_col_2_desc'); ?>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <strong><?php echo __('privacy_col_3_title'); ?>:</strong> <?php echo __('privacy_col_3_desc'); ?>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <strong><?php echo __('privacy_col_4_title'); ?>:</strong> <?php echo __('privacy_col_4_desc'); ?>
                    </li>
                </ul>
            </div>

            <hr class="m3-divider">

            <div style="margin-bottom: 40px;">
                <h2 style="font-size: 1.8rem; margin-bottom: 20px; color: var(--text);">
                    3. <?php echo __('privacy_usage_title'); ?>
                </h2>
                <p style="line-height: 1.8; opacity: 0.8; margin-bottom: 15px;">
                    <?php echo __('privacy_usage_intro'); ?>
                </p>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 20px;">
                    <div style="background: var(--surface-alt); padding: 20px; border-radius: 16px; border: 1px solid var(--outline);">
                        <h3 style="font-size: 1.1rem; color: var(--primary); margin-bottom: 10px;">
                            <?php echo __('usage_booking_title'); ?>
                        </h3>
                        <p style="font-size: 0.9rem; opacity: 0.7;">
                            <?php echo __('usage_booking_desc'); ?>
                        </p>
                    </div>
                    <div style="background: var(--surface-alt); padding: 20px; border-radius: 16px; border: 1px solid var(--outline);">
                        <h3 style="font-size: 1.1rem; color: var(--primary); margin-bottom: 10px;">
                            <?php echo __('usage_service_title'); ?>
                        </h3>
                        <p style="font-size: 0.9rem; opacity: 0.7;">
                            <?php echo __('usage_service_desc'); ?>
                        </p>
                    </div>
                    <div style="background: var(--surface-alt); padding: 20px; border-radius: 16px; border: 1px solid var(--outline);">
                        <h3 style="font-size: 1.1rem; color: var(--primary); margin-bottom: 10px;">
                            <?php echo __('usage_security_title'); ?>
                        </h3>
                        <p style="font-size: 0.9rem; opacity: 0.7;">
                            <?php echo __('usage_security_desc'); ?>
                        </p>
                    </div>
                    <div style="background: var(--surface-alt); padding: 20px; border-radius: 16px; border: 1px solid var(--outline);">
                        <h3 style="font-size: 1.1rem; color: var(--primary); margin-bottom: 10px;">
                            <?php echo __('usage_comm_title'); ?>
                        </h3>
                        <p style="font-size: 0.9rem; opacity: 0.7;">
                            <?php echo __('usage_comm_desc'); ?>
                        </p>
                    </div>
                </div>
            </div>

            <hr class="m3-divider">

            <div style="margin-bottom: 40px;">
                <h2 style="font-size: 1.8rem; margin-bottom: 20px; color: var(--text);">
                    4. <?php echo __('privacy_sharing_title'); ?>
                </h2>
                <p style="line-height: 1.8; opacity: 0.8;">
                    <?php echo __('privacy_sharing_text'); ?>
                </p>
                <ul style="list-style: disc; padding-inline-start: 20px; opacity: 0.8; line-height: 1.8; margin-top: 10px;">
                    <li><?php echo __('share_hosts'); ?></li>
                    <li><?php echo __('share_providers'); ?></li>
                    <li><?php echo __('share_legal'); ?></li>
                </ul>
            </div>

        </div>

        <div style="min-width: 280px;">
            <div style="background: var(--surface-alt); padding: 25px; border-radius: 20px; border: 1px solid var(--outline); position: sticky; top: 100px;">
                <h3 style="margin-bottom: 20px; color: var(--primary);">
                    <?php echo __('privacy_contact_title'); ?>
                </h3>
                <p style="font-size: 0.9rem; opacity: 0.7; margin-bottom: 20px;">
                    <?php echo __('privacy_contact_text'); ?>
                </p>
                <a href="mailto:privacy@ejaza.com" style="display: flex; align-items: center; gap: 10px; font-weight: bold; color: var(--text); margin-bottom: 10px;">
                    📧 privacy@ejaza.com
                </a>
                <a href="contact.php" class="btn-primary" style="width: 100%; justify-content: center; font-size: 0.9rem;">
                    <?php echo __('contact_support_btn'); ?>
                </a>
            </div>
        </div>

    </div>

</div>

<?php require_once('partials/footer.php'); ?>