<?php
$gallery = $args['gallery'];
$gallery = (is_array($gallery) ? $gallery : array());
?>

<div class="artist-block-gallery-desktop">
    <div class="gallery-navigation-container">
        <div class="gallery-arrow gallery-arrow-left" id="artist-prev">
            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon-right.svg" alt="Previous Artist">
        </div>

        <div class="desktop-gallery-content" id="gallery-container">
            <?php 
            foreach ($gallery as $index => $item) :
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

                $style = ($index === 0) ? 'style="display:block;"' : 'style="display:none;"';
                ?>
                <div class="gallery-slide" data-slide="<?php echo intval($index); ?>" <?php echo $style; ?>>
                    <div class="artist-details-upper">
                        <?php if ($first) : ?><h3 class="artist-name-desktop"><?php echo esc_html($first); ?></h3><?php endif; ?>
                        <?php if ($second) : ?><h4 class="artwork-title-desktop"><?php echo esc_html($second); ?></h4><?php endif; ?>
                    </div>

                    <div class="artist-gallery-item-desktop">
                        <?php echo $img_html; ?>
                    </div>

                    <div class="artist-details-lower">
                        <?php if ($desc) : ?><p class="artwork-description-desktop"><?php echo nl2br(esc_html($desc)); ?></p><?php endif; ?>
                        <?php if ($email) : ?><a href="mailto:<?php echo esc_attr($email); ?>" class="artist-email-desktop"><?php echo esc_html($email); ?></a><?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="gallery-arrow gallery-arrow-right" id="artist-next">
            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon-left.svg" alt="Next Artist">
        </div>
    </div>
</div>
