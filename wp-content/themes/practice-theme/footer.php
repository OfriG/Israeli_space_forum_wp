    </main>

<footer class="footer">
    <!-- Animated Stars Background -->
    <div class="stars-container"></div>
    
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