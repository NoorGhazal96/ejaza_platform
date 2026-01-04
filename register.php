<?php 
require_once('partials/header.php'); 

// التحقق مما إذا كان التسجيل كمالك (قادم من رابط ?type=owner)
$is_owner = (isset($_GET['type']) && $_GET['type'] == 'owner');
?>

<div class="auth-container">
    <div class="auth-card">
        <div style="margin-bottom: 30px;">
            <h2 style="font-size: 1.8rem; color: var(--primary);">
                <?php echo $is_owner ? __('register_owner_title') : __('create_account_title'); ?>
            </h2>
            <p style="opacity: 0.7;">
                <?php echo $is_owner ? __('register_owner_subtitle') : __('create_account_subtitle'); ?>
            </p>
        </div>

        <form action="<?php echo $is_owner ? 'owner/index.php' : 'user/index.php'; ?>">
            
            <div style="margin-bottom: 20px;">
                <label class="filter-label"><?php echo __('full_name'); ?></label>
                <input type="text" class="m3-input" placeholder="<?php echo __('name_placeholder'); ?>" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label class="filter-label"><?php echo __('email'); ?></label>
                <input type="email" class="m3-input" placeholder="name@example.com" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label class="filter-label"><?php echo __('phone'); ?></label>
                <input type="tel" class="m3-input" placeholder="05xxxxxxxx" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label class="filter-label"><?php echo __('password'); ?></label>
                <input type="password" class="m3-input" placeholder="••••••••" required>
            </div>

            <div style="margin-bottom: 30px;">
                <label class="m3-checkbox">
                    <input type="checkbox" required> 
                    <span style="font-size: 0.9rem;">
                        <?php echo __('agree_to'); ?> 
                        <a href="terms.php" style="color: var(--primary);"><?php echo __('terms_and_conditions'); ?></a>
                    </span>
                </label>
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; font-size: 1.1rem; padding: 12px;">
                <?php echo __('register_btn'); ?>
            </button>
        </form>

        <div class="m3-divider"></div>

        <p style="font-size: 0.9rem;">
            <?php echo __('already_have_account'); ?> 
            <a href="login.php" style="color: var(--primary); font-weight: bold;"><?php echo __('login_btn'); ?></a>
        </p>
    </div>
</div>

<?php require_once('partials/footer.php'); ?>