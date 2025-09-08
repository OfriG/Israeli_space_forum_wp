<?php 
$headline = get_field('headline');
$description = get_field('description');
$button = get_field('button');
$background_image = get_field('background_image');
?>
<?php
if (!empty($background_image)) {
    $background_image = is_array($background_image) ? $background_image['url'] : $background_image;
}
?>
<div class="AboutUs-hero" style="background-image: url('<?php echo esc_url($background_image); ?>');">
    <div class="AboutUs-hero-content">
        <h1><?php echo nl2br(esc_html($headline)); ?></h1>
        <p><?php echo nl2br(esc_html($description)); ?></p>

       <div class="button"><?php get_template_part('template-parts/button', null, ['button' => $button]); ?></div>
    </div>
</div>