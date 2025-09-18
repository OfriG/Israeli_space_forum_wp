<?php 
$headline_image_mobile = get_field('headline_image_mobile');
$headline_image_desktop = get_field('headline_image_desktop');
$description = get_field('description');
$gallery = get_field('gallery'); 
?>
<div class="artist-block">
    <div class="responsive-container">
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
        
        <?php 
        if ($gallery) {
            get_template_part('template-parts/acf-blocks/artist-block/mobile-gallery', null, array('gallery' => $gallery));
            get_template_part('template-parts/acf-blocks/artist-block/desktop-gallery', null, array('gallery' => $gallery));
        }
        ?>
            <div class="artist-block-dotes mobile-dots">
                <img src="<?php echo get_template_directory_uri(); ?>/images/dotes.svg" alt="dotes">
            </div>
        </div>
    </div>
    </div>
</div>

<?php 
wp_enqueue_script('gallery-script', get_template_directory_uri() . '/acf-blocks/artist-block/gallery-script.js', array(), '1.0.0', true);
?>