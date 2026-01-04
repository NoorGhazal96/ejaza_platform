<?php $current_page = basename($_SERVER['PHP_SELF']); ?>

<aside class="dash-sidebar">
    <div class="dash-logo">
        <a href="../index.php">
            <img src="../assets/img/logo.png" alt="Ejaza" style="height: 50px;">
        </a>
    </div>
    
    <div style="background: rgba(5, 124, 200, 0.1); color: var(--primary); padding: 5px 12px; border-radius: 8px; font-size: 0.8rem; display: inline-block; margin-bottom: 25px; align-self: flex-start; font-weight: bold;">
        <?php echo __('user_badge'); ?> 👤
    </div>
    
    <nav class="dash-nav">
        <a href="index.php" class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
            📊 <?php echo __('dash_overview'); ?>
        </a>
        
        <a href="bookings.php" class="<?php echo ($current_page == 'bookings.php') ? 'active' : ''; ?>">
            📅 <?php echo __('menu_my_bookings'); ?>
        </a>
        
        <a href="favorites.php" class="<?php echo ($current_page == 'favorites.php') ? 'active' : ''; ?>">
            ❤️ <?php echo __('menu_favorites'); ?>
        </a>
        
        <a href="profile.php" class="<?php echo ($current_page == 'profile.php') ? 'active' : ''; ?>">
            ⚙️ <?php echo __('menu_profile'); ?>
        </a>
        
        <div class="m3-divider"></div>
        
        <a href="../index.php" style="color: var(--error);">
            ⬅️ <?php echo __('back_home'); ?>
        </a>
    </nav>
</aside>