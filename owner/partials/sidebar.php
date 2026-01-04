<?php
// تحديد اسم الصفحة الحالية لتفعيل الزر المناسب
$current_page = basename($_SERVER['PHP_SELF']);
?>

<aside class="dash-sidebar">
    <div class="dash-logo">
        <img src="../assets/img/logo.png" alt="Ejaza Logo" style="height: 50px;">
    </div>
    
    <div style="background: var(--primary); color: white; padding: 5px 12px; border-radius: 8px; font-size: 0.8rem; display: inline-block; margin-bottom: 25px; align-self: flex-start; font-weight: bold;">
        <?php echo __('owner_badge'); ?> 🏠
    </div>
    
    <nav class="dash-nav">
        <a href="index.php" class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
            📊 <?php echo __('dash_overview'); ?>
        </a>

        <a href="my-chalets.php" class="<?php echo ($current_page == 'my-chalets.php') ? 'active' : ''; ?>">
            🏠 <?php echo __('menu_my_chalets'); ?>
        </a>

        <a href="bookings.php" class="<?php echo ($current_page == 'bookings.php') ? 'active' : ''; ?>">
            📅 <?php echo __('menu_bookings'); ?>
        </a>

        <a href="add-chalet.php" class="<?php echo ($current_page == 'add-chalet.php') ? 'active' : ''; ?>">
            ➕ <?php echo __('menu_add_chalet'); ?>
        </a>
        
        <div class="m3-divider"></div>
        
        <a href="../index.php" style="color: var(--error);">
            ⬅️ <?php echo __('back_home'); ?>
        </a>
    </nav>
</aside>