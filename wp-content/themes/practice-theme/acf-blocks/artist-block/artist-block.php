<?php 
$headline_image = get_field('headline_image');
$description = get_field('description');
$gallery = get_field('gallery'); 
?>
<div class="artist-block">
    <div class="artist-block-content">
        <div class="artist-block-text">
        <div class="artist-block-content-headline">
            <img src="<?php echo $headline_image['url']; ?>" alt="<?php echo $headline_image['alt']; ?>">
        </div>
        <div class="artist-block-content-description">
            <p><?php echo nl2br($description); ?></p>
        </div>  
        </div>
        <!-- mobile gallery -->
            <?php if ($gallery): ?>
                <div class="artist-block-gallery">
                    <?php foreach ($gallery as $artist_item): ?>
                        <div class="artist-gallery-item">
                                <?php if ($artist_item['first_headline']): ?>
                                    <h3 class="artist-name"><?php echo esc_html($artist_item['first_headline']); ?></h3>
                                <?php endif; ?>
                                
                                <?php if ($artist_item['second_headline']): ?>
                                    <h4 class="artwork-title"><?php echo esc_html($artist_item['second_headline']); ?></h4>
                                <?php endif; ?>
                                <div class="artist-gallery-image">
                                <img src="<?php echo esc_url($artist_item['image']['url']); ?>" 
                                     alt="<?php echo esc_attr($artist_item['image']['alt'] ?? ''); ?>" 
                                     loading="lazy">
                            </div>
                                <?php if ($artist_item['description']): ?>
                                    <p class="artwork-description"><?php echo nl2br(esc_html($artist_item['description'])); ?></p>
                                <?php endif; ?>
                                
                                <?php if ($artist_item['email']): ?>
                                    <a href="mailto:<?php echo esc_attr($artist_item['email']); ?>" class="artist-email">
                                        <?php echo esc_html($artist_item['email']); ?>
                                    </a>
                                <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <!-- desktop gallery -->
        <div class="artist-block-gallery-desktop">
            <?php if ($gallery && count($gallery) > 0): 
                $first_artist_item = $gallery[0]; // Get only the first item
            ?>
                <div class="gallery-navigation-container">
                    <div class="gallery-arrow gallery-arrow-left">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon-left.svg" alt="Previous">
                    </div>
                    
                    <div class="artist-gallery-item-desktop">
                        <img src="<?php echo esc_url($first_artist_item['image']['url']); ?>" 
                             alt="<?php echo esc_attr($first_artist_item['image']['alt'] ?? ''); ?>" 
                             loading="lazy">
                    </div>
                    
                    <div class="gallery-arrow gallery-arrow-right">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon-right.svg" alt="Next">
                    </div>
                </div>
            <?php endif; ?>
        </div>
            <div class="artist-block-dotes">
                <img src="<?php echo get_template_directory_uri(); ?>/images/dotes.svg" alt="dotes">
            </div>
        </div>
    </div>
</div>