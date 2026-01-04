<?php require_once('partials/header.php'); ?>

<div class="container details-page">

    <div style="font-size: 0.9rem; opacity: 0.7; margin-bottom: 20px;">
        <a href="index.php"><?php echo __('nav_home'); ?></a> &gt; 
        <a href="search.php"><?php echo __('city_riyadh'); ?></a> &gt; 
        <span>شاليه النسيم الفاخر VIP</span>
    </div>

    <div style="margin-bottom: 25px;">
        <h1 style="color: var(--primary); margin-bottom: 10px; font-size: 2rem;">شاليه النسيم الفاخر VIP</h1>
        <div style="display: flex; gap: 20px; align-items: center; font-size: 0.95rem; flex-wrap: wrap;">
            <span class="rating" style="font-weight: bold;">★ 4.9 (120 <?php echo __('reviews'); ?>)</span>
            <span>📍 الرياض، حي الرمال</span>
            <span style="color: var(--success);">🏆 <?php echo __('superhost'); ?></span>
        </div>
    </div>

    <div class="gallery-section">
        <div style="background-image: url('https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=800');"></div>
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
                    استمتع بإقامة استثنائية في شاليه النسيم، المصمم لراحتك وخصوصيتك. يتميز الشاليه بمسبح كبير مع نظام تدفئة، جلسات خارجية مطلة على الحديقة، ومنطقة شواء متكاملة.
                    <br><br>
                    المكان مثالي للعائلات، حيث نوفر منطقة ألعاب للأطفال وشاشة سينمائية خارجية.
                </p>
            </div>

            <hr class="m3-divider">

            <h3 style="margin-bottom: 20px; font-size: 1.4rem;"><?php echo __('amenities'); ?></h3>
            <div class="amenities-grid" style="margin-bottom: 30px;">
                <div style="display: flex; gap: 10px; align-items: center;">🏊 <span><?php echo __('amenity_pool'); ?></span></div>
                <div style="display: flex; gap: 10px; align-items: center;">📶 <span><?php echo __('amenity_wifi'); ?></span></div>
                <div style="display: flex; gap: 10px; align-items: center;">❄️ <span><?php echo __('amenity_ac'); ?></span></div>
                <div style="display: flex; gap: 10px; align-items: center;">🚗 <span><?php echo __('amenity_parking'); ?></span></div>
                <div style="display: flex; gap: 10px; align-items: center;">📺 <span>سينما خارجية</span></div>
                <div style="display: flex; gap: 10px; align-items: center;">🧸 <span>ألعاب أطفال</span></div>
                <div style="display: flex; gap: 10px; align-items: center;">☕ <span>ركن قهوة</span></div>
                <div style="display: flex; gap: 10px; align-items: center;">🍖 <span><?php echo __('amenity_bbq'); ?></span></div>
            </div>

            <hr class="m3-divider">

            <h3 style="font-size: 1.4rem; margin-bottom: 20px;"><?php echo __('host'); ?></h3>
            <div class="host-enhanced-card">
                <div class="host-info-group">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=150" alt="Host" class="host-avatar-circle">
                    <div class="host-text">
                        <h3>أحمد العلي</h3>
                        <p>انضم في مارس 2021 • <span style="color: var(--primary);">🛡️ <?php echo __('verified_identity'); ?></span></p>
                    </div>
                </div>
                <div style="display: flex; align-items: center; gap: 30px; flex-wrap: wrap;">
                    <div class="host-stats-row">
                        <div class="stat-box-small"><strong>4.9</strong><span><?php echo __('stat_rating'); ?></span></div>
                        <div class="stat-box-small"><strong>120</strong><span><?php echo __('reviews'); ?></span></div>
                        <div class="stat-box-small"><strong>ساعة</strong><span><?php echo __('response_time'); ?></span></div>
                    </div>
                    <button class="btn-primary" style="background: transparent; color: var(--text); border: 1px solid var(--outline); padding: 8px 20px; font-size: 0.9rem;">
                        <?php echo __('contact_host'); ?>
                    </button>
                </div>
            </div>

            <hr class="m3-divider">

            <h3 style="margin-bottom: 15px; font-size: 1.4rem;"><?php echo __('location'); ?></h3>
            <p style="opacity: 0.7; font-size: 0.9rem;">الرياض، حي الرمال، بالقرب من طريق الدمام</p>
            <div class="map-container" style="margin-bottom: 40px;">
                📍 (خريطة جوجل ستظهر هنا)
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
                        <li><strong><?php echo __('checkin'); ?>:</strong> بعد الساعة 3:00 عصراً</li>
                        <li><strong><?php echo __('checkout'); ?>:</strong> قبل الساعة 12:00 ظهراً</li>
                        <li>• ممنوع التدخين داخل الغرف</li>
                        <li>• غير مسموح بالحيوانات الأليفة</li>
                        <li>• يمنع إقامة الحفلات الصاخبة</li>
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
                    <p style="font-size: 0.9rem; opacity: 0.8; line-height: 1.6; margin-bottom: 15px;">
                        استرجع المبلغ كاملاً إذا قمت بالإلغاء قبل الموعد المحدد. 
                        <br>في حال الإلغاء بعد ذلك (أقل من 48 ساعة)، سيتم خصم قيمة الليلة الأولى ورسوم الخدمة.
                    </p>
                    <a href="#" style="color: var(--primary); text-decoration: underline; font-size: 0.85rem;"><?php echo __('read_full_policy'); ?></a>
                </div>

            </div>

            <hr class="m3-divider">

            <div style="margin-top: 40px;">
                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 30px;">
                    <h3 style="font-size: 1.5rem; margin: 0;">⭐ 4.9</h3>
                    <span style="font-size: 1.5rem;">·</span>
                    <h3 style="font-size: 1.5rem; margin: 0;">120 <?php echo __('reviews'); ?></h3>
                </div>

                <div class="rating-bars-container">
                    <div class="rating-line"><span><?php echo __('cleanliness'); ?></span><div style="display:flex;align-items:center;"><div class="bar-track"><div class="bar-fill" style="width:98%;"></div></div><span style="font-weight:bold;margin-inline-start:8px;">4.9</span></div></div>
                    <div class="rating-line"><span><?php echo __('accuracy'); ?></span><div style="display:flex;align-items:center;"><div class="bar-track"><div class="bar-fill" style="width:95%;"></div></div><span style="font-weight:bold;margin-inline-start:8px;">4.8</span></div></div>
                    <div class="rating-line"><span><?php echo __('communication'); ?></span><div style="display:flex;align-items:center;"><div class="bar-track"><div class="bar-fill" style="width:100%;"></div></div><span style="font-weight:bold;margin-inline-start:8px;">5.0</span></div></div>
                    <div class="rating-line"><span><?php echo __('location'); ?></span><div style="display:flex;align-items:center;"><div class="bar-track"><div class="bar-fill" style="width:90%;"></div></div><span style="font-weight:bold;margin-inline-start:8px;">4.5</span></div></div>
                </div>

                <div class="reviews-enhanced-grid">
                    <div class="review-card-box">
                        <div class="review-user-row">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" class="review-user-avatar">
                            <div>
                                <div style="font-weight: bold; font-size: 0.95rem;">سعود الشمري</div>
                                <div style="font-size: 0.8rem; color: var(--text-secondary);">ديسمبر 2024</div>
                            </div>
                        </div>
                        <div class="review-content">
                            المكان جداً جميل ونظيف، المسبح دافئ ومناسب للأطفال. المضيف أحمد كان متعاوناً جداً.
                        </div>
                    </div>
                    <div class="review-card-box">
                        <div class="review-user-row">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" class="review-user-avatar">
                            <div>
                                <div style="font-weight: bold; font-size: 0.95rem;">مريم عبدالله</div>
                                <div style="font-size: 0.8rem; color: var(--text-secondary);">نوفمبر 2024</div>
                            </div>
                        </div>
                        <div class="review-content">
                            الشاليه فخم ومرتب، الأثاث جديد ونظيف. يعيبه فقط أن الطريق المؤدي للشاليه غير معبد بالكامل.
                        </div>
                    </div>
                </div>
                <button class="btn-primary" style="margin-top: 30px; background: transparent; color: var(--text); border: 1px solid var(--outline); padding: 12px 30px;">
                    <?php echo __('show_all_reviews'); ?>
                </button>
            </div>

        </div>

        <div>
            <div class="booking-card">
                <div class="price-big">
                    <?php echo formatPrice(1200); ?> 
                    <small style="font-size: 0.9rem; color: var(--text); font-weight: normal;">/ <?php echo __('night'); ?></small>
                </div>
                
                <form action="checkout.php" method="GET">
                    
                    <div style="margin-bottom: 15px; border: 1px solid var(--outline); border-radius: 12px; overflow: hidden; background: var(--surface);">
                        <div style="padding: 10px; border-bottom: 1px solid var(--outline);">
                            <label style="font-size: 0.75rem; font-weight: bold; display: block; text-transform: uppercase;"><?php echo __('booking_dates'); ?></label>
                            <input type="text" id="booking_dates" placeholder="وصول - مغادرة" style="border: none; width: 100%; outline: none; background: transparent; padding-top: 5px;">
                        </div>
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <select class="m3-input">
                            <option>1 <?php echo __('guest'); ?></option>
                            <option selected>2 <?php echo __('guests'); ?></option>
                            <option>3 <?php echo __('guests'); ?></option>
                        </select>
                    </div>

                    <button type="submit" class="btn-primary full-width" style="justify-content: center; padding: 15px; font-size: 1.1rem; border: none; box-shadow: 0 4px 15px rgba(5, 124, 200, 0.3);">
                        <?php echo __('book_now'); ?>
                    </button>

                    <div style="margin-top: 20px; font-size: 0.9rem; opacity: 0.8;">
                        <p style="text-align: center; margin-bottom: 15px;"><?php echo __('no_charge_yet'); ?></p>
                        
                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                            <span style="text-decoration: underline;"><?php echo formatPrice(1200); ?> × 2 <?php echo __('nights'); ?></span>
                            <span><?php echo formatPrice(2400); ?></span>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                            <span style="text-decoration: underline;"><?php echo __('cleaning_fee'); ?></span>
                            <span><?php echo formatPrice(150); ?></span>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                            <span style="text-decoration: underline;"><?php echo __('service_fee'); ?></span>
                            <span><?php echo formatPrice(0); ?></span>
                        </div>
                        
                        <hr style="opacity: 0.2; margin: 15px 0;">
                        
                        <div style="display: flex; justify-content: space-between; font-weight: bold; font-size: 1.1rem; color: var(--text);">
                            <span><?php echo __('total'); ?></span>
                            <span><?php echo formatPrice(2550); ?></span>
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