<?php require_once('../includes/config.php'); ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title><?php echo __('menu_chalets'); ?> - Admin</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dash-body">

    <?php include('partials/sidebar.php'); ?>

    <main class="dash-content">
        
        <?php include('../includes/dash-header.php'); ?>
        
        <script>
            document.getElementById('page-title').innerText = "<?php echo __('menu_chalets'); ?>";
            document.getElementById('page-subtitle').innerText = "إدارة طلبات الشاليهات الجديدة";
        </script>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
            <div>
                <button class="btn-primary">الطلبات المعلقة (3)</button>
                <button class="btn-primary" style="background: transparent; color: var(--text); border: 1px solid var(--outline);">الكل (50)</button>
            </div>
            
            <div style="display: flex; gap: 10px;">
                <button class="btn-primary" style="background: var(--surface-alt); color: var(--text); border: 1px solid var(--outline);">🔍 بحث</button>
            </div>
        </div>

        <div style="background: var(--surface-alt); border-radius: 16px; border: 1px solid var(--outline); overflow: hidden;">
            <table class="dash-table" style="margin: 0; border: none; box-shadow: none;">
                <thead>
                    <tr style="background: rgba(5, 124, 200, 0.05);">
                        <th>صورة</th>
                        <th>بيانات الشاليه</th>
                        <th>بيانات المالك</th>
                        <th>السعر</th>
                        <th>الإجراء المطلوب</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td style="width: 80px;">
                            <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=100" style="width: 60px; height: 60px; border-radius: 8px; object-fit: cover;">
                        </td>
                        <td>
                            <div style="font-weight: bold;">شاليه الرمال الذهبية</div>
                            <small>الرياض، حي الرمال</small>
                        </td>
                        <td>
                            <div>خالد عبدالرحمن</div>
                            <small style="opacity: 0.7;">055xxxxxxx</small>
                        </td>
                        <td style="font-weight: bold; color: var(--primary);">
                            <?php echo formatPrice(1500); ?>
                        </td>
                        <td>
                            <div style="display: flex; gap: 5px;">
                                <button class="btn-primary" style="background: var(--success); padding: 5px 15px; font-size: 0.8rem;">✔ موافقة</button>
                                <button class="btn-primary" style="background: var(--error); padding: 5px 15px; font-size: 0.8rem;">✖ رفض</button>
                                <button class="icon-btn" title="مشاهدة التفاصيل">👁️</button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 80px;">
                            <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=100" style="width: 60px; height: 60px; border-radius: 8px; object-fit: cover;">
                        </td>
                        <td>
                            <div style="font-weight: bold;">استراحة السعادة</div>
                            <small>جدة، الحمدانية</small>
                        </td>
                        <td>
                            <div>سعيد الشهراني</div>
                            <small style="opacity: 0.7;">050xxxxxxx</small>
                        </td>
                        <td style="font-weight: bold; color: var(--primary);">
                            <?php echo formatPrice(800); ?>
                        </td>
                        <td>
                            <div style="display: flex; gap: 5px;">
                                <button class="btn-primary" style="background: var(--success); padding: 5px 15px; font-size: 0.8rem;">✔ موافقة</button>
                                <button class="btn-primary" style="background: var(--error); padding: 5px 15px; font-size: 0.8rem;">✖ رفض</button>
                                <button class="icon-btn" title="مشاهدة التفاصيل">👁️</button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </main>
</div>

<script src="../assets/js/main.js"></script>
</body>
</html>