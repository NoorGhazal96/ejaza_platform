<?php 
require_once(__DIR__ . '/../includes/db_connect.php');
require_once(__DIR__ . '/../includes/config.php'); 
require_once(__DIR__ . '/../includes/functions.php');

$basePath = '';
if (strpos($_SERVER['SCRIPT_NAME'], '/admin/') !== false || 
    strpos($_SERVER['SCRIPT_NAME'], '/owner/') !== false || 
    strpos($_SERVER['SCRIPT_NAME'], '/user/') !== false) {
    $basePath = '../';
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <title><?php echo __('site_title'); ?></title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    
    <link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/style.css?v=<?php echo time(); ?>">
    
    <?php if($lang == 'ar'): ?>
    <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">
    <?php endif; ?>
</head>
<body>

<header class="md-header">
    
    <div class="header-start">
        <div class="logo">
            <a href="<?php echo $basePath; ?>index.php">
                <img src="<?php echo $basePath; ?>assets/img/logo.png" alt="Ejaza Logo">
            </a>
        </div>

        <nav class="main-nav">
            <a href="<?php echo $basePath; ?>index.php" class="nav-link"><?php echo __('nav_home'); ?></a>
            <a href="<?php echo $basePath; ?>owner/index.php" class="nav-link"><?php echo __('owner_badge'); ?></a>
        </nav>
    </div>

    <div class="header-end">
        
        <button onclick="toggleTheme()" class="icon-btn" title="تغيير المظهر">
            <span id="theme-icon">🌓</span>
        </button>

        <a href="?<?php echo http_build_query(array_merge($_GET, ['lang' => ($lang == 'ar' ? 'en' : 'ar')])); ?>" class="nav-link-btn" style="font-size: 0.9rem; font-weight: bold;">
            🌐 <?php echo ($lang == 'ar') ? 'English' : 'العربية'; ?>
        </a>

        <?php if (isLoggedIn()): ?>
        <div class="dropdown-wrapper">
            <button class="nav-link-btn" onclick="toggleDropdown('user-drop')">
                👤 <?php echo $_SESSION['user_name']; ?>
            </button>
            <div class="dropdown-menu" id="user-drop">
                <?php if ($_SESSION['user_role'] == 'admin'): ?>
                <a href="<?php echo $basePath; ?>admin/index.php">🛠️ <?php echo __('admin_badge'); ?></a>
                <?php elseif ($_SESSION['user_role'] == 'owner'): ?>
                <a href="<?php echo $basePath; ?>owner/index.php">🏠 <?php echo __('menu_my_chalets'); ?></a>
                <?php else: ?>
                <a href="<?php echo $basePath; ?>user/index.php">📋 <?php echo __('menu_my_bookings'); ?></a>
                <?php endif; ?>
                <a href="<?php echo $basePath; ?>logout.php">🚪 <?php echo __('logout'); ?></a>
            </div>
        </div>
        <?php else: ?>
        <a href="<?php echo $basePath; ?>login.php" class="btn-primary" style="padding: 8px 20px; font-size: 0.9rem;">
            <?php echo __('nav_login'); ?>
        </a>
        <?php endif; ?>
    </div>

</header>
