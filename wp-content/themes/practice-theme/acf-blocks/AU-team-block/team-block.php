<?php 
$headline_team_block = get_field('headline_team_block');
$team_members_images = get_field('team_members_images');
?>
        <div class="AU-team-block">
            <div class="stars-container"></div>
    <div class="AU-team-block-content">
        <div class="AU-team-icon-space">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/blueLine.svg'); ?>"  />
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/blueStar.svg'); ?>"  />
        </div>
        <h2 class="AU-team-block-headline"><?php echo esc_html($headline_team_block); ?></h2>
        <div class="AU-team-block-members">
            <?php 
            get_template_part(
                'template-parts/acf-blocks/AU-team-block/team-members', 
                null, 
                array('team_members_images' => $team_members_images)
            ); 
            ?>
        </div>
    </div>
</div>
