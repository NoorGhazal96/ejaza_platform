<?php require_once('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __('site_title'); ?></title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
    
    <?php if($lang == 'ar'): ?>
    <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">
    <?php endif; ?>
</head>
<body>

<header class="md-header">
    
    <div class="header-start">
        <div class="logo">
            <a href="index.php">
                <img src="assets/img/logo.png" alt="Ejaza Logo">
            </a>
        </div>

        <nav class="main-nav">
            <a href="index.php" class="nav-link"><?php echo __('nav_home'); ?></a>
            <a href="owner/index.php" class="nav-link"><?php echo __('owner_badge'); ?></a>
        </nav>
    </div>

    <div class="header-end">
        
        <button onclick="toggleTheme()" class="icon-btn" title="تغيير المظهر">
            <span id="theme-icon">🌓</span>
        </button>

        <div class="dropdown-wrapper">
            <button class="nav-link-btn" onclick="toggleDropdown('curr-drop-public')">
                💰 <?php echo $currency; ?>
            </button>
            <div class="dropdown-menu" id="curr-drop-public">
                <a href="?<?php echo http_build_query(array_merge($_GET, ['currency' => 'SAR'])); ?>">🇸🇦 SAR</a>
                <a href="?<?php echo http_build_query(array_merge($_GET, ['currency' => 'USD'])); ?>">🇺🇸 USD</a>
            </div>
        </div>

        <a href="?<?php echo http_build_query(array_merge($_GET, ['lang' => ($lang == 'ar' ? 'en' : 'ar')])); ?>" class="nav-link-btn" style="font-size: 0.9rem; font-weight: bold;">
            🌐 <?php echo ($lang == 'ar') ? 'English' : 'العربية'; ?>
        </a>

        <a href="login.php" class="btn-primary" style="padding: 8px 20px; font-size: 0.9rem;">
            <?php echo __('nav_login'); ?>
        </a>
    </div>

</header>