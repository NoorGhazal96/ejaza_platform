<?php 
// استدعاء ملف الهيدر (يحتوي على config.php وربط CSS)
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
            
            <div class="chalet-card">
                <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=500');"></div>
                <div class="card-details">
                    <h3>شاليه النسيم</h3>
                    <p class="card-location">📍 الرياض، الثمامة</p>
                    <div class="rating">⭐ 4.8 (50 <?php echo __('reviews'); ?>)</div>
                    
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
                    <h3>منتجع العمارية هيلز</h3>
                    <p class="card-location">📍 الرياض، العمارية</p>
                    <div class="rating">⭐ 4.9 (120 <?php echo __('reviews'); ?>)</div>
                    
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
                    <div class="rating">⭐ 4.5 (30 <?php echo __('reviews'); ?>)</div>
                    
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

</main>

<?php include('partials/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<?php if($lang == 'ar'): ?>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ar.js"></script>
<?php endif; ?>

<script src="assets/js/main.js"></script>

</body>
</html>