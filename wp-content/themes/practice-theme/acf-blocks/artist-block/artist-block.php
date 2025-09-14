<?php 
$headline_image_mobile = get_field('headline_image_mobile');
$headline_image_desktop = get_field('headline_image_desktop');
$description = get_field('description');
$gallery = get_field('gallery'); 
?>
<div class="artist-block">
    <div class="artist-block-content">
        <div class="artist-block-text">
        <div class="artist-block-content-headline">
            <img class="headline-mobile" src="<?php echo $headline_image_mobile['url']; ?>" alt="<?php echo $headline_image_mobile['alt']; ?>">
            <img class="headline-desktop" src="<?php echo $headline_image_desktop['url']; ?>" alt="<?php echo $headline_image_desktop['alt']; ?>">
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
        <div class="artist-block-gallery-desktop" data-gallery-count="<?php echo count($gallery); ?>">
            <?php if ($gallery && count($gallery) > 0): ?>
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
            <?php endif; ?>
        </div>
            <div class="artist-block-dotes">
                <img src="<?php echo get_template_directory_uri(); ?>/images/dotes.svg" alt="dotes">
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const galleryContainer = document.getElementById('gallery-container');
    const prevButton = document.getElementById('gallery-prev');
    const nextButton = document.getElementById('gallery-next');
    const galleryDesktop = document.querySelector('.artist-block-gallery-desktop');
    
    if (!galleryContainer || !prevButton || !nextButton || !galleryDesktop) {
        return; 
    }
    
    const slides = galleryContainer.querySelectorAll('.gallery-slide');
    const totalSlides = slides.length;
    let currentSlide = 0;
    
    if (totalSlides <= 1) {
        prevButton.style.display = 'none';
        nextButton.style.display = 'none';
        return;
    }
    
    function showSlide(index) {
        slides.forEach(slide => slide.style.display = 'none');
        
        if (slides[index]) {
            slides[index].style.display = 'block';
        }
    }
    
    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }
    
    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
    }
    
    nextButton.addEventListener('click', nextSlide);
    prevButton.addEventListener('click', prevSlide);
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            prevSlide();
        } else if (e.key === 'ArrowRight') {
            nextSlide();
        }
    });
});
</script>