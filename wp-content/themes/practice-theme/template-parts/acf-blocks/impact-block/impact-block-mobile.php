<?php
$impact_block_headline = $args['headline'];
$impact_block_description = $args['description'];
$button = $args['button'];
$impact_block_background_image = $args['background_image'];
$video = $args['video'];
?>
<div class="impact-block-mobile" <?php if ($impact_block_background_image && $impact_block_background_image['url']): ?>
    style="background-image: url('<?php echo esc_url($impact_block_background_image['url']); ?>');"
    <?php else: ?>style="background-color: $gray; height: pxToRem(50);"<?php endif; ?>>
        <div class="icon-space">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/blueLine.svg'); ?>" alt="Blue line decoration" />
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/blueStar.svg'); ?>" alt="Blue star decoration" />
        </div>    
        <div class="impact-block-content">
            <div class="impact-block-headline"><?php echo (nl2br($impact_block_headline)); ?></div>
            <p class="impact-block-description"><?php echo (nl2br($impact_block_description)); ?></p>
            <div class="impact-block-button">
                <?php 
                get_template_part('template-parts/button', null, [
                    'button' => $button
                ]); 
                ?>
            </div>
            <?php 
            get_template_part('template-parts/video', null, [
                'video' => $video
            ]); 
            ?>
        </div>
</div>
