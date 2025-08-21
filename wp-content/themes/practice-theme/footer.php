<footer id="colophon" class="site-footer" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/footer.png');">
    <!-- Main footer section with footer image background -->
    <div class="footer-main">
        <div class="container footer-grid">
            <footer id="colophon" class="site-footer">
                <div class="footer-main" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/footer.png'); background-size: cover;">
                    <div class="footer-grid">
                        <div class="footer-left">
                            <div class="logo-powered-container">
                                <div class="footer-logo"><?php display_site_logo(); ?></div>
                                <div class="div-powered-by">
                                    <span class="Powered-by">Powered by</span>
                                    <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/RAKIA.png')); ?>" alt="Moveo Logo" />
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="footer-right">
                        <h2 class="follow-news">FOLLOW OUR<br>NEWSLETTER</h2>
                        <p class="subscribe">Subscribe to the ISF newsletter to receive the latest announcements, opportunities, event invitations and more.</p>
                        <div class="newsletter-form">
                            <input type="email" placeholder="Email" class="email-input">
                            <div>
                                <button class="subscribe-btn">Subscribe</button>
                                <a href="#" class="linkedin-link">
                                    <span class="linkedin-icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/LinkedIn.svg" alt="LinkedIn">
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <span class="line">_</span>

                </div>


        </div>
        <div class="lower">
            <div class="footer-lower-section">
                <nav
                    class="footer-lower-nav"
                    aria-label="<?php echo esc_attr__('Footer menu', 'practice-theme'); ?>">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'secondary',
                        'container'      => false,
                        'menu_class'     => 'menu-lfooter-lower',
                        'depth'          => 1,

                    ]);
                    ?>
                </nav>
                <div class="footer-terms">
                    <p>Terms of use</p>
                    <p>Accessibility</p>
                    <p>Privacy Policy</p>
                </div>
            </div>
            <div class="footer-text-container">
                <p class="footer-text">
                    Designed and developed by </p>
                <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/Moveo.png')); ?>" />
                <p class="footer-text">
                    *All space images were taken by Eytan Stibbe during Rakia AX1 Mission.
                </p>
            </div>
            <div class="footer-logos">

                <div class="logos-grid">
                    <div class="footer-icons">
                        <img
                            src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/startup-nation-central.png')); ?>" />
                        <img
                            src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/israeli-high-teck.png')); ?>" />
                        <img
                            src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/israel-export.png')); ?>" />
                        <img
                            src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/ISA.png')); ?>" />
                        <img
                            src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/ministry.png')); ?>" />
                        <img
                            src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/innovation.png')); ?>" />
                    </div>
                </div>

            </div>
</footer>
<?php wp_footer(); ?>