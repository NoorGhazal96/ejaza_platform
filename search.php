<?php 
require_once('partials/header.php'); 

// جلب معايير البحث (للعرض فقط)
$location = isset($_GET['location']) ? htmlspecialchars($_GET['location']) : '';
$date_display = isset($_GET['dates']) ? htmlspecialchars($_GET['dates']) : date('Y-m-d') . ' - ' . date('Y-m-d', strtotime('+1 day'));
$guests_count = isset($_GET['adults']) ? (int)$_GET['adults'] + (int)($_GET['children'] ?? 0) : 2;
?>

<div class="container" style="margin-top: 40px;">

    <div style="margin-bottom: 30px; border-bottom: 1px solid var(--outline); padding-bottom: 20px;">
        <h2 style="font-size: 1.5rem; color: var(--text); margin-bottom: 10px;">
            <?php echo __('search_results_for'); ?> 
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
                <span style="font-weight: bold; color: var(--text);">3 <?php echo __('results_found'); ?></span>
                
                <div style="display: flex; align-items: center; gap: 10px;">
                    <label style="font-size: 0.9rem; opacity: 0.7;"><?php echo __('sort_by'); ?>:</label>
                    <select class="m3-input" style="width: auto; padding: 5px 30px 5px 10px; border: none; background: transparent; font-weight: bold; color: var(--primary); cursor: pointer;">
                        <option><?php echo __('sort_lowest_price'); ?></option>
                        <option><?php echo __('sort_top_rated'); ?></option>
                        <option><?php echo __('sort_newest'); ?></option>
                    </select>
                </div>
            </div>

            <div class="chalet-grid">
                
                <div class="chalet-card">
                    <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=500');">
                        <span class="badge-price" style="top: 10px; bottom: auto; background: var(--success);"><?php echo __('superhost'); ?></span>
                    </div>
                    <div class="card-details">
                        <h3>شاليه النسيم</h3>
                        <p class="card-location">📍 الرياض، الثمامة</p>
                        <div class="rating">⭐ 4.8 (50)</div>
                        <div class="card-footer">
                            <div class="price-info">
                                <span style="font-size: 1.3rem; font-weight: bold; color: var(--primary);">
                                    <?php echo formatPrice(1200); ?>
                                </span>
                                <span style="font-size: 0.8rem; opacity: 0.7;">/ <?php echo __('night'); ?></span>
                            </div>
                            <a href="chalet-details.php?id=1" class="btn-book"><?php echo __('book_now'); ?></a>
                        </div>
                    </div>
                </div>

                <div class="chalet-card">
                    <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=500');"></div>
                    <div class="card-details">
                        <h3>منتجع العمارية</h3>
                        <p class="card-location">📍 الرياض، العمارية</p>
                        <div class="rating">⭐ 4.9 (120)</div>
                        <div class="card-footer">
                            <div class="price-info">
                                <span style="font-size: 1.3rem; font-weight: bold; color: var(--primary);">
                                    <?php echo formatPrice(2500); ?>
                                </span>
                                <span style="font-size: 0.8rem; opacity: 0.7;">/ <?php echo __('night'); ?></span>
                            </div>
                            <a href="chalet-details.php?id=2" class="btn-book"><?php echo __('book_now'); ?></a>
                        </div>
                    </div>
                </div>

                <div class="chalet-card">
                    <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1542718610-a1d656d1884c?w=500');"></div>
                    <div class="card-details">
                        <h3>استراحة الأحلام</h3>
                        <p class="card-location">📍 جدة، أبحر</p>
                        <div class="rating">⭐ 4.5 (30)</div>
                        <div class="card-footer">
                            <div class="price-info">
                                <span style="font-size: 1.3rem; font-weight: bold; color: var(--primary);">
                                    <?php echo formatPrice(950); ?>
                                </span>
                                <span style="font-size: 0.8rem; opacity: 0.7;">/ <?php echo __('night'); ?></span>
                            </div>
                            <a href="chalet-details.php?id=3" class="btn-book"><?php echo __('book_now'); ?></a>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </div>
</div>

<?php include('partials/footer.php'); ?>
<script src="assets/js/main.js"></script>
</body>
</html>