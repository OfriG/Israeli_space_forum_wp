<?php
if (!isset($team_members_images)) {
    $team_members_images = $args['team_members_images'];
}
?>

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