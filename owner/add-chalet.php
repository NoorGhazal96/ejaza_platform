<?php 
require_once('../includes/db_connect.php');
require_once('../includes/config.php');
require_once('../includes/functions.php');

if (!isLoggedIn() || $_SESSION['user_role'] !== 'owner') {
    header('Location: ../login.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name_ar = sanitize($_POST['name_ar'] ?? '');
    $name_en = sanitize($_POST['name_en'] ?? '');
    $description_ar = sanitize($_POST['description_ar'] ?? '');
    $description_en = sanitize($_POST['description_en'] ?? '');
    $price = (float)($_POST['price'] ?? 0);
    $area = (float)($_POST['area'] ?? 0);
    $location = sanitize($_POST['location'] ?? '');
    $checkin_time = sanitize($_POST['checkin_time'] ?? '14:00');
    $checkout_time = sanitize($_POST['checkout_time'] ?? '12:00');
    
    $has_wifi = isset($_POST['wifi']) ? 1 : 0;
    $has_pool = isset($_POST['pool']) ? 1 : 0;
    $has_parking = isset($_POST['parking']) ? 1 : 0;
    $has_bbq = isset($_POST['bbq']) ? 1 : 0;
    $has_ac = isset($_POST['ac']) ? 1 : 0;
    
    $is_draft = isset($_POST['save_draft']);
    $status = $is_draft ? 'inactive' : 'pending';
    
    if (empty($name_ar) || $price <= 0) {
        $error = ($lang == 'ar') ? 'الرجاء ملء الحقول المطلوبة (اسم الشاليه والسعر)' : 'Please fill required fields (chalet name and price)';
    } else {
        $image_url = null;
        
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../assets/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $result = uploadImage($_FILES['image'], $uploadDir);
            if ($result === false) {
                $error = ($lang == 'ar') ? 'خطأ في رفع الصورة. تأكد من أن الملف صورة (JPG, PNG) وحجمه أقل من 5MB' : 'Error uploading image. Make sure it\'s an image (JPG, PNG) under 5MB';
            } else {
                $image_url = str_replace('../', '', $result);
            }
        }
        
        if (empty($error)) {
            $stmt = $pdo->prepare("
                INSERT INTO chalets (owner_id, name_ar, name_en, description_ar, description_en, price, area, location, image_url, status, has_wifi, has_pool, has_parking, has_bbq, has_ac, checkin_time, checkout_time) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            
            if ($stmt->execute([
                $_SESSION['user_id'], $name_ar, $name_en, $description_ar, $description_en,
                $price, $area, $location, $image_url, $status,
                $has_wifi, $has_pool, $has_parking, $has_bbq, $has_ac,
                $checkin_time, $checkout_time
            ])) {
                header('Location: my-chalets.php?success=1');
                exit;
            } else {
                $error = ($lang == 'ar') ? 'حدث خطأ، حاول مرة أخرى' : 'An error occurred, please try again';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title><?php echo __('add_new_chalet_title'); ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
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

        <?php if ($error): ?>
        <div style="background: #ffebee; color: #c62828; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data" class="m3-form-container">
            
            <div class="section-card" style="background: var(--surface-alt); padding: 25px; border-radius: 20px; border: 1px solid var(--outline); margin-bottom: 25px;">
                <h3 style="margin-bottom: 20px; color: var(--primary);">1. <?php echo __('basic_info'); ?></h3>
                
                <div class="m3-field" style="margin-bottom: 15px;">
                    <label class="filter-label"><?php echo __('chalet_name_label'); ?> (<?php echo ($lang == 'ar') ? 'عربي' : 'Arabic'; ?>) *</label>
                    <input type="text" name="name_ar" class="m3-input" placeholder="<?php echo __('chalet_name_placeholder'); ?>" value="<?php echo isset($_POST['name_ar']) ? sanitize($_POST['name_ar']) : ''; ?>" required>
                </div>

                <div class="m3-field" style="margin-bottom: 15px;">
                    <label class="filter-label"><?php echo __('chalet_name_label'); ?> (<?php echo ($lang == 'ar') ? 'إنجليزي' : 'English'; ?>)</label>
                    <input type="text" name="name_en" class="m3-input" placeholder="Example: Al Naseem Luxury Chalet" value="<?php echo isset($_POST['name_en']) ? sanitize($_POST['name_en']) : ''; ?>">
                </div>

                <div class="m3-field" style="margin-bottom: 15px;">
                    <label class="filter-label"><?php echo __('detailed_desc_label'); ?></label>
                    <textarea name="description_ar" class="m3-textarea" rows="4" placeholder="<?php echo __('detailed_desc_placeholder'); ?>" style="width: 100%; padding: 12px; border: 1px solid var(--outline); border-radius: 12px; resize: vertical;"><?php echo isset($_POST['description_ar']) ? sanitize($_POST['description_ar']) : ''; ?></textarea>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 15px;">
                    <div class="m3-field">
                        <label class="filter-label"><?php echo __('price_night_label'); ?> *</label>
                        <input type="number" name="price" class="m3-input" placeholder="00" min="1" value="<?php echo isset($_POST['price']) ? (int)$_POST['price'] : ''; ?>" required>
                    </div>
                    <div class="m3-field">
                        <label class="filter-label"><?php echo __('area_label'); ?></label>
                        <input type="number" name="area" class="m3-input" placeholder="00" value="<?php echo isset($_POST['area']) ? (int)$_POST['area'] : ''; ?>">
                    </div>
                </div>

                <div class="m3-field">
                    <label class="filter-label"><?php echo __('location'); ?></label>
                    <input type="text" name="location" class="m3-input" placeholder="<?php echo ($lang == 'ar') ? 'مثال: الرياض، الثمامة' : 'Example: Riyadh, Thumamah'; ?>" value="<?php echo isset($_POST['location']) ? sanitize($_POST['location']) : ''; ?>">
                </div>
            </div>

            <div class="section-card" style="background: var(--surface-alt); padding: 25px; border-radius: 20px; border: 1px solid var(--outline); margin-bottom: 25px;">
                <h3 style="margin-bottom: 20px; color: var(--primary);">2. <?php echo ($lang == 'ar') ? 'الصور' : 'Photos'; ?></h3>
                
                <div class="file-upload-wrapper" style="border: 2px dashed var(--outline); border-radius: 12px; padding: 30px; text-align: center; cursor: pointer;" onclick="document.getElementById('chaletImage').click();">
                    <span style="font-size: 2rem; display: block; margin-bottom: 10px;">☁️</span>
                    <h4 style="margin-bottom: 5px;"><?php echo __('upload_images'); ?></h4>
                    <p style="opacity: 0.6; font-size: 0.9rem;"><?php echo __('upload_hint'); ?></p>
                    <input type="file" name="image" id="chaletImage" accept="image/*" style="display: none;">
                </div>
                
                <div id="imagePreview" style="display: none; margin-top: 15px;">
                    <img id="previewImg" src="" style="max-width: 200px; border-radius: 12px; border: 1px solid var(--outline);">
                </div>
            </div>

            <div class="section-card" style="background: var(--surface-alt); padding: 25px; border-radius: 20px; border: 1px solid var(--outline); margin-bottom: 25px;">
                <h3 style="margin-bottom: 20px; color: var(--primary);">3. <?php echo __('facilities_amenities'); ?></h3>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px;">
                    <label class="m3-checkbox" style="display: flex; align-items: center; gap: 8px;">
                        <input type="checkbox" name="wifi"> <span><?php echo __('wifi'); ?></span>
                    </label>
                    <label class="m3-checkbox" style="display: flex; align-items: center; gap: 8px;">
                        <input type="checkbox" name="pool"> <span><?php echo __('pool'); ?></span>
                    </label>
                    <label class="m3-checkbox" style="display: flex; align-items: center; gap: 8px;">
                        <input type="checkbox" name="parking"> <span><?php echo __('parking'); ?></span>
                    </label>
                    <label class="m3-checkbox" style="display: flex; align-items: center; gap: 8px;">
                        <input type="checkbox" name="bbq"> <span><?php echo __('bbq'); ?></span>
                    </label>
                    <label class="m3-checkbox" style="display: flex; align-items: center; gap: 8px;">
                        <input type="checkbox" name="ac"> <span><?php echo ($lang == 'ar') ? 'تكييف' : 'AC'; ?></span>
                    </label>
                </div>
            </div>

            <div class="section-card" style="background: var(--surface-alt); padding: 25px; border-radius: 20px; border: 1px solid var(--outline); margin-bottom: 25px;">
                <h3 style="margin-bottom: 20px; color: var(--primary);">4. <?php echo __('policies'); ?></h3>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="m3-field">
                        <label class="filter-label"><?php echo __('checkin_time'); ?></label>
                        <input type="time" name="checkin_time" class="m3-input" value="14:00">
                    </div>
                    <div class="m3-field">
                        <label class="filter-label"><?php echo __('checkout_time'); ?></label>
                        <input type="time" name="checkout_time" class="m3-input" value="12:00">
                    </div>
                </div>
            </div>

            <div style="display: flex; gap: 15px; margin-top: 20px;">
                <button type="submit" class="btn-primary" style="flex: 2; justify-content: center;">
                    ✨ <?php echo __('publish_chalet'); ?>
                </button>
                <button type="submit" name="save_draft" value="1" class="btn-primary" style="flex: 1; background: var(--surface-alt); color: var(--text); border: 1px solid var(--outline); justify-content: center;">
                    💾 <?php echo __('save_draft'); ?>
                </button>
            </div>

        </form>

    </main>
</div>

<script>
document.getElementById('chaletImage').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('imagePreview').style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});
</script>
<script src="../assets/js/main.js"></script>
</body>
</html>
