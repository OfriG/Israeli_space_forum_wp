<?php
$video = $args['video'];
?>
<div class="impact-block-video">
    <?php if($video): ?>
        <?php echo $video; ?>
    <?php else: ?>
        <div class="video-placeholder">
            <div class="icon-play">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/images/play.svg'); ?>" alt="Play video" />
            </div>   
        </div>
    <?php endif; ?>
</div>