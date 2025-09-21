<!-- Desktop Footer Section -->
<div class="desktop-upper-section">
    <!-- Left Section -->
    <div class="left-section">
        <div class="site-logo-desktop"> <?php display_site_logo(); ?></div>

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

        <p class="credits-line">
            Designed and developed by
            <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/Moveo.png')); ?>" alt="Moveo" />
        </p>

        <p>*All space images were taken by Eytan Stibbe during Rakia AX1 Mission.</p>
    </div>

    <!-- Right Section -->
    <div class="right-section">
        <div class="desktop-newsletter-wrapper">
            <?php get_template_part('template-parts/footer/newsLetterFooter', null, ['form_id' => 'newsletter-desktop']); ?>
        </div>
    </div>
</div>

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