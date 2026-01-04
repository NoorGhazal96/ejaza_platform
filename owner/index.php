<?php require_once('../includes/config.php'); ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title><?php echo __('dash_overview'); ?> - Owner</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>

<div class="dash-body">

    <?php include('partials/sidebar.php'); ?>

    <main class="dash-content">
        
        <?php include('../includes/dash-header.php'); ?>
        
        <script>
            document.getElementById('page-title').innerText = "<?php echo __('dash_overview'); ?>";
            document.getElementById('page-subtitle').innerText = "<?php echo __('welcome'); ?>";
        </script>

        <section class="stats-grid">
            <div class="stat-card">
                <span class="stat-value">5</span>
                <span style="opacity: 0.7;"><?php echo __('active_chalets'); ?></span>
            </div>
            <div class="stat-card">
                <span class="stat-value">12</span>
                <span style="opacity: 0.7;"><?php echo __('monthly_bookings'); ?></span>
            </div>
            <div class="stat-card">
                <span class="stat-value">
                    <?php echo formatPrice(15400); ?>
                </span>
                <span style="opacity: 0.7;"><?php echo __('earnings'); ?></span>
            </div>
        </section>

        <section>
            <h3 style="margin-bottom: 15px; color: var(--primary);"><?php echo __('latest_bookings'); ?></h3>
            <div style="background: var(--surface-alt); border-radius: 16px; border: 1px solid var(--outline); overflow: hidden;">
                <div style="overflow-x: auto;">
                    <table class="dash-table" style="margin: 0; border: none; box-shadow: none;">
                        <thead>
                            <tr style="background: rgba(5, 124, 200, 0.05);">
                                <th><?php echo __('booking_id'); ?></th>
                                <th><?php echo __('chalet_name'); ?></th>
                                <th><?php echo __('guest'); ?></th>
                                <th><?php echo __('date'); ?></th>
                                <th><?php echo __('status'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#BK-102</td>
                                <td>شاليه النسيم</td>
                                <td>فهد سالم</td>
                                <td>2025-05-20</td>
                                <td><span class="status-badge status-active"><?php echo __('status_confirmed'); ?></span></td>
                            </tr>
                            <tr>
                                <td>#BK-105</td>
                                <td>استراحة الأحلام</td>
                                <td>سعود خالد</td>
                                <td>2025-06-01</td>
                                <td><span class="status-badge status-pending"><?php echo __('status_pending'); ?></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </main>
</div>

<script src="../assets/js/main.js"></script>
</body>
</html>