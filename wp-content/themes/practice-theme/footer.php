<footer id="colophon" class="site-footer">
    <!-- Main footer section with starry background -->
    <div class="footer-main">
        <div class="container footer-grid">

            <!-- LEFT COLUMN: Logo and main links -->
            <div class="footer-left">
                <div class="footer-logo">ISRAEL SPACE FORUM</div>
                <a href="<?php echo site_url('/about-us') ?>">About Us</a>
                <a href="<?php echo site_url('/iac') ?>">IAC 2024</a>
                <a href="<?php echo site_url('/contact-us') ?>">Contact Us</a>
                <div class="footer-credit">
                    Designed and developed by moveo<br>
                    *All space images were taken by Eytan Stibbe during Rakia AX1 Mission.
                </div>
            </div>

            <!-- RIGHT COLUMN: Newsletter subscription -->
            <div class="footer-right">
                <h2><?php the_title() ?></h2>
                <p>Subscribe to the ISF newsletter to receive the latest announcements, opportunities, event invitations and more.</p>
                <div class="newsletter-form">
                    <input type="email" placeholder="Email" class="email-input">
                    <button class="subscribe-btn">Subscribe</button>
                    <a href="#" class="linkedin-link">
                        <span class="linkedin-icon">in</span>
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
