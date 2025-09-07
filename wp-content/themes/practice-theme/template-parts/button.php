<?php
$button_data = $args['button'] ?? null;

if ($button_data && !empty($button_data['url'])):
    $link_url = $button_data['url'];
    $link_title = $button_data['title'] ?? '';
    $link_target = $button_data['target'] ? $button_data['target'] : '_self';
?>
    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
        <?php echo esc_html($link_title); ?>
    </a>
<?php endif; ?>