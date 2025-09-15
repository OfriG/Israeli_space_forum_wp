
<?php
get_header();
?>
<?php
$headline = get_field('headline', 'option');
$headline_image = get_field('headline_image', 'option');
$description = get_field('description', 'option');
$button = get_field('button', 'option');
$background_image = get_field('background', 'option');
?>

<div class="error-block" <?php if ($background_image && $background_image['url']): ?>
    style="background-image: url('<?php echo esc_url($background_image['url']); ?>');"
    <?php endif; ?>>
    <div class="error-block-content">
            <div class="headline-image">
                <img src="<?php echo esc_url($headline_image['url']); ?>" />
            </div>
            <div class="description">
            <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="button">
            <?php get_template_part('template-parts/button', null, ['button' => $button]); ?>
            </div>
    </div>
</div>