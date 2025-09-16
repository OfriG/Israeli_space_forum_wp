<?php

$gallery = $args['gallery'];
?>

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
