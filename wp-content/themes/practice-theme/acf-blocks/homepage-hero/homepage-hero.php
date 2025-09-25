<?php



// Create id attribute for block
$id = 'homepage-hero-' . $block['id'];

// Create class attribute allowing for custom "className"
$className = 'homepage-hero';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
$headline = get_field('headline');
$description  = get_field('description');
$button   = get_field('button_text');
$highlight_headline = get_field('highlight_headline');
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> homepage-hero-block">
    <div class="stars-container"></div>
    
<div class="responsive-container">
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
            </div>
        <?php endif; ?>
    </div>
    </div>
</div>