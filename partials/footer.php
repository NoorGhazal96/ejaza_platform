<footer class="md-footer">
    <div class="container">
        <div class="footer-grid">
            
            <div class="footer-col">
                <div class="footer-logo">
                    <img src="assets/img/logo.png" alt="Ejaza Logo" style="height: 50px; filter: grayscale(100%) brightness(200%);">
                </div>
                <p class="footer-desc" style="opacity: 0.7; margin-top: 15px; line-height: 1.8;">
                    <?php echo __('footer_desc'); ?>
                </p>
            </div>

            <div class="footer-col">
                <h3><?php echo __('quick_links'); ?></h3>
                <ul class="footer-links">
                    <li><a href="index.php"><?php echo __('nav_home'); ?></a></li>
                    <li><a href="about.php"><?php echo __('nav_about'); ?></a></li>
                    <li><a href="owner/index.php"><?php echo __('owner_badge'); ?></a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3><?php echo __('support'); ?></h3>
                <ul class="footer-links">
                    <li><a href="contact.php"><?php echo __('contact_us'); ?></a></li>
                    <li><a href="privacy.php"><?php echo __('privacy_policy'); ?></a></li>
                    <li><a href="terms.php"><?php echo __('terms'); ?></a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3><?php echo __('follow_us'); ?></h3>
                <div class="social-icons">
                    <a href="#" class="social-btn">🐦</a> 
                    <a href="#" class="social-btn">📸</a> 
                    <a href="#" class="social-btn">👻</a> 
                </div>
            </div>
        </div>

        <hr class="footer-divider">

        <div class="footer-bottom">
            <p><?php echo __('copyright'); ?> &copy; <?php echo date('Y'); ?></p>
        </div>
    </div>
</footer>