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
$background_image_url = '';
if (is_array($background_image_field) && isset($background_image_field['url'])) {
    $background_image_url = $background_image_field['url'];
} elseif (is_string($background_image_field)) {
    $background_image_url = $background_image_field;
}

$inline_style = '';
if (!empty($background_image_url)) {
    $inline_style = "style=\"background-image: url('" . esc_url($background_image_url) . "');\"";
}
?>

<div id="<?php echo esc_attr($id); ?>" class="hero" <?php echo $inline_style; ?>>


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