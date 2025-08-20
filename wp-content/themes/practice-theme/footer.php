<footer id="colophon" class="site-footer" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/footer.png');">
    <!-- Main footer section with footer image background -->
    <div class="footer-main">
        <div class="container footer-grid">
            <!-- LEFT COLUMN: Logo and main links -->
            <footer id="colophon" class="site-footer">
                <div class="footer-main" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/footer.png'); background-size: cover;">
                    <div class="footer-grid">
                        <div class="footer-left">
                            <div class="footer-logo"><?php display_site_logo();
                                                        ?></div>
                            <a class="element" href="<?php echo site_url('/about-us') ?>">About Us</a>
                            <a class="element" href="<?php echo site_url('/iac') ?>">IAC 2024</a>
                            <a class="element" href="<?php echo site_url('/contact-us') ?>">Contact Us</a>
                            <a href="<?php echo home_url(); ?>" class="navbar-menu-item navbar-logo">
                                <?php
                                // Display site logo
                                // This will check: 1) ACF Options Page, 2) ACF Logo Settings Page, 3) WordPress Customizer
                                display_site_logo();
                                ?>
                            </a>
                            <a href="<?php echo site_url('/about-us') ?>" class="element">About Us</a>
                            <a href="<?php echo site_url('/iac') ?>" class="element">IAC 2024</a>
                            <a href="<?php echo site_url('/contact-us') ?>" class="element">Contact Us</a>
                            <div class="footer-credit">
                                Designed and developed by<br>
                                *All space images were taken by Eytan Stibbe during Rakia AX1 Mission.
                            </div>
                        </div>

                        <div class="footer-right">
                            <h2 class="follow-news">FOLLOW OUR NEWSLETTER</h2>
                            <p class="subscribe">Subscribe to the ISF newsletter to receive the latest announcements, opportunities, event invitations and more.</p>
                            <div class="newsletter-form">
                                <input type="email" placeholder="Email" class="email-input">
                                <button class="subscribe-btn sub">Subscribe</button>
                                <a href="#" class="linkedin-link">
                                    <span class="linkedin-icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/LinkedIn.svg" alt="LinkedIn">
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- RIGHT COLUMN: Newsletter subscription -->
                    <div class="footer-right">
                        <h2 class="follow-news">FOLLOW OUR NEWSLETTER</h2>
                        <p class="subscribe">Subscribe to the ISF newsletter to receive the latest announcements, opportunities, event invitations and more.</p>
                        <div class="newsletter-form">
                            <input type="email" placeholder="Email" class="email-input">
                            <button class="subscribe-btn">

                                <div class="sub">Subscribe</div>
                            </button>
                            <a href="#" class="linkedin-link">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/LinkedIn.svg" alt="LinkedIn" class="linkedin-icon">
                            </a>
                        </div>
                    </div>

                </div>
        </div>



        <div class="footer-logos">

            <div class="logos-grid">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'menu_class'     => 'main-navigation',
                    'container'      => 'nav',
                    'container_class' => 'navbar'
                ));
                ?>

            </div>

        </div>
</footer>
<?php wp_footer(); ?>