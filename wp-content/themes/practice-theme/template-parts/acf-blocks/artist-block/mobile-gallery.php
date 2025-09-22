<?php

$gallery = $args['gallery'];
$gallery = (is_array($gallery) ? $gallery : array());
?>

<div class="artist-block-gallery mobile-gallery" id="mobile-gallery">
    <?php 
    foreach ($gallery as $item) :
        $first  = $item['first_headline'] ?? '';
        $second = $item['second_headline'] ?? '';
        $desc   = $item['item_description'] ?? '';
        $email  = $item['email'] ?? '';
        $image  = $item['image'] ?? '';
        
        $img_html = '';
        if ($image) {
            if (is_array($image) && !empty($image['url'])) {
                $img_html = '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt'] ?? '') . '" loading="lazy">';
            } elseif (is_numeric($image)) {
                $img_html = wp_get_attachment_image($image, 'large', false, array('loading' => 'lazy'));
            } elseif (filter_var($image, FILTER_VALIDATE_URL)) {
                $img_html = '<img src="' . esc_url($image) . '" alt="" loading="lazy">';
            }
        }
        ?>
        <div class="artist-gallery-item">
            <?php if ($first) : ?><h3 class="artist-name"><?php echo esc_html($first); ?></h3><?php endif; ?>
            <?php if ($second) : ?><h4 class="artwork-title"><?php echo esc_html($second); ?></h4><?php endif; ?>
            <?php if ($img_html) : ?><div class="artist-gallery-image"><?php echo $img_html; ?></div><?php endif; ?>
            <?php if ($desc) : ?><p class="artwork-description"><?php echo nl2br(esc_html($desc)); ?></p><?php endif; ?>
            <?php if ($email) : ?><a href="mailto:<?php echo antispambot($email); ?>" class="artist-email"><?php echo antispambot($email); ?></a><?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
