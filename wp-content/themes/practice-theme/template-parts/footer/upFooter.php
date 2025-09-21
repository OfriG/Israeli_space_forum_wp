<!-- Mobile upper footer -->
<div class="mobile-bottom-section">
    <div class="logo-powered">
        <?php display_site_logo(); ?>
        <div class="powered-by">
            <p>Powered by</p>
            <img src="<?php echo esc_url(get_theme_file_uri('images/footer-icons/RAKIA.png')); ?>" alt="RAKIA Logo" />
        </div>
    </div>

    <div class="newsletter-container">

        <?php get_template_part('template-parts/footer/newsLetterFooter', null, ['form_id' => 'newsletter-mobile']); ?>
    </div>
    <div class="line"></div>
</div>