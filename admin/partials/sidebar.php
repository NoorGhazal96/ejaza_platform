<?php
// التأكد من تحديد الصفحة الحالية لتلوين الرابط النشط
$current_page = basename($_SERVER['PHP_SELF']);
?>

<aside class="dash-sidebar" style="border-inline-end-color: var(--primary);">
    <div class="dash-logo">
        <img src="../assets/img/logo.png" alt="Ejaza Logo" style="height: 50px;">
    </div>
    
    <div style="background: #2c3e50; color: white; padding: 5px 12px; border-radius: 8px; font-size: 0.8rem; display: inline-block; margin-bottom: 25px; align-self: flex-start; font-weight: bold;">
        <?php echo __('admin_badge'); ?> 🛡️
    </div>
    
    <nav class="dash-nav">
        <a href="index.php" class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
            📊 <?php echo __('dash_overview'); ?>
        </a>
        
        <a href="chalets.php" class="<?php echo ($current_page == 'chalets.php') ? 'active' : ''; ?>">
            🏠 <?php echo __('menu_chalets'); ?>
            <span style="background: var(--error); color: white; font-size: 0.7rem; padding: 2px 6px; border-radius: 50px; margin-inline-start: auto;">3</span>
        </a>

        <a href="users.php" class="<?php echo ($current_page == 'users.php') ? 'active' : ''; ?>">
            👥 <?php echo __('menu_users'); ?>
        </a>

        <a href="settings.php" class="<?php echo ($current_page == 'settings.php') ? 'active' : ''; ?>">
            ⚙️ <?php echo __('menu_settings'); ?>
        </a>
        
        <div class="m3-divider"></div>
        
        <a href="../index.php" style="color: var(--error);">
            ⬅️ <?php echo __('back_home'); ?>
        </a>
    </nav>
</aside>