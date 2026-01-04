<?php require_once('partials/header.php'); ?>

<div class="auth-container">
    <div class="auth-card">
        <div style="margin-bottom: 30px;">
            <img src="assets/img/logo.png" alt="Ejaza" style="height: 60px; margin-bottom: 20px;">
            <h2 style="font-size: 1.8rem; color: var(--primary);"><?php echo __('welcome_back'); ?></h2>
            <p style="opacity: 0.7;"><?php echo __('login_subtitle'); ?></p>
        </div>

        <form action="user/index.php"> 
            
            <div style="margin-bottom: 20px;">
                <label class="filter-label"><?php echo __('email'); ?></label>
                <input type="email" class="m3-input" placeholder="name@example.com" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label class="filter-label"><?php echo __('password'); ?></label>
                <input type="password" class="m3-input" placeholder="••••••••" required>
            </div>

            <div style="display: flex; justify-content: space-between; margin-bottom: 30px; font-size: 0.9rem;">
                <label class="m3-checkbox">
                    <input type="checkbox"> <span><?php echo __('remember_me'); ?></span>
                </label>
                <a href="#" style="color: var(--primary);"><?php echo __('forgot_password'); ?></a>
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; font-size: 1.1rem; padding: 12px;">
                <?php echo __('login_btn'); ?>
            </button>
        </form>

        <div class="m3-divider"></div>

        <p style="font-size: 0.9rem;">
            <?php echo __('no_account'); ?> 
            <a href="register.php" style="color: var(--primary); font-weight: bold;"><?php echo __('create_account'); ?></a>
        </p>
    </div>
</div>

<?php require_once('partials/footer.php'); ?>