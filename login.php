<?php 
require_once('includes/db_connect.php');
require_once('includes/config.php');
require_once('includes/functions.php');

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitize($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($email) || empty($password)) {
        $error = ($lang == 'ar') ? 'جميع الحقول مطلوبة' : 'All fields are required';
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            if ($user['status'] !== 'active') {
                $error = ($lang == 'ar') ? 'الحساب معطل، تواصل مع الدعم' : 'Account is suspended, contact support';
            } else {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = $user['role'];
                $_SESSION['user_name'] = $user['full_name'];
                
                switch ($user['role']) {
                    case 'admin':
                        header('Location: admin/index.php');
                        break;
                    case 'owner':
                        header('Location: owner/index.php');
                        break;
                    default:
                        header('Location: user/index.php');
                }
                exit;
            }
        } else {
            $error = ($lang == 'ar') ? 'البريد أو كلمة المرور غير صحيحة' : 'Invalid email or password';
        }
    }
}

require_once('partials/header.php'); 
?>

<div class="auth-container">
    <div class="auth-card">
        <div style="margin-bottom: 30px;">
            <img src="assets/img/logo.png" alt="Ejaza" style="height: 60px; margin-bottom: 20px;">
            <h2 style="font-size: 1.8rem; color: var(--primary);"><?php echo __('welcome_back'); ?></h2>
            <p style="opacity: 0.7;"><?php echo __('login_subtitle'); ?></p>
        </div>

        <?php if ($error): ?>
        <div style="background: #ffebee; color: #c62828; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>

        <form action="login.php" method="POST"> 
            
            <div style="margin-bottom: 20px;">
                <label class="filter-label"><?php echo __('email'); ?></label>
                <input type="email" name="email" class="m3-input" placeholder="name@example.com" value="<?php echo isset($_POST['email']) ? sanitize($_POST['email']) : ''; ?>" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label class="filter-label"><?php echo __('password'); ?></label>
                <input type="password" name="password" class="m3-input" placeholder="••••••••" required>
            </div>

            <div style="display: flex; justify-content: space-between; margin-bottom: 30px; font-size: 0.9rem;">
                <label class="m3-checkbox">
                    <input type="checkbox" name="remember"> <span><?php echo __('remember_me'); ?></span>
                </label>
                <a href="#" style="color: var(--primary);"><?php echo __('forgot_password'); ?></a>
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; font-size: 1.1rem; padding: 12px;">
                <?php echo __('login_btn'); ?>
            </button>
        </form>

        <div class="m3-divider"></div>

        <p style="font-size: 0.9rem;">
            <?php echo __('no_account'); ?> 
            <a href="register.php" style="color: var(--primary); font-weight: bold;"><?php echo __('create_account'); ?></a>
        </p>
        
        <div style="margin-top: 20px; padding-top: 20px; border-top: 1px dashed var(--outline); font-size: 0.85rem; opacity: 0.7;">
            <p style="margin-bottom: 5px;"><strong><?php echo ($lang == 'ar') ? 'حسابات تجريبية:' : 'Test accounts:'; ?></strong></p>
            <p>Admin: admin@ejaza.com / admin123</p>
            <p>Owner: owner@ejaza.com / owner123</p>
            <p>User: user@ejaza.com / user123</p>
        </div>
    </div>
</div>

<?php require_once('partials/footer.php'); ?>
