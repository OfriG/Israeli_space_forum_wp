    </main>

<footer class="footer">
    <!-- Animated Stars Background -->
    <div class="stars-container"></div>
    
    <div class="responsive-container">
        <!-- Mobile Footer (hidden on desktop) -->
        <div class="mobile-footer">
            <?php
            get_template_part('template-parts/footer/upFooter');
            get_template_part('template-parts/footer/bottomFooter');
            ?>
        </div>

        <!-- Desktop Footer Upper Section (hidden on mobile) -->
        <div class="desktop-footer">
            <?php
            get_template_part('template-parts/footer/desktopFooterUpper');
            ?>
        </div>
    </div>
    
    <!-- Desktop Footer Lower Section - Full Width -->
    <div class="desktop-footer-lower-wrapper">
        <?php
        get_template_part('template-parts/footer/desktopFooterLower');
        ?>
     
    </div>

</footer>

<?php get_template_part('template-parts/global-contact-popup'); ?>

<?php wp_footer(); ?>
</body>
</html>