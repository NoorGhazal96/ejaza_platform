<?php 
require_once('includes/db_connect.php');
require_once('includes/config.php');
require_once('includes/functions.php');

$stmt = $pdo->query("SELECT * FROM chalets WHERE status = 'active' ORDER BY rating DESC LIMIT 6");
$chalets = $stmt->fetchAll();

require_once('partials/header.php'); 
?>

<section class="hero-section">
    <div class="container">
        <h1 class="hero-title"><?php echo __('hero_title'); ?></h1>
        <p class="hero-subtitle">
            <?php echo __('hero_subtitle'); ?>
        </p>
    </div>
</section>

<div class="search-container-wrapper">
    <form class="search-bar-capsule" action="search.php" method="GET">
        
        <div class="search-field field-location">
            <div class="field-icon">📍</div>
            <div class="field-content">
                <label><?php echo __('destination'); ?></label>
                <input type="text" name="location" placeholder="<?php echo __('city_riyadh'); ?>">
            </div>
        </div>

        <div class="divider"></div>

        <div class="search-field field-date">
            <div class="field-icon">📅</div>
            <div class="field-content">
                <label><?php echo __('dates'); ?></label>
                <input type="text" id="dates" name="dates" placeholder="<?php echo __('dates_placeholder'); ?>" readonly>
            </div>
        </div>

        <div class="divider"></div>

        <div class="search-field field-guests" onclick="toggleDropdown('guestDropdown')">
            <div class="field-icon">👥</div>
            <div class="field-content">
                <label><?php echo __('guests'); ?></label>
                <span id="guest-label" style="font-size: 0.9rem; font-weight: 500;">1 <?php echo __('guest'); ?></span>
                <input type="hidden" name="adults" id="input-adults" value="1">
                <input type="hidden" name="children" id="input-children" value="0">
            </div>
            
            <div class="guest-dropdown" id="guestDropdown" onclick="event.stopPropagation()">
                <div class="guest-row">
                    <span class="guest-type-label"><?php echo __('adults'); ?></span>
                    <div class="counter-controls">
                        <button type="button" onclick="updateGuest('adults', -1, event)">-</button>
                        <span id="adults-count">1</span>
                        <button type="button" onclick="updateGuest('adults', 1, event)">+</button>
                    </div>
                </div>
                <div class="guest-row">
                    <span class="guest-type-label"><?php echo __('children'); ?></span>
                    <div class="counter-controls">
                        <button type="button" onclick="updateGuest('children', -1, event)">-</button>
                        <span id="children-count">0</span>
                        <button type="button" onclick="updateGuest('children', 1, event)">+</button>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="search-btn-primary">
            <span class="icon">🔍</span>
        </button>
    </form>
</div>

<main class="container main-layout">
    
    <?php include('partials/sidebar-filters.php'); ?>

    <section class="content-area">
        <h2 class="section-title" style="margin-bottom: 20px; color: var(--primary);"><?php echo __('featured_chalets'); ?></h2>
        
        <div class="chalet-grid">
            
            <?php if (empty($chalets)): ?>
            <div style="grid-column: span 3; text-align: center; padding: 60px 20px;">
                <p style="font-size: 3rem; margin-bottom: 20px;">🏠</p>
                <h3 style="color: var(--text); margin-bottom: 10px;"><?php echo ($lang == 'ar') ? 'لا توجد شاليهات متاحة حالياً' : 'No chalets available yet'; ?></h3>
            </div>
            <?php else: ?>
            
            <?php foreach ($chalets as $chalet): ?>
            <div class="chalet-card">
                <div class="card-image" style="background-image: url('<?php echo $chalet['image_url'] ?: 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=500'; ?>');"></div>
                <div class="card-details">
                    <h3><?php echo ($lang == 'ar') ? $chalet['name_ar'] : ($chalet['name_en'] ?: $chalet['name_ar']); ?></h3>
                    <p class="card-location">📍 <?php echo $chalet['location']; ?></p>
                    <div class="rating">⭐ <?php echo number_format($chalet['rating'], 1); ?> (<?php echo $chalet['reviews_count']; ?> <?php echo __('reviews'); ?>)</div>
                    
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

</main>

<?php include('partials/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<?php if($lang == 'ar'): ?>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ar.js"></script>
<?php endif; ?>

<script src="assets/js/main.js"></script>

</body>
</html>
