<!-- Mobile upper footer -->
<div class="mobile-section">
    <div class="logo-powered">
        <?php display_site_logo(); ?>
        <div class="powered-by">
            <p>Powered by</p>
            <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/RAKIA.png')); ?>" alt="RAKIA Logo" />
        </div>
    </div>

    <div class="newsletter-container">
        <h2 class="follow-news">
            <?php
            $title = get_field('newsletter_title', 17);
            if ($title) {
                echo str_replace('FOLLOW OUR NEWSLETTER', 'FOLLOW OUR<br>NEWSLETTER', $title);
            } else {
                echo 'Follow our<br>website';
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
        <form class="newsletter-form-mobile" method="post" action="">
            <?php wp_nonce_field('newsletter_subscribe', 'newsletter_nonce'); ?>
            <input type="email" name="subscriber_email" placeholder="Email" class="email-input" required />

            <div class="newsletter-actions">
                <button type="submit" class="subscribe-btn">Subscribe</button>
                <a href="#" class="linkedin-link">
                    <span class="linkedin-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/LinkedIn.svg" alt="LinkedIn" />
                    </span>
                </a>
            </div>
        </form>

    </div>
    <div class="line"></div>
</div>