<?php



// Create id attribute for block
$id = 'homepage-hero-' . $block['id'];

// Create class attribute allowing for custom "className"
$className = 'homepage-hero';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
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

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> homepage-hero-block">
    <?php if (!empty($background_image_field)) : ?>
        <div class="hero-background" style="background-image: url('<?php echo esc_url($background_image_field); ?>')"></div>
    <?php endif; ?>


    <div class="content-wrapper">
        <h1>
            <?php echo esc_html($headline); ?>
            <?php if (!empty($highlight_headline)) : ?>
                <br>
                <span class="gradient-text"><?php echo esc_html($highlight_headline); ?></span>
            <?php endif; ?>
        </h1>

        <p ><?php echo esc_html($description); ?></p>

        <?php if (!empty($button)) : ?>
            <?php if (is_array($button)) : ?>
                <a class="joinud-btn" href="<?php echo esc_url($button['url']); ?>" target="<?php echo esc_attr($button['target'] ?: '_self'); ?>"><?php echo esc_html($button['title']); ?></a>
            <?php else : ?>
                <a class="joinud-btn" href="#"><?php echo esc_html($button); ?></a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>