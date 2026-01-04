<?php require_once('../includes/config.php'); ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title><?php echo __('menu_bookings'); ?> - Owner</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css"> </head>
<body>

<div class="dash-body">

    <?php include('partials/sidebar.php'); ?>

    <main class="dash-content">
        
        <?php include('../includes/dash-header.php'); ?>
        
        <script>
            document.getElementById('page-title').innerText = "<?php echo __('menu_bookings'); ?>";
            document.getElementById('page-subtitle').innerText = "<?php echo __('bookings_subtitle'); ?>";
        </script>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">
            <div style="display: flex; gap: 10px; overflow-x: auto; padding-bottom: 5px;">
                <button class="btn-primary" style="padding: 8px 20px; border-radius: 50px; font-size: 0.9rem;"><?php echo __('all'); ?> (15)</button>
                <button class="btn-primary" style="background: transparent; color: var(--text); border: 1px solid var(--outline); padding: 8px 20px;"><?php echo __('status_pending'); ?> (2)</button>
                <button class="btn-primary" style="background: transparent; color: var(--text); border: 1px solid var(--outline); padding: 8px 20px;"><?php echo __('status_confirmed'); ?> (8)</button>
                <button class="btn-primary" style="background: transparent; color: var(--text); border: 1px solid var(--outline); padding: 8px 20px;"><?php echo __('status_rejected'); ?> (5)</button>
            </div>

            <div style="display: flex; gap: 10px;">
                <button class="icon-btn" title="<?php echo __('search'); ?>">🔍</button>
                <button class="icon-btn" title="تصدير">📥</button>
            </div>
        </div>

        <div style="background: var(--surface-alt); border-radius: 20px; border: 1px solid var(--outline); overflow: hidden;">
            <div style="overflow-x: auto;">
                <table class="dash-table" style="margin: 0; border: none; box-shadow: none;">
                    <thead>
                        <tr style="background: rgba(5, 124, 200, 0.03);">
                            <th><?php echo __('booking_id'); ?></th>
                            <th><?php echo __('guest'); ?></th>
                            <th><?php echo __('chalet_name'); ?></th>
                            <th><?php echo __('date'); ?></th>
                            <th><?php echo __('price'); ?></th>
                            <th><?php echo __('status'); ?></th>
                            <th><?php echo __('actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr style="background: rgba(237, 108, 2, 0.05);"> 
                            <td><strong>#BK-2024</strong></td>
                            <td>
                                <div style="font-weight: 500;">سلطان العمري</div>
                                <small style="opacity: 0.7;">055xxxxxxx</small>
                            </td>
                            <td>شاليه النسيم</td>
                            <td>
                                20 مايو <span style="font-size: 0.8rem;">(2 <?php echo __('nights'); ?>)</span>
                            </td>
                            <td style="font-weight: bold; color: var(--primary);">
                                <?php echo formatPrice(2400); ?>
                            </td>
                            <td><span class="status-badge status-pending"><?php echo __('status_pending'); ?></span></td>
                            <td>
                                <div style="display: flex; gap: 5px;">
                                    <button class="icon-btn" style="background: #e8f5e9; color: var(--success); width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center;" title="قبول">✔</button>
                                    <button class="icon-btn" style="background: #ffebee; color: var(--error); width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center;" title="رفض">✖</button>
                                </div>
                            </td>
                        </tr>

                        <tr style="background: rgba(237, 108, 2, 0.05);">
                            <td><strong>#BK-2025</strong></td>
                            <td>
                                <div style="font-weight: 500;">عبدالله الفهد</div>
                                <small style="opacity: 0.7;">050xxxxxxx</small>
                            </td>
                            <td>منتجع العمارية</td>
                            <td>
                                25 مايو <span style="font-size: 0.8rem;">(1 <?php echo __('night_single'); ?>)</span>
                            </td>
                            <td style="font-weight: bold; color: var(--primary);">
                                <?php echo formatPrice(2500); ?>
                            </td>
                            <td><span class="status-badge status-pending"><?php echo __('status_pending'); ?></span></td>
                            <td>
                                <div style="display: flex; gap: 5px;">
                                    <button class="icon-btn" style="background: #e8f5e9; color: var(--success); width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center;" title="قبول">✔</button>
                                    <button class="icon-btn" style="background: #ffebee; color: var(--error); width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center;" title="رفض">✖</button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>#BK-1988</td>
                            <td>نورة السعد</td>
                            <td>شاليه النسيم</td>
                            <td>15 مايو</td>
                            <td style="font-weight: bold;">
                                <?php echo formatPrice(1200); ?>
                            </td>
                            <td><span class="status-badge status-active"><?php echo __('status_confirmed'); ?></span></td>
                            <td>
                                <button class="icon-btn" title="التفاصيل">👁️</button>
                            </td>
                        </tr>

                        <tr>
                            <td style="opacity: 0.6;">#BK-1850</td>
                            <td style="opacity: 0.6;">محمد علي</td>
                            <td style="opacity: 0.6;">استراحة الأحلام</td>
                            <td style="opacity: 0.6;">10 مايو</td>
                            <td style="opacity: 0.6;">
                                <?php echo formatPrice(950); ?>
                            </td>
                            <td><span class="status-badge status-rejected"><?php echo __('status_rejected'); ?></span></td>
                            <td>
                                <button class="icon-btn" title="التفاصيل">👁️</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            
            <div style="padding: 15px; border-top: 1px solid var(--outline); display: flex; justify-content: center; gap: 5px;">
                <button class="icon-btn" style="font-size: 0.9rem; background: var(--primary); color: white; width: 30px; height: 30px; border-radius: 50%;">1</button>
                <button class="icon-btn" style="font-size: 0.9rem; border: 1px solid var(--outline); width: 30px; height: 30px; border-radius: 50%;">2</button>
                <button class="icon-btn" style="font-size: 0.9rem;">Next &rarr;</button>
            </div>

        </div>

    </main>
</div>

<script src="../assets/js/main.js"></script>
</body>
</html>