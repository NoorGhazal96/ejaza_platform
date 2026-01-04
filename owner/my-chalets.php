<?php require_once('../includes/config.php'); ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title><?php echo __('menu_my_chalets'); ?> - Owner</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>

<div class="dash-body">

    <?php include('partials/sidebar.php'); ?>

    <main class="dash-content">
        
        <?php include('../includes/dash-header.php'); ?>
        
        <script>
            document.getElementById('page-title').innerText = "<?php echo __('menu_my_chalets'); ?>";
            document.getElementById('page-subtitle').innerText = "<?php echo __('my_chalets_subtitle'); ?>";
        </script>

        <div style="display: flex; justify-content: flex-end; margin-bottom: 25px;">
            <a href="add-chalet.php" class="btn-primary">➕ <?php echo __('add_new'); ?></a>
        </div>

        <div class="chalet-grid">

            <div class="chalet-card">
                <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=500'); height: 180px;">
                    <span class="status-badge status-active" style="position: absolute; top: 10px; right: 10px;"><?php echo __('status_active'); ?></span>
                </div>
                <div class="card-details">
                    <h3 style="font-size: 1.1rem;">شاليه النسيم</h3>
                    <p class="card-location">📍 الرياض، الثمامة</p>
                    
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
                        <span style="font-weight: bold; color: var(--primary);">
                            <?php echo formatPrice(1200); ?> <small>/ <?php echo __('night'); ?></small>
                        </span>
                        <span style="font-size: 0.8rem; color: var(--text-secondary);">👁️ 150 <?php echo __('views'); ?></span>
                    </div>

                    <div class="m3-divider" style="margin: 15px 0;"></div>

                    <div style="display: flex; gap: 10px;">
                        <button class="btn-primary" style="flex: 1; font-size: 0.85rem; padding: 8px;">✏️ <?php echo __('edit'); ?></button>
                        <button class="icon-btn" style="color: var(--error); border: 1px solid var(--outline); border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;" title="<?php echo __('delete'); ?>">🗑️</button>
                    </div>
                </div>
            </div>

            <div class="chalet-card">
                <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=500'); height: 180px;">
                    <span class="status-badge status-pending" style="position: absolute; top: 10px; right: 10px;"><?php echo __('status_pending'); ?></span>
                </div>
                <div class="card-details">
                    <h3 style="font-size: 1.1rem;">منتجع العمارية هيلز</h3>
                    <p class="card-location">📍 الرياض، العمارية</p>
                    
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
                        <span style="font-weight: bold; color: var(--primary);">
                            <?php echo formatPrice(2500); ?> <small>/ <?php echo __('night'); ?></small>
                        </span>
                        <span style="font-size: 0.8rem; color: var(--text-secondary);">👁️ 0 <?php echo __('views'); ?></span>
                    </div>

                    <div class="m3-divider" style="margin: 15px 0;"></div>

                    <div style="display: flex; gap: 10px;">
                        <button class="btn-primary" style="flex: 1; font-size: 0.85rem; padding: 8px; background-color: var(--text-secondary);">✏️ <?php echo __('edit'); ?></button>
                        <button class="icon-btn" style="color: var(--error); border: 1px solid var(--outline); border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">🗑️</button>
                    </div>
                </div>
            </div>

            <div class="chalet-card">
                <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=500'); height: 180px;">
                    <span class="status-badge status-rejected" style="position: absolute; top: 10px; right: 10px;"><?php echo __('status_inactive'); ?></span>
                </div>
                <div class="card-details">
                    <h3 style="font-size: 1.1rem;">استراحة الواحة</h3>
                    <p class="card-location">📍 جدة، أبحر الشمالية</p>
                    
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
                        <span style="font-weight: bold; color: var(--primary);">
                            <?php echo formatPrice(950); ?> <small>/ <?php echo __('night'); ?></small>
                        </span>
                        <span style="font-size: 0.8rem; color: var(--text-secondary);">👁️ 45 <?php echo __('views'); ?></span>
                    </div>

                    <div class="m3-divider" style="margin: 15px 0;"></div>

                    <div style="display: flex; gap: 10px;">
                        <button class="btn-primary" style="flex: 1; font-size: 0.85rem; padding: 8px;">🔄 <?php echo __('activate'); ?></button>
                        <button class="icon-btn" style="color: var(--error); border: 1px solid var(--outline); border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">🗑️</button>
                    </div>
                </div>
            </div>

        </div>

    </main>
</div>

<script src="../assets/js/main.js"></script>
</body>
</html>