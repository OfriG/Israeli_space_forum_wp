<!-- <?php
$headline = get_field('headline');
$description = get_field('description');
$button = get_field('button');
$background_image = get_field('background');
?>
<div class="error-block" <?php if ($background_image && $background_image['url']): ?>
    style="background-image: url('<?php echo esc_url($background_image['url']); ?>');"
    <?php else: ?>style="background-color: $gray; height: pxToRem(50);"<?php endif; ?>>
        <div class="error-block-content">
            <h1><?php echo esc_html($headline); ?></h1>
            <p><?php echo esc_html($description); ?></p>
            <?php get_template_part('template-parts/button', null, ['button' => $button]); ?>
        </div>
</div> -->
<div class="error-block">
    <div class="error-block-content">
        <h1>404</h1>
        <p>Page not found</p>
        <a href="<?php echo home_url(); ?>">Back to home</a>
    </div>
</div>