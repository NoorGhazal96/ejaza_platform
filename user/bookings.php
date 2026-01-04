<?php require_once('../includes/config.php'); ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title><?php echo __('menu_my_bookings'); ?> - User</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>

<div class="dash-body">
    <?php include('partials/sidebar.php'); ?>

    <main class="dash-content">
        
        <?php include('../includes/dash-header.php'); ?>

        <script>
            document.getElementById('page-title').innerText = "<?php echo __('menu_my_bookings'); ?>";
            document.getElementById('page-subtitle').innerText = "<?php echo __('booking_history_subtitle'); ?>";
        </script>

        <div style="background: var(--surface-alt); border-radius: 20px; border: 1px solid var(--outline); overflow: hidden; margin-top: 20px;">
            <div style="overflow-x: auto;">
                <table class="dash-table" style="margin: 0; border: none; box-shadow: none;">
                    <thead>
                        <tr style="background: rgba(5, 124, 200, 0.03);">
                            <th><?php echo __('booking_id'); ?></th>
                            <th><?php echo __('chalet_name'); ?></th>
                            <th><?php echo __('date'); ?></th>
                            <th><?php echo __('price'); ?></th>
                            <th><?php echo __('status'); ?></th>
                            <th><?php echo __('actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td>#BK-98214</td>
                            <td><strong>شاليه النسيم</strong></td>
                            <td>20 مايو 2025</td>
                            <td><?php echo formatPrice(2550); ?></td>
                            <td><span class="status-badge status-active"><?php echo __('status_confirmed'); ?></span></td>
                            <td><button class="icon-btn">👁️</button></td>
                        </tr>

                        <tr>
                            <td>#BK-88520</td>
                            <td><strong>منتجع العمارية</strong></td>
                            <td>15 يناير 2025</td>
                            <td><?php echo formatPrice(1800); ?></td>
                            <td><span class="status-badge" style="background: #eee; color: #666;"><?php echo __('status_completed'); ?></span></td>
                            <td><button class="icon-btn">⭐ <?php echo __('rate_now'); ?></button></td>
                        </tr>

                        <tr>
                            <td style="opacity: 0.5;">#BK-75412</td>
                            <td style="opacity: 0.5;">استراحة الواحة</td>
                            <td style="opacity: 0.5;">10 ديسمبر 2024</td>
                            <td style="opacity: 0.5;"><?php echo formatPrice(900); ?></td>
                            <td><span class="status-badge status-rejected"><?php echo __('status_rejected'); ?></span></td>
                            <td><button class="icon-btn">👁️</button></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<script src="../assets/js/main.js"></script>
</body>
</html>