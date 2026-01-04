<?php require_once('../includes/config.php'); ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title><?php echo __('dash_overview'); ?> - User</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>

<div class="dash-body">
    <?php include('partials/sidebar.php'); ?>

    <main class="dash-content">
        
        <?php include('../includes/dash-header.php'); ?>

        <script>
            // هنا يمكنك وضع اسم المستخدم ديناميكياً من الجلسة (Session)
            document.getElementById('page-title').innerText = "<?php echo __('welcome'); ?>, Mohammed 👋";
            document.getElementById('page-subtitle').innerText = "<?php echo __('user_dash_subtitle'); ?>";
        </script>

        <div style="display: flex; justify-content: flex-end; margin-bottom: 25px;">
            <a href="../index.php" class="btn-primary" style="padding: 10px 25px;">
                🔍 <?php echo __('search_chalet'); ?>
            </a>
        </div>

        <section class="stats-grid">
            <div class="stat-card">
                <span class="stat-value">3</span>
                <span class="stat-label"><?php echo __('past_bookings'); ?></span>
            </div>
            <div class="stat-card" style="background: rgba(46, 125, 50, 0.1); border-color: var(--success);">
                <span class="stat-value" style="color: var(--success);">1</span>
                <span class="stat-label"><?php echo __('upcoming_trip'); ?></span>
            </div>
            <div class="stat-card">
                <span class="stat-value">5</span>
                <span class="stat-label"><?php echo __('favorite_chalets'); ?></span>
            </div>
        </section>

        <h3 style="margin-bottom: 20px; color: var(--primary);"><?php echo __('upcoming_trip_title'); ?></h3>
        
        <div style="background: var(--surface-alt); border: 1px solid var(--outline); border-radius: 20px; padding: 25px; display: flex; gap: 20px; flex-wrap: wrap; box-shadow: var(--shadow);">
            <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=200" style="width: 200px; height: 120px; border-radius: 12px; object-fit: cover;">
            
            <div style="flex: 1;">
                <h3 style="margin-bottom: 5px;">شاليه النسيم الفاخر</h3>
                <div style="font-size: 0.9rem; opacity: 0.8; margin-bottom: 10px;">📍 الرياض، الثمامة</div>
                <div style="display: flex; gap: 15px; font-size: 0.9rem; margin-bottom: 15px;">
                    <span style="background: rgba(5, 124, 200, 0.1); color: var(--primary); padding: 5px 10px; border-radius: 8px;">
                        📅 20 مايو - 22 مايو
                    </span>
                    <span style="background: rgba(46, 125, 50, 0.1); color: var(--success); padding: 5px 10px; border-radius: 8px;">
                        ✅ <?php echo __('status_confirmed'); ?>
                    </span>
                </div>
            </div>
            
            <div style="display: flex; flex-direction: column; justify-content: center; gap: 10px;">
                <button class="btn-primary"><?php echo __('view_details'); ?></button>
                <button class="icon-btn" style="font-size: 0.9rem; text-decoration: underline; color: var(--error);">
                    <?php echo __('cancel_booking'); ?>
                </button>
            </div>
        </div>

    </main>
</div>

<script src="../assets/js/main.js"></script>
</body>
</html>