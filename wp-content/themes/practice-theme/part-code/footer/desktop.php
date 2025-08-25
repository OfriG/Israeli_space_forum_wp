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
        <h2 class="follow-news">
            <?php
            $title = get_field('newsletter_title', 17);

            if ($title) {
                echo $title;
            } else {
                echo 'Follow our newsletter';
            }
            ?>
        </h2>

        <p class="subscribe">
            <?php
            $description = get_field('newsletter_description', 17);

            if ($description) {
                echo  $description;
            } else {
                echo 'Subscribe to the ISF newsletter to receive the latest announcements, opportunities, event invitations and more.';
            }
            ?>
        </p>
        <form id="newsletter">
            <div class="newsletter-form">
                <div class="newsletter-actions">
                    <input id="email" type="email" placeholder="Email" class="email-input" required />
                    <button class="subscribe-btn" type="submit">
                        <?php
                        if (get_field('subscribe_button_text')) {
                            the_field('subscribe_button_text');
                        } else {
                            echo 'Subscribe';
                        }
                        ?>
                    </button>
                </div>

                <a href="#" class="linkedin-link" aria-label="Follow us on LinkedIn">
                    <span class="linkedin-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/LinkedIn.svg" alt="LinkedIn" />
                    </span>
                </a>
            </div>
    </div>
</div>
</form>

<div class="logos-desktop">
    <p>Powered by</p>
    <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/RAKIA.png')); ?>" />
    <div class="desktop-terms">
        <?php
        wp_nav_menu([
            'theme_location' => 'footer_terms',
            'container' => false,
            'menu_class' => 'desktop-terms-menu',
            'fallback_cb' => function () {
                echo '<p>Privacy Policy</p><p>Terms of use</p><p>Accessibility</p>';
            }
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