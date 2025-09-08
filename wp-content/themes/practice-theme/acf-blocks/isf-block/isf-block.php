<?php
$isf_block_image = get_field('isf_block_image');
$isf_img_title = get_field('isf_img_title');
$isf_block_first_description = get_field('isf_block_first_description');
$isf_block_second_description = get_field('isf_block_second_description');
$isf_block_button = get_field('isf_block_button');
?>
<div class="isf-block">
    <div class="isf-block-image">
    <?php if ($isf_block_image && $isf_block_image['url']): ?>
    <div class="img-isf" style="background-image: url('<?php echo esc_url($isf_block_image['url']); ?>');"></div>
<?php else: ?>
    <div class="img-isf" style="background-color: $gray;"></div>
<?php endif; ?>
        <?php if ($isf_img_title && $isf_img_title['url']): ?>
            <img class="img-title" src="<?php echo esc_url($isf_img_title['url']); ?>" alt="<?php echo esc_attr($isf_img_title['alt'] ?? ''); ?>" />
        <?php else: ?>
            <div class="img-title" style="background-color: $gray; height: pxToRem(50);"></div>
        <?php endif; ?>
    </div> 

    <div class="isf-block-content">
        <?php if ($isf_img_title && $isf_img_title['url']): ?>
            <img class="img-title" src="<?php echo esc_url($isf_img_title['url']); ?>" alt="<?php echo esc_attr($isf_img_title['alt'] ?? ''); ?>" />
        <?php else: ?>
            <div class="img-title" style="background-color: $gray; height: pxToRem(50);"></div>
        <?php endif; ?>
        <br class="desktop-only-br">        <br class="desktop-only-br">

        <span class="isf-block-first-description">
            <?php echo esc_html($isf_block_first_description); ?>
        </span>
        <br class="mobile-only-br">        <br class="mobile-only-br">
        <span class="isf-block-second-description">
            <?php echo esc_html($isf_block_second_description); ?>
        </span>
        
        <?php get_template_part('template-parts/button', null, ['button' => $isf_block_button]); ?>
    </div>
</div>
