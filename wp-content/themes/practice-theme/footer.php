<footer class="footer" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/footerMobileBackground.png'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <!-- Mobile Footer (hidden on desktop) -->
    <div class="mobile-footer">
        <?php
            get_template_part('part-code/Footer/upFooter');
            get_template_part('part-code/Footer/bottomFooter');
        ?>
    </div>
    
    <!-- Desktop Footer (hidden on mobile) -->
    <div class="desktop-footer">
        <?php
            get_template_part('part-code/footer/desktop');
        ?>
    </div>
</footer>
<?php wp_footer(); ?>
