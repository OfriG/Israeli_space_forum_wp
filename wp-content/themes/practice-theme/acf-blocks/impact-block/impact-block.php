<?php 
$impact_block_headline= get_field('headline');
$impact_block_description= get_field('description');
$impact_block_button= get_field('button');
$impact_block_background_image= get_field('background_image');
$video= get_field('video');
?>

<div class="impact-block" <?php if ($impact_block_background_image && $impact_block_background_image['url']): ?>
    style="background-image: url('<?php echo esc_url($impact_block_background_image['url']); ?>');"
    <?php else: ?>style="background-color: $gray; height: pxToRem(50);"<?php endif; ?>>
    <div class="impact-block-content">
    <div class="icon-space">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/blueLine.svg'); ?>"  />
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/blueStar.svg'); ?>"  />
        </div>
        <h2 class="impact-block-headline"><?php echo esc_html($impact_block_headline); ?></h2>
        <p class="impact-block-description"><?php echo esc_html($impact_block_description); ?></p>
        <div class="impact-block-button">
            <?php 
            get_template_part('template-parts/button', null, [
                'button' => $impact_block_button
            ]); 
            ?>
        </div>
    </div>
</div>