<?php 
$members_logos = get_field('members_logos');
$first_headline = get_field('first_headline');
$second_headline = get_field('second_headline');
$collaborators_logos = get_field('collaborators_logos');
?>


<div class="members-block" >
    <div class="responsive-container">
        <div class="stars-container"></div>
        <div class="members-block-content">
        <div class="members-icon-space">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/blueLine.svg'); ?>"  />
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/blueStar.svg'); ?>"  />
        </div>
        <h2 class="members-first-title"><?php echo esc_html($first_headline ?: 'OUR MEMBERS'); ?></h2>
        <div class="members-block-logos">
            <?php get_template_part('template-parts/members-block/members-block', null, array('logos' => $members_logos, 'logo_class' => 'member-logo')); ?>
        </div>
        
        <h2 class="collaborators-second-title"><?php echo esc_html($second_headline); ?></h2>
        <div class="collaborators-block">
            <div class="collaborators-block-logos">
                <?php get_template_part('template-parts/members-block/members-block', null, array('logos' => $collaborators_logos, 'logo_class' => 'collaborator-logo')); ?>
            </div>
        </div>
    </div>
    </div>
</div>