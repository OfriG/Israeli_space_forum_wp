<?php
$gallery = $args['gallery'];
?>

<div class="artist-block-gallery-desktop" data-gallery-count="<?php echo count($gallery); ?>">
    <div class="gallery-navigation-container">
        <div class="gallery-arrow gallery-arrow-left" id="gallery-prev">
            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon-right.svg" alt="Previous">
        </div>
        
        <div class="desktop-gallery-content" id="gallery-container">
            <?php foreach ($gallery as $index => $artist_item): ?>
                <div class="gallery-slide" data-slide="<?php echo $index; ?>" <?php echo $index === 0 ? 'style="display: block;"' : 'style="display: none;"'; ?>>
                    <div class="artist-details-upper">
                        <?php if ($artist_item['first_headline']): ?>
                            <h3 class="artist-name-desktop"><?php echo esc_html($artist_item['first_headline']); ?></h3>
                        <?php endif; ?>
                        
                        <?php if ($artist_item['second_headline']): ?>
                            <h4 class="artwork-title-desktop"><?php echo esc_html($artist_item['second_headline']); ?></h4>
                        <?php endif; ?>
                    </div>
                    
                    <div class="artist-gallery-item-desktop">
                        <img src="<?php echo esc_url($artist_item['image']['url']); ?>" 
                             alt="<?php echo esc_attr($artist_item['image']['alt'] ?? ''); ?>" 
                             loading="lazy">
                    </div>
                    
                    <div class="artist-details-lower">
                        <?php if ($artist_item['description']): ?>
                            <p class="artwork-description-desktop"><?php echo nl2br(esc_html($artist_item['description'])); ?></p>
                        <?php endif; ?>
                        
                        <?php if ($artist_item['email']): ?>
                            <a href="mailto:<?php echo esc_attr($artist_item['email']); ?>" class="artist-email-desktop">
                                <?php echo esc_html($artist_item['email']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="gallery-arrow gallery-arrow-right" id="gallery-next">
            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon-left.svg" alt="Next">
        </div>
    </div>
</div>
