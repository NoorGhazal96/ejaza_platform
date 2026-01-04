<?php require_once('../includes/config.php'); ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title><?php echo __('menu_favorites'); ?> - User</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>

<div class="dash-body">
    <?php include('partials/sidebar.php'); ?>

    <main class="dash-content">
        
        <?php include('../includes/dash-header.php'); ?>
        
        <script>
            document.getElementById('page-title').innerText = "<?php echo __('menu_favorites'); ?>";
            document.getElementById('page-subtitle').innerText = "<?php echo __('favorites_subtitle'); ?>";
        </script>

        <div class="chalet-grid">
            
            <div class="chalet-card">
                <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=500');">
                    <span class="badge-price">
                        <?php echo formatPrice(1500); ?> / <small><?php echo __('night'); ?></small>
                    </span>
                </div>
                <div class="card-details">
                    <h3>منتجع النخيل</h3>
                    <p class="card-location">📍 الرياض، العمارية</p>
                    <div class="card-footer">
                        <span style="color: var(--warning);">⭐ 4.8</span>
                        <a href="../chalet-details.php" class="btn-book"><?php echo __('book_now'); ?></a>
                    </div>
                </div>
            </div>

            <div class="chalet-card">
                <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=500');">
                    <span class="badge-price">
                        <?php echo formatPrice(2000); ?> / <small><?php echo __('night'); ?></small>
                    </span>
                </div>
                <div class="card-details">
                    <h3>فيلا مودرن</h3>
                    <p class="card-location">📍 جدة، أبحر</p>
                    <div class="card-footer">
                        <span style="color: var(--warning);">⭐ 4.5</span>
                        <a href="../chalet-details.php" class="btn-book"><?php echo __('book_now'); ?></a>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>

<script src="../assets/js/main.js"></script>
</body>
</html>