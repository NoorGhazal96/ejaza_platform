<?php 
require_once('../includes/db_connect.php');
require_once('../includes/config.php');
require_once('../includes/functions.php');

if (!isLoggedIn() || $_SESSION['user_role'] !== 'owner') {
    header('Location: ../login.php');
    exit;
}

$owner_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $chalet_id = (int)($_POST['chalet_id'] ?? 0);
    
    $stmt = $pdo->prepare("SELECT id FROM chalets WHERE id = ? AND owner_id = ?");
    $stmt->execute([$chalet_id, $owner_id]);
    
    if ($stmt->fetch()) {
        switch ($_POST['action']) {
            case 'delete':
                $stmt = $pdo->prepare("DELETE FROM chalets WHERE id = ? AND owner_id = ?");
                $stmt->execute([$chalet_id, $owner_id]);
                break;
            case 'activate':
                $stmt = $pdo->prepare("UPDATE chalets SET status = 'active' WHERE id = ? AND owner_id = ?");
                $stmt->execute([$chalet_id, $owner_id]);
                break;
            case 'deactivate':
                $stmt = $pdo->prepare("UPDATE chalets SET status = 'inactive' WHERE id = ? AND owner_id = ?");
                $stmt->execute([$chalet_id, $owner_id]);
                break;
        }
    }
    
    header('Location: my-chalets.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM chalets WHERE owner_id = ? ORDER BY created_at DESC");
$stmt->execute([$owner_id]);
$chalets = $stmt->fetchAll();
$totalChalets = count($chalets);
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title><?php echo __('menu_my_chalets'); ?> - Owner</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>

<div class="dash-body">

    <?php include('partials/sidebar.php'); ?>

    <main class="dash-content">
        
        <?php include('../includes/dash-header.php'); ?>
        
        <script>
            document.getElementById('page-title').innerText = "<?php echo __('menu_my_chalets'); ?>";
            document.getElementById('page-subtitle').innerText = "<?php echo ($lang == 'ar') ? 'لديك ' . $totalChalets . ' شاليهات مسجلة' : 'You have ' . $totalChalets . ' registered chalets'; ?>";
        </script>

        <div style="display: flex; justify-content: flex-end; margin-bottom: 25px;">
            <a href="add-chalet.php" class="btn-primary">➕ <?php echo __('add_new'); ?></a>
        </div>

        <?php if (empty($chalets)): ?>
        <div style="text-align: center; padding: 60px 20px; background: var(--surface-alt); border-radius: 20px; border: 1px solid var(--outline);">
            <p style="font-size: 3rem; margin-bottom: 20px;">🏠</p>
            <h3 style="color: var(--text); margin-bottom: 10px;"><?php echo ($lang == 'ar') ? 'لا توجد شاليهات' : 'No chalets yet'; ?></h3>
            <p style="opacity: 0.7; margin-bottom: 20px;"><?php echo ($lang == 'ar') ? 'أضف شاليهك الأول للبدء' : 'Add your first chalet to get started'; ?></p>
            <a href="add-chalet.php" class="btn-primary">➕ <?php echo __('add_new'); ?></a>
        </div>
        <?php else: ?>

        <div class="chalet-grid">

            <?php foreach ($chalets as $chalet): ?>
            <div class="chalet-card">
                <div class="card-image" style="background-image: url('<?php echo $chalet['image_url'] ?: 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=500'; ?>'); height: 180px;">
                    <?php 
                    $statusClass = 'status-pending';
                    $statusText = __('status_pending');
                    if ($chalet['status'] == 'active') {
                        $statusClass = 'status-active';
                        $statusText = __('status_active');
                    } elseif ($chalet['status'] == 'inactive') {
                        $statusClass = 'status-rejected';
                        $statusText = __('status_inactive');
                    }
                    ?>
                    <span class="status-badge <?php echo $statusClass; ?>" style="position: absolute; top: 10px; right: 10px;"><?php echo $statusText; ?></span>
                </div>
                <div class="card-details">
                    <h3 style="font-size: 1.1rem;"><?php echo ($lang == 'ar') ? $chalet['name_ar'] : ($chalet['name_en'] ?: $chalet['name_ar']); ?></h3>
                    <p class="card-location">📍 <?php echo $chalet['location']; ?></p>
                    
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
                        <span style="font-weight: bold; color: var(--primary);">
                            <?php echo formatPrice($chalet['price']); ?> <small>/ <?php echo __('night'); ?></small>
                        </span>
                        <span style="font-size: 0.8rem; color: var(--text-secondary);">⭐ <?php echo number_format($chalet['rating'], 1); ?></span>
                    </div>

                    <div class="m3-divider" style="margin: 15px 0;"></div>

                    <div style="display: flex; gap: 10px;">
                        <?php if ($chalet['status'] == 'inactive'): ?>
                        <form method="POST" style="flex: 1;">
                            <input type="hidden" name="chalet_id" value="<?php echo $chalet['id']; ?>">
                            <input type="hidden" name="action" value="activate">
                            <button type="submit" class="btn-primary" style="width: 100%; font-size: 0.85rem; padding: 8px;">🔄 <?php echo __('activate'); ?></button>
                        </form>
                        <?php else: ?>
                        <a href="edit-chalet.php?id=<?php echo $chalet['id']; ?>" class="btn-primary" style="flex: 1; font-size: 0.85rem; padding: 8px; text-align: center;">✏️ <?php echo __('edit'); ?></a>
                        <?php endif; ?>
                        
                        <form method="POST" onsubmit="return confirm('<?php echo ($lang == 'ar') ? 'هل أنت متأكد من الحذف؟' : 'Are you sure you want to delete?'; ?>');">
                            <input type="hidden" name="chalet_id" value="<?php echo $chalet['id']; ?>">
                            <input type="hidden" name="action" value="delete">
                            <button type="submit" class="icon-btn" style="color: var(--error); border: 1px solid var(--outline); border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;" title="<?php echo __('delete'); ?>">🗑️</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

        <?php endif; ?>

    </main>
</div>

<script src="../assets/js/main.js"></script>
</body>
</html>
