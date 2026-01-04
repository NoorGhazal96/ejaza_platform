<?php require_once('partials/header.php'); ?>

<section class="hero-section" style="padding: 60px 0 100px; background: linear-gradient(135deg, rgba(5, 124, 200, 0.1), rgba(3, 159, 47, 0.05)); border-radius: 0 0 40px 40px;">
    <div class="container" style="text-align: center;">
        <h1 style="font-size: 2.5rem; color: var(--primary); margin-bottom: 15px;">
            <?php echo __('contact_hero_title'); ?>
        </h1>
        <p style="font-size: 1.1rem; opacity: 0.8; max-width: 600px; margin: 0 auto;">
            <?php echo __('contact_hero_desc'); ?>
        </p>
    </div>
</section>

<div class="container" style="margin-top: -60px; position: relative; z-index: 10;">
    
    <div class="details-layout" style="gap: 40px; align-items: flex-start;">

        <div style="display: flex; flex-direction: column; gap: 20px;">
            
            <div style="background: var(--surface-alt); padding: 25px; border-radius: 20px; border: 1px solid var(--outline); display: flex; align-items: center; gap: 20px; box-shadow: var(--shadow);">
                <div style="width: 50px; height: 50px; background: rgba(5, 124, 200, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: var(--primary);">
                    📞
                </div>
                <div>
                    <h3 style="font-size: 1.1rem; margin-bottom: 5px;"><?php echo __('call_us'); ?></h3>
                    <p style="opacity: 0.7; font-size: 0.9rem; margin-bottom: 5px;"><?php echo __('working_hours'); ?></p>
                    <a href="tel:920000000" style="color: var(--primary); font-weight: bold; direction: ltr; display: inline-block;">9200 00000</a>
                </div>
            </div>

            <div style="background: var(--surface-alt); padding: 25px; border-radius: 20px; border: 1px solid var(--outline); display: flex; align-items: center; gap: 20px; box-shadow: var(--shadow);">
                <div style="width: 50px; height: 50px; background: rgba(3, 159, 47, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: var(--secondary);">
                    ✉️
                </div>
                <div>
                    <h3 style="font-size: 1.1rem; margin-bottom: 5px;"><?php echo __('email'); ?></h3>
                    <p style="opacity: 0.7; font-size: 0.9rem; margin-bottom: 5px;"><?php echo __('email_desc'); ?></p>
                    <a href="mailto:support@ejaza.com" style="color: var(--primary); font-weight: bold;">support@ejaza.com</a>
                </div>
            </div>

            <div style="background: var(--surface-alt); padding: 25px; border-radius: 20px; border: 1px solid var(--outline); display: flex; align-items: center; gap: 20px; box-shadow: var(--shadow);">
                <div style="width: 50px; height: 50px; background: rgba(237, 108, 2, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: var(--warning);">
                    📍
                </div>
                <div>
                    <h3 style="font-size: 1.1rem; margin-bottom: 5px;"><?php echo __('headquarters'); ?></h3>
                    <p style="opacity: 0.7; font-size: 0.9rem;"><?php echo __('address_text'); ?></p>
                </div>
            </div>

            <div class="map-container" style="height: 250px; border-radius: 20px; overflow: hidden; margin-top: 10px;">
                 <div style="width: 100%; height: 100%; background: #eee; display: flex; align-items: center; justify-content: center; background-image: url('https://upload.wikimedia.org/wikipedia/commons/e/ec/World_map_blank_without_borders.svg'); background-size: cover; opacity: 0.6;">
                    <span style="background: white; padding: 10px 20px; border-radius: 50px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); font-weight: bold; color: #333;">
                        📍 <?php echo __('our_location_map'); ?>
                    </span>
                 </div>
            </div>

        </div>

        <div style="background: var(--surface-alt); padding: 40px; border-radius: 24px; border: 1px solid var(--outline); box-shadow: var(--shadow);">
            <h2 style="margin-bottom: 10px; color: var(--primary);"><?php echo __('send_message_title'); ?></h2>
            <p style="margin-bottom: 30px; opacity: 0.7;"><?php echo __('send_message_desc'); ?></p>

            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('<?php echo __('msg_sent_alert'); ?>');">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label class="filter-label"><?php echo __('full_name'); ?></label>
                        <input type="text" class="m3-input" placeholder="<?php echo __('name_placeholder'); ?>">
                    </div>
                    <div>
                        <label class="filter-label"><?php echo __('phone'); ?></label>
                        <input type="tel" class="m3-input" placeholder="05xxxxxxxx">
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label class="filter-label"><?php echo __('email'); ?></label>
                    <input type="email" class="m3-input" placeholder="name@example.com">
                </div>

                <div style="margin-bottom: 20px;">
                    <label class="filter-label"><?php echo __('inquiry_type'); ?></label>
                    <select class="m3-input">
                        <option><?php echo __('inquiry_general'); ?></option>
                        <option><?php echo __('inquiry_booking'); ?></option>
                        <option><?php echo __('inquiry_complaint'); ?></option>
                        <option><?php echo __('inquiry_partnership'); ?></option>
                    </select>
                </div>

                <div style="margin-bottom: 30px;">
                    <label class="filter-label"><?php echo __('message_label'); ?></label>
                    <textarea class="m3-textarea" rows="5" placeholder="<?php echo __('message_placeholder'); ?>"></textarea>
                </div>

                <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; padding: 15px; font-size: 1.1rem;">
                    <?php echo __('btn_send_message'); ?> ✈️
                </button>
            </form>
        </div>

    </div>
</div>

<div class="container" style="margin-top: 80px; margin-bottom: 50px;">
    <h2 style="text-align: center; margin-bottom: 40px;"><?php echo __('faq_title'); ?></h2>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
        <div style="background: var(--surface-alt); padding: 20px; border-radius: 16px; border: 1px solid var(--outline);">
            <h3 style="font-size: 1.1rem; margin-bottom: 10px; color: var(--primary);"><?php echo __('faq_q1'); ?></h3>
            <p style="opacity: 0.8; font-size: 0.95rem;"><?php echo __('faq_a1'); ?></p>
        </div>
        
        <div style="background: var(--surface-alt); padding: 20px; border-radius: 16px; border: 1px solid var(--outline);">
            <h3 style="font-size: 1.1rem; margin-bottom: 10px; color: var(--primary);"><?php echo __('faq_q2'); ?></h3>
            <p style="opacity: 0.8; font-size: 0.95rem;"><?php echo __('faq_a2'); ?></p>
        </div>

        <div style="background: var(--surface-alt); padding: 20px; border-radius: 16px; border: 1px solid var(--outline);">
            <h3 style="font-size: 1.1rem; margin-bottom: 10px; color: var(--primary);"><?php echo __('faq_q3'); ?></h3>
            <p style="opacity: 0.8; font-size: 0.95rem;"><?php echo __('faq_a3'); ?></p>
        </div>
    </div>
</div>

<?php require_once('partials/footer.php'); ?>