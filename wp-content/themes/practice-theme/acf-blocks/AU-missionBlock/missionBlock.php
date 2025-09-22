<?php
$mission_block_headline = get_field('mission_block_headline');
$mission_block_description = get_field('mission_block_description');
$mission_block_gallery = get_field('mission_block_gallery');
?>

<div class="AboutUs-mission" >
    <div class="responsive-container">
        <div class="stars-container"></div>
        <div class="mission-content">
        <div class="icon-space">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/blueLine.svg'); ?>"  />
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/blueStar.svg'); ?>"  />
        </div>
        <div class="AboutUs-mission-text">
            <h1 class="AboutUs-mission-headline"><?php echo esc_html(nl2br($mission_block_headline)); ?></h1>
            <p class="AboutUs-mission-description"><?php echo esc_html(nl2br($mission_block_description)); ?></p>
            </div>
            <div class="AboutUs-mission-gallery">
                <?php get_template_part('template-parts/members-block/members-block', null, array('logos' => $mission_block_gallery, 'logo_class' => 'mission-gallery-logo')); ?>
            </div>
        </div>
    </div>
    </div>
</div>