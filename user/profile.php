<?php require_once('../includes/config.php'); ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title><?php echo __('menu_profile'); ?> - User</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>

<div class="dash-body">
    <?php include('partials/sidebar.php'); ?>

    <main class="dash-content">
        
        <?php include('../includes/dash-header.php'); ?>

        <script>
            document.getElementById('page-title').innerText = "<?php echo __('menu_profile'); ?>";
            document.getElementById('page-subtitle').innerText = "<?php echo __('profile_subtitle'); ?>";
        </script>

        <form class="auth-card" style="width: 100%; max-width: 800px; margin: 0 auto;">
            
            <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px;">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" style="width: 80px; height: 80px; border-radius: 50%;">
                <button type="button" class="btn-primary" style="background: transparent; color: var(--primary); border: 1px solid var(--outline);">
                    <?php echo __('change_photo'); ?>
                </button>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label class="filter-label"><?php echo __('first_name'); ?></label>
                    <input type="text" class="m3-input" value="محمد">
                </div>
                <div>
                    <label class="filter-label"><?php echo __('last_name'); ?></label>
                    <input type="text" class="m3-input" value="العلي">
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <label class="filter-label"><?php echo __('email'); ?></label>
                <input type="email" class="m3-input" value="mohammed@example.com">
            </div>

            <div style="margin-bottom: 30px;">
                <label class="filter-label"><?php echo __('phone'); ?></label>
                <input type="tel" class="m3-input" value="0551234567">
            </div>

            <h3 style="margin-bottom: 15px; border-top: 1px solid var(--outline); padding-top: 20px; color: var(--primary);">
                <?php echo __('security'); ?>
            </h3>
            
            <div style="margin-bottom: 20px;">
                <label class="filter-label"><?php echo __('new_password'); ?></label>
                <input type="password" class="m3-input" placeholder="<?php echo __('password_placeholder'); ?>">
            </div>

            <button type="submit" class="btn-primary" style="padding: 12px 40px; width: 100%; justify-content: center;">
                <?php echo __('save_changes'); ?>
            </button>
        </form>
    </main>
</div>

<script src="../assets/js/main.js"></script>
</body>
</html>