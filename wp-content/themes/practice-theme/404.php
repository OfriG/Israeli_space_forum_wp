
<?php
get_header();
?>
<?php
$headline_image = get_field('headline_image', 'option');
$description = get_field('description', 'option');
$button = get_field('button', 'option');?>

<div class="error-block">
    <div class="stars-container"></div>
    <div class="error-block-content">
            <?php if ($headline_image && isset($headline_image['url']) && $headline_image['url']): ?>
            <div class="headline-image">
                <img src="<?php echo esc_url($headline_image['url']); ?>" alt="<?php echo esc_attr($headline_image['alt'] ?? ''); ?>" />
            </div>
            <?php endif; ?>
            <?php if ($description): ?>
            <div class="description">
                <p><?php echo esc_html($description); ?></p>
            </div>
            <?php endif; ?>
            <?php if ($button): ?>
            <div class="button">
                <?php get_template_part('template-parts/button', null, ['button' => $button]); ?>
            </div>
            <?php endif; ?>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
