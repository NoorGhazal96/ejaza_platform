<?php require_once('../includes/config.php'); ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title><?php echo __('menu_settings'); ?> - Admin</title>
        <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dash-body">
    <?php include('partials/sidebar.php'); ?>

    <main class="dash-content">
        
        <?php include('../includes/dash-header.php'); ?>

        <script>
            document.getElementById('page-title').innerText = "<?php echo __('menu_settings'); ?>";
            document.getElementById('page-subtitle').innerText = "التحكم في خصائص النظام الأساسية";
        </script>

        <form class="auth-card" style="width: 100%; max-width: 800px; margin: 0 auto;">
            
            <div style="margin-bottom: 20px;">
                <label class="filter-label">اسم الموقع</label>
                <input type="text" class="m3-input" value="منصة إجازة">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label class="filter-label">نسبة العمولة (%)</label>
                    <input type="number" class="m3-input" value="10">
                </div>
                <div>
                    <label class="filter-label">عملة الموقع الافتراضية</label>
                    <select class="m3-input">
                        <option selected>SAR (ريال سعودي)</option>
                        <option>USD (دولار أمريكي)</option>
                    </select>
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <label class="filter-label">بريد الدعم الفني</label>
                <input type="email" class="m3-input" value="support@ejaza.com">
            </div>

            <div class="m3-divider"></div>

            <div style="margin-bottom: 20px;">
                <label class="m3-checkbox">
                    <input type="checkbox" checked>
                    <span>السماح بتسجيل الملاك الجدد</span>
                </label>
                <label class="m3-checkbox">
                    <input type="checkbox" checked>
                    <span>تفعيل الوضع الليلي تلقائياً مساءً</span>
                </label>
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; justify-content: center;">حفظ الإعدادات</button>
        </form>
    </main>
</div>

<script src="../assets/js/main.js"></script>
</body>
</html>