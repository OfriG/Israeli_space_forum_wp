<?php
function display_logo_grid($logos, $logo_class) {
    if ($logos): ?>
        <?php foreach ($logos as $image): ?>
            <div class="<?php echo esc_attr($logo_class); ?>">
                <img src="<?php echo esc_url($image['url']); ?>" 
                     loading="lazy">
            </div>
        <?php endforeach; ?>
    <?php endif;
}
?>