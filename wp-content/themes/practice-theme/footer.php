    </main>

<footer class="footer" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/footerMobileBackground.png'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <!-- Mobile Footer (hidden on desktop) -->
    <div class="mobile-footer">
        <?php
        get_template_part('template-parts/footer/upFooter');
        get_template_part('template-parts/footer/bottomFooter');
        ?>
    </div>

    <!-- Desktop Footer (hidden on mobile) -->
    <div class="desktop-footer">
        <?php
        get_template_part('template-parts/footer/desktopFooter');
        ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>