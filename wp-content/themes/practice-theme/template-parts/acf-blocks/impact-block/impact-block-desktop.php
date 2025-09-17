<?php
$impact_block_headline = $args['headline'];
$impact_block_description = $args['description'];
$button = $args['button'];
$video = $args['video'];
?>

<div class="impact-block-desktop">
    <div class="stars-container"></div>
        <div class="icon-space">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/blueLine.svg'); ?>" alt="Blue line decoration" />
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/blueStar.svg'); ?>" alt="Blue star decoration" />
        </div>  
        <div class="impact-block-content">
            <div class="impact-block-content-left">
                <div class="impact-block-headline"><?php echo (nl2br($impact_block_headline)); ?></div>
                <div class="impact-block-button">
                    <?php 
                    get_template_part('template-parts/button', null, [
                        'button' => $button
                    ]); 
                    ?>
                </div>
            </div>
            <div class="impact-block-content-right">
                <p class="impact-block-description"><?php echo (nl2br($impact_block_description)); ?></p>
            </div>
        </div>
        <?php 
        get_template_part('template-parts/video', null, [
            'video' => $video
        ]); 
        ?>
</div>
