<?php 
$background_image = get_field('background_image');
$headline_team_block = get_field('headline_team_block');
$team_members_images = get_field('team_members_images');
?>
<div class="AU-team-block" <?php if ($background_image && $background_image['url']): ?>
    style="background-image: url('<?php echo esc_url($background_image['url']); ?>');"
    <?php else: ?>style="background-color: $gray; height: pxToRem(50);"<?php endif; ?>>
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
