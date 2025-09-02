<?php
$id = 'hero-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$background_image_field = get_field('background_image');
$headline = get_field('headline');
$description  = get_field('description');
$button   = get_field('button_text');
$highlight_headline = get_field('highlight_headline');

if (!empty($background_image_field)) {
    $background_image_field = is_array($background_image_field) ? $background_image_field['url'] : $background_image_field;
}
?>

<div id="<?php echo esc_attr($id); ?>" class="hero">
    <?php if (!empty($background_image_field)) : ?>
        <div class="hero-background" style="background-image: url('<?php echo esc_url($background_image_field); ?>')"></div>
    <?php endif; ?>


    <div class="shape-future-content">
        <h1>
            <?php echo esc_html($headline); ?>
            <?php if (!empty($highlight_headline)) : ?>
                <br>
                <span class="gradient-text"><?php echo esc_html($highlight_headline); ?></span>
            <?php endif; ?>
        </h1>

        <p ><?php echo esc_html($description); ?></p>

        <?php if (!empty($button)) : ?>
            <a class="joinud-btn" href="#"><?php echo esc_html($button); ?></a>
        <?php endif; ?>
    </div>
</div>