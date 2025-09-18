<?php 
$gallery = get_field('gallery');
$headline = get_field('headline');
?>
<div class="companies-block">
        <div class="stars-container"></div>
      
        <div class="companies-block-content">
        <div class="responsive-container">
        <div class="icon-space">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/blueLine.svg'); ?>"  />
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/blueStar.svg'); ?>"  />
        </div>
        <h1 class="companies-block-headline"><?php echo esc_html($headline); ?></h1>
        <div class="companies-block-logos">
                    <?php get_template_part('template-parts/members-block/members-block', null, array('logos' => $gallery, 'logo_class' => 'company-logo')); ?>
        </div>
        </div>
        </div>
    </div>
</div>