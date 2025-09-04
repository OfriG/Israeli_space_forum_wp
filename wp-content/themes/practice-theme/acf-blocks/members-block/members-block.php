<?php 
$members_logos = get_field('members_logos');
$first_headline = get_field('first_headline');
$second_headline = get_field('second_headline');
$background_image = get_field('background_image');
$collaborators_logos = get_field('collaborators_logos');
?>

<?php
if (!empty($background_image)) {
    $background_image = is_array($background_image) ? $background_image['url'] : $background_image;
}
?>

<div class="members-block" style="background-image: url('<?php echo esc_url($background_image); ?>');">
    <div class="members-block-content">
        <div class="members-icon-space">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/home-page/icons/Line 9.svg'); ?>" alt="Line 9" />
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/home-page/icons/Layer_1.svg'); ?>" alt="Layer 1" />
        </div>
        <h2 class="members-first-title"><?php echo esc_html($first_headline ?: 'OUR MEMBERS'); ?></h2>
        <div class="members-block-logos">
            <?php display_logo_grid($members_logos, 'member-logo'); ?>
        </div>
        
        <h2 class="collaborators-second-title"><?php echo esc_html($second_headline ?: 'INTERNATIONAL COLLABORATORS'); ?></h2>
        <div class="collaborators-block">
            <div class="collaborators-block-logos">
                <?php display_logo_grid($collaborators_logos, 'collaborator-logo'); ?>
            </div>
        </div>
    </div>
</div>