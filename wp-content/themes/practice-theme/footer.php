<footer id="colophon" class="site-footer" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/footer.png');">
    <!-- Main footer section with footer image background -->
    <div class="footer-main">
        <div class="container footer-grid">
            <!-- LEFT COLUMN: Logo and main links -->
            <div class="footer-left">
                <div class="footer-logo"><?php display_site_logo();
                                            ?></div>
                <a class="element" href="<?php echo site_url('/about-us') ?>">About Us</a>
                <a class="element" href="<?php echo site_url('/iac') ?>">IAC 2024</a>
                <a class="element" href="<?php echo site_url('/contact-us') ?>">Contact Us</a>
                <div class="footer-credit">
                    Designed and developed by<br>
                    *All space images were taken by Eytan Stibbe during Rakia AX1 Mission.
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



    <!-- Bottom logos section (remains unchanged) -->
    <div class="footer-logos">
        <div class="container">
            <div class="logos-desktop">
                <div class="rakia-section">
                    <div class="rakia-powered">Powered by Rakia</div>
                    <div class="rakia-links">
                        <a href="/privacy">Privacy Policy</a>
                        <a href="/accessibility">Accessibility</a>
                        <a href="/terms">Terms of Use</a>
                    </div>
                </div>
                <div class="logos-grid-desktop">
                    <div class="logo-item">STARTUP NATION CENTRAL</div>
                    <div class="logo-item">Israel High-Tech Association</div>
                    <div class="logo-item">ISRAEL EXPORT INSTITUTE</div>
                    <div class="logo-item">ISA</div>
                    <div class="logo-item">Ministry of Innovation, Science & Technology</div>
                    <div class="logo-item">Israel Innovation Authority</div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>