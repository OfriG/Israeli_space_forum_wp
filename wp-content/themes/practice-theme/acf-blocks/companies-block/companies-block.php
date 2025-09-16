<?php 
$background_image = get_field('background_image');
$gallery = get_field('gallery');
$headline = get_field('headline');
?>
<div class="companies-block" <?php if ($background_image && $background_image['url']): ?>
    style="background-image: url('<?php echo esc_url($background_image['url']); ?>');"
    <?php else: ?>style="background-color: $gray; height: pxToRem(50);"<?php endif; ?>>
        <div class="companies-block-content">
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