<?php 
$headline = get_field('headline');
$description = get_field('description');
$button = get_field('button');
$background_image = get_field('background_image');
?>
<div class="AboutUs-hero" <?php if ($background_image && $background_image['url']): ?>
    style="background-image: url('<?php echo esc_url($background_image['url']); ?>');"
    <?php else: ?>style="background-color: $gray; height: pxToRem(50);"<?php endif; ?>>
    <div class="AboutUs-hero-content">
        <h1><?php echo nl2br(esc_html($headline)); ?></h1>
        <p><?php echo nl2br(esc_html($description)); ?></p>

       <div class="button"><?php get_template_part('template-parts/button', null, ['button' => $button]); ?></div>
    </div>
</div>