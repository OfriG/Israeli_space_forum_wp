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
            <div class="AU-team-block-members-logos">       
                <?php if ($team_members_images): ?>
                    <?php foreach ($team_members_images as $image): ?>
                        <div class="AU-team-block-member-logo">
                            <div class="member-image-container">
                                <img src="<?php echo esc_url($image['url']); ?>" 
                                     loading="lazy"
                                     alt="<?php echo esc_attr($image['alt'] ?? ''); ?>">
                                <div class="linkedin-icon">
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/LinkedIn.svg'); ?>" 
                                         alt="LinkedIn" />
                                </div>
                            </div>
                            <?php if (!empty($image['caption'])): ?>
                                <div class="member-caption">
                                    <?php echo wp_kses_post($image['caption']); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($image['description'])): ?>
                                <div class="member-description">
                                    <?php echo wp_kses_post($image['description']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
