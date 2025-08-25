<div class="mobile-bottom-section">
    <div class="menus">
        <div class="footer-lower-nav">
            <nav aria-label="<?php echo esc_attr__('Footer menu', 'practice-theme'); ?>">
                <?php
                wp_nav_menu([
                    'theme_location' => 'secondary',
                    'container'      => false,
                    'menu_class'     => 'menu-footer-lower',
                    'depth'          => 1,
                ]);
                ?>
            </nav>
        </div>

        <div class="footer-terms">
            <nav aria-label="<?php echo esc_attr__('Footer Terms', 'practice-theme'); ?>">
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer_terms',
                    'container'      => false,
                    'menu_class'     => 'menu-footer-lower',
                    'depth'          => 1,
                ]);
                ?>
            </nav>

        </div>
    </div>

    <div class="footer-thanks">
        <p class="credits-line">
            Designed and developed by
            <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/Moveo.png')); ?>" alt="Moveo" />
        </p>
        <p>*All space images were taken by Eytan Stibbe </p>
        <p>during Rakia AX1 Mission.</p>
    </div>

    <div class="logos">
        <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/startup-nation-central.png')); ?>" />
        <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/israeli-high-teck.png')); ?>" />
        <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/israel-export.png')); ?>" />
        <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/ISA.png')); ?>" />
        <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/ministry.png')); ?>" />
        <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/innovation.png')); ?>" />
    </div>
</div>