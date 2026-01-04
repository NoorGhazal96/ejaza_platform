<?php 
require_once('includes/db_connect.php');
require_once('includes/config.php');
require_once('includes/functions.php');

$chalet_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$stmt = $pdo->prepare("SELECT c.*, u.full_name as owner_name FROM chalets c JOIN users u ON c.owner_id = u.id WHERE c.id = ?");
$stmt->execute([$chalet_id]);
$chalet = $stmt->fetch();

if (!$chalet) {
    header('Location: index.php');
    exit;
}

require_once('partials/header.php'); 
?>

<div class="container details-page">

    <div style="font-size: 0.9rem; opacity: 0.7; margin-bottom: 20px;">
        <a href="index.php"><?php echo __('nav_home'); ?></a> &gt; 
        <a href="search.php"><?php echo $chalet['location']; ?></a> &gt; 
        <span><?php echo ($lang == 'ar') ? $chalet['name_ar'] : ($chalet['name_en'] ?: $chalet['name_ar']); ?></span>
    </div>

    <div style="margin-bottom: 25px;">
        <h1 style="color: var(--primary); margin-bottom: 10px; font-size: 2rem;"><?php echo ($lang == 'ar') ? $chalet['name_ar'] : ($chalet['name_en'] ?: $chalet['name_ar']); ?></h1>
        <div style="display: flex; gap: 20px; align-items: center; font-size: 0.95rem; flex-wrap: wrap;">
            <span class="rating" style="font-weight: bold;">★ <?php echo number_format($chalet['rating'], 1); ?> (<?php echo $chalet['reviews_count']; ?> <?php echo __('reviews'); ?>)</span>
            <span>📍 <?php echo $chalet['location']; ?></span>
            <?php if ($chalet['rating'] >= 4.5): ?>
            <span style="color: var(--success);">🏆 <?php echo __('superhost'); ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="gallery-section">
        <div style="background-image: url('<?php echo $chalet['image_url'] ?: 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=800'; ?>');"></div>
        <div style="display: grid; gap: 15px;">
            <div style="background-image: url('https://images.unsplash.com/photo-1571896349842-6e53ce41e86a?w=400'); border-radius: 0 28px 0 0; background-size: cover; background-position: center;"></div>
            <div style="background-image: url('https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=400'); border-radius: 0 0 28px 0; background-size: cover; background-position: center;"></div>
        </div>
    </div>

    <div class="details-layout">
        
        <div class="chalet-info">
            
            <div style="margin-bottom: 30px;">
                <h3 style="margin-bottom: 15px; font-size: 1.4rem;"><?php echo __('about_place'); ?></h3>
                <p style="opacity: 0.8; line-height: 1.8; font-size: 1rem;">
                    <?php echo ($lang == 'ar') ? ($chalet['description_ar'] ?: 'شاليه فاخر مع جميع وسائل الراحة والمرافق الحديثة.') : ($chalet['description_en'] ?: $chalet['description_ar'] ?: 'Luxury chalet with all modern amenities and facilities.'); ?>
                </p>
                <?php if ($chalet['area'] > 0): ?>
                <p style="margin-top: 15px; opacity: 0.7;">📐 <?php echo __('area'); ?>: <?php echo $chalet['area']; ?> <?php echo ($lang == 'ar') ? 'م²' : 'm²'; ?></p>
                <?php endif; ?>
            </div>

            <hr class="m3-divider">

            <h3 style="margin-bottom: 20px; font-size: 1.4rem;"><?php echo __('amenities'); ?></h3>
            <div class="amenities-grid" style="margin-bottom: 30px;">
                <?php if ($chalet['has_pool']): ?>
                <div style="display: flex; gap: 10px; align-items: center;">🏊 <span><?php echo __('amenity_pool'); ?></span></div>
                <?php endif; ?>
                <?php if ($chalet['has_wifi']): ?>
                <div style="display: flex; gap: 10px; align-items: center;">📶 <span><?php echo __('amenity_wifi'); ?></span></div>
                <?php endif; ?>
                <?php if ($chalet['has_ac']): ?>
                <div style="display: flex; gap: 10px; align-items: center;">❄️ <span><?php echo __('amenity_ac'); ?></span></div>
                <?php endif; ?>
                <?php if ($chalet['has_parking']): ?>
                <div style="display: flex; gap: 10px; align-items: center;">🚗 <span><?php echo __('amenity_parking'); ?></span></div>
                <?php endif; ?>
                <?php if ($chalet['has_bbq']): ?>
                <div style="display: flex; gap: 10px; align-items: center;">🍖 <span><?php echo __('amenity_bbq'); ?></span></div>
                <?php endif; ?>
            </div>

            <hr class="m3-divider">

            <h3 style="font-size: 1.4rem; margin-bottom: 20px;"><?php echo __('host'); ?></h3>
            <div class="host-enhanced-card">
                <div class="host-info-group">
                    <div style="width: 60px; height: 60px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                        <?php echo mb_substr($chalet['owner_name'], 0, 1); ?>
                    </div>
                    <div class="host-text">
                        <h3><?php echo $chalet['owner_name']; ?></h3>
                        <p><span style="color: var(--primary);">🛡️ <?php echo __('verified_identity'); ?></span></p>
                    </div>
                </div>
                <div style="display: flex; align-items: center; gap: 30px; flex-wrap: wrap;">
                    <div class="host-stats-row">
                        <div class="stat-box-small"><strong><?php echo number_format($chalet['rating'], 1); ?></strong><span><?php echo __('stat_rating'); ?></span></div>
                        <div class="stat-box-small"><strong><?php echo $chalet['reviews_count']; ?></strong><span><?php echo __('reviews'); ?></span></div>
                    </div>
                    <button class="btn-primary" style="background: transparent; color: var(--text); border: 1px solid var(--outline); padding: 8px 20px; font-size: 0.9rem;">
                        <?php echo __('contact_host'); ?>
                    </button>
                </div>
            </div>

            <hr class="m3-divider">

            <h3 style="margin-bottom: 15px; font-size: 1.4rem;"><?php echo __('location'); ?></h3>
            <p style="opacity: 0.7; font-size: 0.9rem;"><?php echo $chalet['location']; ?></p>
            <div class="map-container" style="margin-bottom: 40px;">
                📍 (<?php echo ($lang == 'ar') ? 'خريطة جوجل ستظهر هنا' : 'Google Map will appear here'; ?>)
            </div>

            <hr class="m3-divider">

            <h3 style="margin-bottom: 20px; font-size: 1.4rem;"><?php echo __('chalet_policies'); ?></h3>
            <div style="background: var(--surface-alt); border: 1px solid var(--outline); border-radius: 16px; padding: 30px; display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 40px; margin-bottom: 40px;">
                
                <div>
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                        <span style="font-size: 1.2rem;">🕒</span>
                        <h4 style="margin: 0;"><?php echo __('checkin_rules'); ?></h4>
                    </div>
                    <ul style="list-style: none; padding: 0; font-size: 0.9rem; opacity: 0.8; line-height: 2.2;">
                        <li><strong><?php echo __('checkin'); ?>:</strong> <?php echo $chalet['checkin_time']; ?></li>
                        <li><strong><?php echo __('checkout'); ?>:</strong> <?php echo $chalet['checkout_time']; ?></li>
                    </ul>
                </div>

                <div>
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                        <span style="font-size: 1.2rem;">📅</span>
                        <h4 style="margin: 0;"><?php echo __('cancellation_policy'); ?></h4>
                    </div>
                    <p style="font-size: 0.95rem; font-weight: bold; color: var(--success); margin-bottom: 10px;">
                        ✔ <?php echo __('free_cancel_text'); ?>
                    </p>
                </div>

            </div>

        </div>

        <div>
            <div class="booking-card">
                <div class="price-big">
                    <?php echo formatPrice($chalet['price']); ?> 
                    <small style="font-size: 0.9rem; color: var(--text); font-weight: normal;">/ <?php echo __('night'); ?></small>
                </div>
                
                <form action="checkout.php" method="GET">
                    <input type="hidden" name="chalet_id" value="<?php echo $chalet['id']; ?>">
                    
                    <div style="margin-bottom: 15px; border: 1px solid var(--outline); border-radius: 12px; overflow: hidden; background: var(--surface);">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; border-bottom: 1px solid var(--outline);">
                            <div style="padding: 12px; border-right: 1px solid var(--outline);">
                                <label style="font-size: 0.75rem; font-weight: bold; display: block; margin-bottom: 5px;"><?php echo __('checkin'); ?></label>
                                <input type="date" name="check_in" value="<?php echo date('Y-m-d'); ?>" style="border: none; background: transparent; width: 100%;" required>
                            </div>
                            <div style="padding: 12px;">
                                <label style="font-size: 0.75rem; font-weight: bold; display: block; margin-bottom: 5px;"><?php echo __('checkout'); ?></label>
                                <input type="date" name="check_out" value="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" style="border: none; background: transparent; width: 100%;" required>
                            </div>
                        </div>
                        <div style="padding: 12px;">
                            <label style="font-size: 0.75rem; font-weight: bold; display: block; margin-bottom: 5px;"><?php echo __('guests'); ?></label>
                            <select name="guests" style="border: none; background: transparent; width: 100%;">
                                <option value="1">1 <?php echo __('guest'); ?></option>
                                <option value="2" selected>2 <?php echo __('guests'); ?></option>
                                <option value="3">3 <?php echo __('guests'); ?></option>
                                <option value="4">4 <?php echo __('guests'); ?></option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn-primary full-width" style="justify-content: center; padding: 15px; font-size: 1.1rem; border: none; box-shadow: 0 4px 15px rgba(5, 124, 200, 0.3);">
                        <?php echo __('book_now'); ?>
                    </button>

                    <div style="margin-top: 20px; font-size: 0.9rem; opacity: 0.8;">
                        <p style="text-align: center; margin-bottom: 15px;"><?php echo __('no_charge_yet'); ?></p>
                        
                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                            <span style="text-decoration: underline;"><?php echo formatPrice($chalet['price']); ?> × 1 <?php echo __('night'); ?></span>
                            <span><?php echo formatPrice($chalet['price']); ?></span>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                            <span style="text-decoration: underline;"><?php echo __('cleaning_fee'); ?></span>
                            <span><?php echo formatPrice(150); ?></span>
                        </div>
                        
                        <hr style="opacity: 0.2; margin: 15px 0;">
                        
                        <div style="display: flex; justify-content: space-between; font-weight: bold; font-size: 1.1rem; color: var(--text);">
                            <span><?php echo __('total'); ?></span>
                            <span><?php echo formatPrice($chalet['price'] + 150); ?></span>
                        </div>
                    </div>
                </form>

                <div style="margin-top: 20px; text-align: center; font-size: 0.85rem; opacity: 0.7;">
                    <span style="color: var(--error);">⚑</span> <a href="#" style="text-decoration: underline;"><?php echo __('report_chalet'); ?></a>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include('partials/footer.php'); ?>

<script src="assets/js/main.js"></script>

</body>
</html>
