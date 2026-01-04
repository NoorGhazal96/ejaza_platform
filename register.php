<?php 
require_once('includes/db_connect.php');
require_once('includes/config.php');
require_once('includes/functions.php');

$is_owner = (isset($_GET['type']) && $_GET['type'] == 'owner');
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = sanitize($_POST['full_name'] ?? '');
    $email = sanitize($_POST['email'] ?? '');
    $phone = sanitize($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $role = $is_owner ? 'owner' : 'user';
    
    if (empty($full_name) || empty($email) || empty($password)) {
        $error = ($lang == 'ar') ? 'جميع الحقول مطلوبة' : 'All fields are required';
    } elseif (strlen($password) < 6) {
        $error = ($lang == 'ar') ? 'كلمة المرور يجب أن تكون 6 أحرف على الأقل' : 'Password must be at least 6 characters';
    } else {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->fetch()) {
            $error = ($lang == 'ar') ? 'البريد الإلكتروني مسجل مسبقاً' : 'Email already registered';
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt = $pdo->prepare("INSERT INTO users (full_name, email, password, phone, role, status) VALUES (?, ?, ?, ?, ?, 'active')");
            
            if ($stmt->execute([$full_name, $email, $hashedPassword, $phone, $role])) {
                $_SESSION['user_id'] = $pdo->lastInsertId();
                $_SESSION['user_role'] = $role;
                $_SESSION['user_name'] = $full_name;
                
                $redirect = $is_owner ? 'owner/index.php' : 'user/index.php';
                header("Location: $redirect");
                exit;
            } else {
                $error = ($lang == 'ar') ? 'حدث خطأ، حاول مرة أخرى' : 'An error occurred, please try again';
            }
        }
    }
}

require_once('partials/header.php'); 
?>

<div class="auth-container">
    <div class="auth-card">
        <div style="margin-bottom: 30px;">
            <h2 style="font-size: 1.8rem; color: var(--primary);">
                <?php echo $is_owner ? __('register_owner_title') : __('create_account_title'); ?>
            </h2>
            <p style="opacity: 0.7;">
                <?php echo $is_owner ? __('register_owner_subtitle') : __('create_account_subtitle'); ?>
            </p>
        </div>

        <?php if ($error): ?>
        <div style="background: #ffebee; color: #c62828; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>

        <form action="register.php<?php echo $is_owner ? '?type=owner' : ''; ?>" method="POST">
            
            <div style="margin-bottom: 20px;">
                <label class="filter-label"><?php echo __('full_name'); ?></label>
                <input type="text" name="full_name" class="m3-input" placeholder="<?php echo __('name_placeholder'); ?>" value="<?php echo isset($_POST['full_name']) ? sanitize($_POST['full_name']) : ''; ?>" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label class="filter-label"><?php echo __('email'); ?></label>
                <input type="email" name="email" class="m3-input" placeholder="name@example.com" value="<?php echo isset($_POST['email']) ? sanitize($_POST['email']) : ''; ?>" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label class="filter-label"><?php echo __('phone'); ?></label>
                <input type="tel" name="phone" class="m3-input" placeholder="05xxxxxxxx" value="<?php echo isset($_POST['phone']) ? sanitize($_POST['phone']) : ''; ?>" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label class="filter-label"><?php echo __('password'); ?></label>
                <input type="password" name="password" class="m3-input" placeholder="••••••••" required>
            </div>

            <div style="margin-bottom: 30px;">
                <label class="m3-checkbox">
                    <input type="checkbox" required> 
                    <span style="font-size: 0.9rem;">
                        <?php echo __('agree_to'); ?> 
                        <a href="terms.php" style="color: var(--primary);"><?php echo __('terms_and_conditions'); ?></a>
                    </span>
                </label>
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; font-size: 1.1rem; padding: 12px;">
                <?php echo __('register_btn'); ?>
            </button>
        </form>

        <div class="m3-divider"></div>

        <p style="font-size: 0.9rem;">
            <?php echo __('already_have_account'); ?> 
            <a href="login.php" style="color: var(--primary); font-weight: bold;"><?php echo __('login_btn'); ?></a>
        </p>
    </div>
</div>

<?php require_once('partials/footer.php'); ?>
