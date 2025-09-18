<?php 
$banner_images = get_field('banner_images');
?>
<div class="aboutUs-banner-logos">
    <div class="responsive-container">
        <div class="banner_images">
            <?php get_template_part('template-parts/members-block/members-block', null, array('logos' => $banner_images, 'logo_class' => 'banner_images')); ?>
        </div>
    </div>
</div>