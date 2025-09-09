<?php
$headline_mission_intro = get_field('headline_mission_intro');
$description_mission_intro = get_field('description_mission_intro');

?>

<div class="mission-intro-block">
        <div class="AboutUs-mission-text">
            <h1 class="AboutUs-mission-headline"><?php echo wp_kses_post(nl2br($headline_mission_intro)); ?></h1>
            <p class="AboutUs-mission-description"><?php echo wp_kses_post(nl2br($description_mission_intro)); ?></p>
        </div>
</div>
