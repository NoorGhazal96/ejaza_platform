<?php require_once('partials/header.php'); ?>

<section class="hero-section" style="padding: 80px 0 100px; background: linear-gradient(135deg, rgba(5, 124, 200, 0.05), rgba(3, 159, 47, 0.05)); border-radius: 0 0 40px 40px; text-align: center;">
    <div class="container">
        <h1 style="font-size: 2.5rem; color: var(--primary); margin-bottom: 15px; font-weight: 800;">
            <?php echo __('about_hero_title'); ?>
        </h1>
        <p style="font-size: 1.1rem; opacity: 0.8; max-width: 600px; margin: 0 auto; line-height: 1.8;">
            <?php echo __('about_hero_desc'); ?>
        </p>
    </div>
</section>

<div class="container" style="margin-top: 60px;">

    <div style="display: flex; align-items: center; gap: 50px; flex-wrap: wrap; margin-bottom: 80px;">
        <div style="flex: 1; min-width: 300px;">
            <span style="color: var(--secondary); font-weight: bold; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">
                <?php echo __('who_we_are'); ?>
            </span>
            <h2 style="font-size: 2rem; margin: 10px 0 20px; color: var(--text);">
                <?php echo __('our_story_title'); ?>
            </h2>
            <p style="line-height: 1.8; opacity: 0.8; margin-bottom: 20px;">
                <?php echo __('our_story_p1'); ?>
            </p>
            <p style="line-height: 1.8; opacity: 0.8;">
                <?php echo __('our_story_p2'); ?>
            </p>
        </div>
        <div style="flex: 1; min-width: 300px;">
            <img src="https://images.unsplash.com/photo-1540541338287-41700207dee6?w=800" alt="About Ejaza" style="width: 100%; border-radius: 24px; box-shadow: var(--shadow);">
        </div>
    </div>

    <div style="margin-bottom: 80px;">
        <div style="text-align: center; margin-bottom: 40px;">
            <h2 style="font-size: 2rem; margin-bottom: 10px;"><?php echo __('why_choose_us'); ?></h2>
            <p style="opacity: 0.7;"><?php echo __('why_choose_desc'); ?></p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
            
            <div style="background: var(--surface-alt); padding: 30px; border-radius: 20px; border: 1px solid var(--outline); text-align: center; transition: 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 2.5rem; margin-bottom: 15px;">🛡️</div>
                <h3 style="margin-bottom: 10px;"><?php echo __('feature_secure'); ?></h3>
                <p style="opacity: 0.8; font-size: 0.9rem;"><?php echo __('feature_secure_desc'); ?></p>
            </div>

            <div style="background: var(--surface-alt); padding: 30px; border-radius: 20px; border: 1px solid var(--outline); text-align: center; transition: 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 2.5rem; margin-bottom: 15px;">🏡</div>
                <h3 style="margin-bottom: 10px;"><?php echo __('feature_verified'); ?></h3>
                <p style="opacity: 0.8; font-size: 0.9rem;"><?php echo __('feature_verified_desc'); ?></p>
            </div>

            <div style="background: var(--surface-alt); padding: 30px; border-radius: 20px; border: 1px solid var(--outline); text-align: center; transition: 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 2.5rem; margin-bottom: 15px;">📞</div>
                <h3 style="margin-bottom: 10px;"><?php echo __('feature_support'); ?></h3>
                <p style="opacity: 0.8; font-size: 0.9rem;"><?php echo __('feature_support_desc'); ?></p>
            </div>

        </div>
    </div>

    <div style="background: var(--primary); color: white; border-radius: 24px; padding: 50px 20px; display: flex; flex-wrap: wrap; justify-content: space-around; gap: 30px; text-align: center; margin-bottom: 80px;">
        <div>
            <div style="font-size: 2.5rem; font-weight: bold;">+5,000</div>
            <div style="opacity: 0.9;"><?php echo __('stat_chalets'); ?></div>
        </div>
        <div>
            <div style="font-size: 2.5rem; font-weight: bold;">+100k</div>
            <div style="opacity: 0.9;"><?php echo __('stat_nights'); ?></div>
        </div>
        <div>
            <div style="font-size: 2.5rem; font-weight: bold;">4.8/5</div>
            <div style="opacity: 0.9;"><?php echo __('stat_rating'); ?></div>
        </div>
    </div>

    <div style="background: var(--surface-alt); border: 2px dashed var(--primary); border-radius: 24px; padding: 50px; text-align: center; margin-bottom: 50px;">
        <h2 style="margin-bottom: 15px;"><?php echo __('cta_owner_title'); ?></h2>
        <p style="opacity: 0.8; margin-bottom: 30px; max-width: 600px; margin-inline: auto;">
            <?php echo __('cta_owner_desc'); ?>
        </p>
        <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
            <a href="register.php?type=owner" class="btn-primary" style="padding: 12px 30px; font-size: 1.1rem;">
                <?php echo __('btn_register_owner'); ?>
            </a>
            <a href="contact.php" class="btn-primary" style="background: transparent; color: var(--text); border: 1px solid var(--outline);">
                <?php echo __('contact_us'); ?>
            </a>
        </div>
    </div>

</div>

<?php require_once('partials/footer.php'); ?>