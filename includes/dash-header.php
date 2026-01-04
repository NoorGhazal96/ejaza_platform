<header class="dash-header">
    <div>
        <h2 id="page-title"><?php echo __('dash_overview'); ?></h2> 
        <p style="opacity: 0.7; font-size: 0.9rem;" id="page-subtitle"><?php echo __('welcome'); ?></p>
    </div>
    
    <div style="display: flex; gap: 10px; align-items: center;">
        
        <div class="dropdown-wrapper">
            <button class="icon-btn" onclick="toggleDropdown('curr-drop')" style="font-size: 0.9rem; font-weight: bold;">
                <?php echo ($currency == 'SAR') ? '💰 SAR' : '💵 USD'; ?>
            </button>
            <div id="curr-drop" class="dropdown-menu">
                <a href="?<?php echo http_build_query(array_merge($_GET, ['currency' => 'SAR'])); ?>">SAR (ريال سعودي)</a>
                <a href="?<?php echo http_build_query(array_merge($_GET, ['currency' => 'USD'])); ?>">USD (دولار أمريكي)</a>
            </div>
        </div>

        <div class="dropdown-wrapper">
            <button class="icon-btn" onclick="toggleDropdown('lang-drop')">
                <?php echo ($lang == 'ar') ? '🌐 العربية' : '🌐 English'; ?>
            </button>
            <div id="lang-drop" class="dropdown-menu">
                <a href="?<?php echo http_build_query(array_merge($_GET, ['lang' => 'ar'])); ?>">العربية</a>
                <a href="?<?php echo http_build_query(array_merge($_GET, ['lang' => 'en'])); ?>">English</a>
            </div>
        </div>

        <button class="icon-btn" onclick="toggleTheme()" title="تبديل المظهر">
            <span id="theme-icon">🌓</span>
        </button>

        <button class="icon-btn">🔔</button>
        
    </div>
</header>