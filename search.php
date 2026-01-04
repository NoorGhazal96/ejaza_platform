<?php 
require_once('includes/db_connect.php');
require_once('includes/config.php');
require_once('includes/functions.php');

$location = isset($_GET['location']) ? sanitize($_GET['location']) : '';
$date_display = isset($_GET['dates']) ? sanitize($_GET['dates']) : date('Y-m-d') . ' - ' . date('Y-m-d', strtotime('+1 day'));
$guests_count = isset($_GET['adults']) ? (int)$_GET['adults'] + (int)($_GET['children'] ?? 0) : 2;
$min_price = isset($_GET['min_price']) ? (int)$_GET['min_price'] : 0;
$max_price = isset($_GET['max_price']) ? (int)$_GET['max_price'] : 10000;
$sort = isset($_GET['sort']) ? sanitize($_GET['sort']) : 'price_asc';

$sql = "SELECT * FROM chalets WHERE status = 'active'";
$params = [];

if (!empty($location)) {
    $sql .= " AND (location LIKE ? OR name_ar LIKE ? OR name_en LIKE ?)";
    $searchTerm = "%$location%";
    $params[] = $searchTerm;
    $params[] = $searchTerm;
    $params[] = $searchTerm;
}

if ($min_price > 0) {
    $sql .= " AND price >= ?";
    $params[] = $min_price;
}

if ($max_price < 10000) {
    $sql .= " AND price <= ?";
    $params[] = $max_price;
}

if (isset($_GET['pool']) && $_GET['pool']) {
    $sql .= " AND has_pool = 1";
}
if (isset($_GET['parking']) && $_GET['parking']) {
    $sql .= " AND has_parking = 1";
}

switch ($sort) {
    case 'price_desc':
        $sql .= " ORDER BY price DESC";
        break;
    case 'rating':
        $sql .= " ORDER BY rating DESC";
        break;
    case 'newest':
        $sql .= " ORDER BY created_at DESC";
        break;
    default:
        $sql .= " ORDER BY price ASC";
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$chalets = $stmt->fetchAll();
$totalResults = count($chalets);

require_once('partials/header.php'); 
?>

<div class="container" style="margin-top: 40px;">

    <div style="margin-bottom: 30px; border-bottom: 1px solid var(--outline); padding-bottom: 20px;">
        <h2 style="font-size: 1.5rem; color: var(--text); margin-bottom: 10px;">
            <?php echo ($lang == 'ar') ? 'نتائج البحث عن' : 'Search results for'; ?> 
            <span style="color: var(--primary);">"<?php echo $location ?: __('city_riyadh'); ?>"</span>
        </h2>
        <div style="display: flex; gap: 20px; font-size: 0.95rem; opacity: 0.8; flex-wrap: wrap;">
            <span>📅 <?php echo $date_display; ?></span>
            <span>👥 <?php echo $guests_count . ' ' . __('guests'); ?></span>
            <a href="index.php" style="color: var(--primary); text-decoration: underline; font-size: 0.85rem;"><?php echo __('edit_search'); ?></a>
        </div>
    </div>

    <div class="main-layout">
        
        <?php include('partials/sidebar-filters.php'); ?>

        <section class="content-area">
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; background: var(--surface-alt); padding: 15px 20px; border-radius: 16px; border: 1px solid var(--outline); box-shadow: var(--shadow);">
                <span style="font-weight: bold; color: var(--text);"><?php echo $totalResults; ?> <?php echo ($lang == 'ar') ? 'نتيجة' : 'results'; ?></span>
                
                <form method="GET" style="display: flex; align-items: center; gap: 10px;">
                    <input type="hidden" name="location" value="<?php echo $location; ?>">
                    <label style="font-size: 0.9rem; opacity: 0.7;"><?php echo __('sort_by'); ?>:</label>
                    <select name="sort" class="m3-input" onchange="this.form.submit()" style="width: auto; padding: 5px 30px 5px 10px; border: none; background: transparent; font-weight: bold; color: var(--primary); cursor: pointer;">
                        <option value="price_asc" <?php echo $sort == 'price_asc' ? 'selected' : ''; ?>><?php echo __('sort_lowest_price'); ?></option>
                        <option value="rating" <?php echo $sort == 'rating' ? 'selected' : ''; ?>><?php echo __('sort_top_rated'); ?></option>
                        <option value="newest" <?php echo $sort == 'newest' ? 'selected' : ''; ?>><?php echo __('sort_newest'); ?></option>
                    </select>
                </form>
            </div>

            <div class="chalet-grid">
                
                <?php if (empty($chalets)): ?>
                <div style="grid-column: span 3; text-align: center; padding: 60px 20px;">
                    <p style="font-size: 3rem; margin-bottom: 20px;">🏠</p>
                    <h3 style="color: var(--text); margin-bottom: 10px;"><?php echo ($lang == 'ar') ? 'لا توجد نتائج' : 'No results found'; ?></h3>
                    <p style="opacity: 0.7;"><?php echo ($lang == 'ar') ? 'جرب تغيير معايير البحث' : 'Try adjusting your search criteria'; ?></p>
                </div>
                <?php else: ?>
                
                <?php foreach ($chalets as $chalet): ?>
                <div class="chalet-card">
                    <div class="card-image" style="background-image: url('<?php echo $chalet['image_url'] ?: 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=500'; ?>');">
                        <?php if ($chalet['rating'] >= 4.5): ?>
                        <span class="badge-price" style="top: 10px; bottom: auto; background: var(--success);"><?php echo __('superhost'); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="card-details">
                        <h3><?php echo ($lang == 'ar') ? $chalet['name_ar'] : ($chalet['name_en'] ?: $chalet['name_ar']); ?></h3>
                        <p class="card-location">📍 <?php echo $chalet['location']; ?></p>
                        <div class="rating">⭐ <?php echo number_format($chalet['rating'], 1); ?> (<?php echo $chalet['reviews_count']; ?>)</div>
                        <div class="card-footer">
                            <div class="price-info">
                                <span style="font-size: 1.3rem; font-weight: bold; color: var(--primary);">
                                    <?php echo formatPrice($chalet['price']); ?>
                                </span>
                                <span style="font-size: 0.8rem; opacity: 0.7;">/ <?php echo __('night'); ?></span>
                            </div>
                            <a href="chalet-details.php?id=<?php echo $chalet['id']; ?>" class="btn-book"><?php echo __('book_now'); ?></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                
                <?php endif; ?>

            </div>

        </section>
    </div>
</div>

<?php include('partials/footer.php'); ?>
