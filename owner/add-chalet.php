<?php require_once('../includes/config.php'); ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title><?php echo __('add_new_chalet_title'); ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dash-body">
    <?php include('partials/sidebar.php'); ?>

    <main class="dash-content">
        <?php include('../includes/dash-header.php'); ?>
        
        <script>
            document.getElementById('page-title').innerText = "<?php echo __('add_new_chalet_title'); ?>";
            document.getElementById('page-subtitle').innerText = "<?php echo __('add_new_chalet_subtitle'); ?>";
        </script>

        <form action="#" method="POST" class="m3-form-container">
            
            <div class="section-card">
                <h3 style="margin-bottom: 20px; color: var(--primary);">1. <?php echo __('basic_info'); ?></h3>
                
                <div class="m3-field">
                    <label class="filter-label"><?php echo __('chalet_name_label'); ?></label>
                    <input type="text" class="m3-input" placeholder="<?php echo __('chalet_name_placeholder'); ?>">
                </div>

                <div class="m3-field">
                    <label class="filter-label"><?php echo __('detailed_desc_label'); ?></label>
                    <textarea class="m3-textarea" rows="4" placeholder="<?php echo __('detailed_desc_placeholder'); ?>"></textarea>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="m3-field">
                        <label class="filter-label"><?php echo __('price_night_label'); ?></label>
                        <input type="number" class="m3-input" placeholder="00">
                    </div>
                    <div class="m3-field">
                        <label class="filter-label"><?php echo __('area_label'); ?></label>
                        <input type="number" class="m3-input" placeholder="00">
                    </div>
                </div>

                <div class="m3-field">
                    <label class="filter-label"><?php echo __('location_url_label'); ?></label>
                    <input type="url" class="m3-input" placeholder="https://maps.google.com/...">
                </div>
            </div>

            <div class="section-card">
                <h3 style="margin-bottom: 20px; color: var(--primary);">2. <?php echo __('media_photos'); ?></h3>
                
                <div class="file-upload-wrapper">
                    <span style="font-size: 2rem; display: block; margin-bottom: 10px;">☁️</span>
                    <h4 style="margin-bottom: 5px;"><?php echo __('upload_images'); ?></h4>
                    <p style="opacity: 0.6; font-size: 0.9rem;"><?php echo __('upload_hint'); ?></p>
                    <input type="file" multiple style="display: none;" id="chaletImages">
                </div>
                
                <div style="display: flex; gap: 10px; margin-top: 15px;">
                    <div style="width: 80px; height: 80px; border-radius: 12px; background: #eee; border: 1px solid var(--outline);"></div>
                    <div style="width: 80px; height: 80px; border-radius: 12px; background: #eee; border: 1px solid var(--outline);"></div>
                </div>
            </div>

            <div class="section-card">
                <h3 style="margin-bottom: 20px; color: var(--primary);">3. <?php echo __('facilities_amenities'); ?></h3>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px;">
                    <label class="m3-checkbox">
                        <input type="checkbox"> <span><?php echo __('wifi'); ?></span>
                    </label>
                    <label class="m3-checkbox">
                        <input type="checkbox"> <span><?php echo __('pool'); ?></span>
                    </label>
                    <label class="m3-checkbox">
                        <input type="checkbox"> <span><?php echo __('parking'); ?></span>
                    </label>
                    <label class="m3-checkbox">
                        <input type="checkbox"> <span><?php echo __('bbq'); ?></span>
                    </label>
                </div>
            </div>

            <div class="section-card">
                <h3 style="margin-bottom: 20px; color: var(--primary);">4. <?php echo __('policies'); ?></h3>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="m3-field">
                        <label class="filter-label"><?php echo __('checkin_time'); ?></label>
                        <input type="time" class="m3-input" value="14:00">
                    </div>
                    <div class="m3-field">
                        <label class="filter-label"><?php echo __('checkout_time'); ?></label>
                        <input type="time" class="m3-input" value="12:00">
                    </div>
                </div>
            </div>

            <div style="display: flex; gap: 15px; margin-top: 20px;">
                <button type="submit" class="btn-primary" style="flex: 2; justify-content: center;">
                    ✨ <?php echo __('publish_chalet'); ?>
                </button>
                <button type="button" class="btn-primary" style="flex: 1; background: var(--surface-alt); color: var(--text); border: 1px solid var(--outline); justify-content: center;">
                    💾 <?php echo __('save_draft'); ?>
                </button>
            </div>

        </form>

    </main>
</div>
<script src="../assets/js/main.js"></script>
</body>
</html>