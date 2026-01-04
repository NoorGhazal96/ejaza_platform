<aside class="filters-sidebar">
    <h3 class="filter-main-title"><?php echo __('filter_title'); ?></h3>

    <div class="filter-group">
        <label class="filter-label"><?php echo __('smart_search'); ?></label>
        <input type="text" class="m3-input" placeholder="<?php echo __('search_placeholder'); ?>">
    </div>

    <hr class="m3-divider">

    <div class="filter-group">
        <label class="filter-label"><?php echo __('price_range'); ?></label>
        <input type="range" min="100" max="5000" class="m3-slider" id="priceRange" oninput="document.getElementById('priceVal').innerText = this.value">
        <div class="price-display">
            <span id="priceVal">500</span> 
            <?php echo ($currency == 'USD') ? '$' : __('sar'); ?>
        </div>
    </div>

    <hr class="m3-divider">

    <div class="filter-group">
        <label class="filter-label"><?php echo __('amenities'); ?></label>
        <label class="m3-checkbox">
            <input type="checkbox" name="wifi"> <span>📶 WiFi</span>
        </label>
        <label class="m3-checkbox">
            <input type="checkbox" name="pool"> <span>🏊 <?php echo __('pool'); ?></span>
        </label>
        <label class="m3-checkbox">
            <input type="checkbox" name="parking"> <span>🚗 <?php echo __('parking'); ?></span>
        </label>
    </div>

    <hr class="m3-divider">

    <div class="filter-group">
        <label class="filter-label"><?php echo __('cancellation_policy'); ?></label>
        <label class="m3-checkbox">
            <input type="checkbox" name="free_cancel"> <span><?php echo __('free_cancellation'); ?></span>
        </label>
    </div>
</aside>