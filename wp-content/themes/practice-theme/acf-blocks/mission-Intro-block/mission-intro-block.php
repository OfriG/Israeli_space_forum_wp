<?php
$headline_mission_intro = get_field('headline_mission_intro');
$description_mission_intro = get_field('description_mission_intro');
$background_image = get_field('background_image_mission_intro');
?>

<div class="mission-intro-block" <?php if ($background_image && $background_image['url']): ?>
    style="background-image: url('<?php echo esc_url($background_image['url']); ?>');"
    <?php else: ?>style="background-color: $gray; height: pxToRem(50);"<?php endif; ?>>
        <div class="AboutUs-mission-text">
            <h1 class="AboutUs-mission-headline"><?php echo wp_kses_post(nl2br($headline_mission_intro)); ?></h1>
            <p class="AboutUs-mission-description"><?php echo wp_kses_post(nl2br($description_mission_intro)); ?></p>
        </div>
</div>
