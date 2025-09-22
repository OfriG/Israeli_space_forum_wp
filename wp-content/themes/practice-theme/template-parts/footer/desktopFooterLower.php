<div class="desktop-lower-section">
    <p>Powered by</p>
    <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/RAKIA.png')); ?>" />
    <div class="desktop-terms">
        <?php
        wp_nav_menu([
            'theme_location' => 'footer_terms',
            'container' => false,
            'menu_class' => 'desktop-terms-menu'

        ]);
        ?>
    </div>
    <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/startup-nation-central.png')); ?>" />
    <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/israeli-high-teck.png')); ?>" />
    <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/israel-export.png')); ?>" />
    <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/ISA.png')); ?>" />
    <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/ministry.png')); ?>" />
    <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/innovation.png')); ?>" />
</div>
