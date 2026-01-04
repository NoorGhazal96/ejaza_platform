<?php require_once('../includes/config.php'); ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title><?php echo __('dash_overview'); ?> - Admin</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dash-body">

    <?php include('partials/sidebar.php'); ?>

    <main class="dash-content">
        
        <?php include('../includes/dash-header.php'); ?>

        <script>
            document.getElementById('page-title').innerText = "<?php echo __('dash_overview'); ?>";
            document.getElementById('page-subtitle').innerText = "ملخص أداء النظام والإحصائيات";
        </script>

        <section class="stats-grid">
            <div class="stat-card">
                <span class="stat-value">1,250</span>
                <span class="stat-label">إجمالي الحجوزات</span>
            </div>
            
            <div class="stat-card">
                <span class="stat-value" style="color: var(--warning);">3</span>
                <span class="stat-label">شاليهات تنتظر الموافقة</span>
            </div>
            
            <div class="stat-card">
                <span class="stat-value" style="color: var(--success);">450</span>
                <span class="stat-label">مستخدم مسجل</span>
            </div>
            
            <div class="stat-card">
                <span class="stat-value">
                    <?php echo formatPrice(320000); ?>
                </span>
                <span class="stat-label">إجمالي العمولات</span>
            </div>
        </section>

        <section>
            <h3 style="margin-bottom: 15px; color: var(--primary);">آخر الشاليهات المضافة</h3>
            <div style="overflow-x: auto;">
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>الشاليه</th>
                            <th>المالك</th>
                            <th>التاريخ</th>
                            <th>الحالة</th>
                            <th>الإجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>منتجع النخيل</strong></td>
                            <td>أحمد العلي</td>
                            <td>2025-01-20</td>
                            <td><span class="status-badge status-pending">قيد الانتظار</span></td>
                            <td><a href="chalets.php" class="btn-primary" style="padding: 5px 10px; font-size: 0.8rem; height: auto;">معاينة</a></td>
                        </tr>
                        <tr>
                            <td><strong>شاليه النسيم</strong></td>
                            <td>سارة محمد</td>
                            <td>2025-01-19</td>
                            <td><span class="status-badge status-active">نشط</span></td>
                            <td><a href="chalets.php" class="btn-primary" style="padding: 5px 10px; font-size: 0.8rem; height: auto; background-color: var(--text-secondary);">تفاصيل</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

    </main>
</div>

<script src="../assets/js/main.js"></script>
</body>
</html>