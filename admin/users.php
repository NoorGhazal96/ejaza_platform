<?php require_once('../includes/config.php'); ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title><?php echo __('menu_users'); ?> - Admin</title>
        <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dash-body">

    <?php include('partials/sidebar.php'); ?>

    <main class="dash-content">
        
        <?php include('../includes/dash-header.php'); ?>
        
        <script>
            document.getElementById('page-title').innerText = "<?php echo __('menu_users'); ?>";
            document.getElementById('page-subtitle').innerText = "إدارة جميع المسجلين في النظام (ملاك وضيوف)";
        </script>

        <div style="margin-bottom: 25px;">
            <input type="text" class="m3-input" placeholder="🔍 بحث بالاسم، البريد أو رقم الهاتف..." style="max-width: 400px;">
        </div>

        <div style="background: var(--surface-alt); border-radius: 16px; border: 1px solid var(--outline); overflow: hidden;">
            <div style="overflow-x: auto;">
                <table class="dash-table" style="margin: 0; border: none; box-shadow: none;">
                    <thead>
                        <tr style="background: rgba(5, 124, 200, 0.05);">
                            <th>#ID</th>
                            <th><?php echo __('full_name'); ?></th> <th><?php echo __('role'); ?></th>      <th><?php echo __('email'); ?></th>     <th><?php echo __('status'); ?></th>    <th><?php echo __('register_date'); ?></th> <th><?php echo __('actions'); ?></th>   </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td>101</td>
                            <td><div style="font-weight: bold;">أحمد محمد</div></td>
                            <td><span class="status-badge" style="background: #e3f2fd; color: var(--primary);">مالك</span></td>
                            <td>ahmed@example.com</td>
                            <td><span class="status-badge status-active">نشط</span></td>
                            <td>2024-01-15</td>
                            <td>
                                <button class="icon-btn" title="تعديل">✏️</button>
                                <button class="icon-btn" style="color: var(--error);" title="حظر">🚫</button>
                            </td>
                        </tr>

                        <tr>
                            <td>102</td>
                            <td><div style="font-weight: bold;">سارة علي</div></td>
                            <td><span class="status-badge" style="background: #f5f5f5; color: var(--text-secondary);">ضيف</span></td>
                            <td>sara@example.com</td>
                            <td><span class="status-badge status-active">نشط</span></td>
                            <td>2024-02-10</td>
                            <td>
                                <button class="icon-btn" title="تعديل">✏️</button>
                                <button class="icon-btn" style="color: var(--error);" title="حظر">🚫</button>
                            </td>
                        </tr>
                        
                        <tr style="opacity: 0.6; background: rgba(0,0,0,0.02);">
                            <td>103</td>
                            <td><div style="font-weight: bold;">مستخدم وهمي</div></td>
                            <td><span class="status-badge" style="background: #f5f5f5; color: var(--text-secondary);">ضيف</span></td>
                            <td>spam@example.com</td>
                            <td><span class="status-badge status-rejected">محظور</span></td>
                            <td>2024-03-01</td>
                            <td>
                                <button class="icon-btn" style="color: var(--success);" title="فك الحظر">🔓</button>
                            </td>
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