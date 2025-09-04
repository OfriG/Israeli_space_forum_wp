<?php
$isf_block_image = get_field('isf_block_image');
$isf_img_title = get_field('isf_img_title');
$isf_block_first_description = get_field('isf_block_first_description');
$isf_block_second_description = get_field('isf_block_second_description');
$isf_block_button = get_field('isf_block_button');
?>
<div class="isf-block">
    <div class="isf-block-image">
        <?php
        if (!empty($isf_block_image)) {
            $isf_block_image = is_array($isf_block_image) ? $isf_block_image['url'] : $isf_block_image;
        }
        ?>
        <div class="img-isf" style="background-image: url('<?php echo esc_url($isf_block_image); ?>');"></div>
        
        <?php if (!empty($isf_img_title)): ?>
            <?php
            $isf_img_title = is_array($isf_img_title) ? $isf_img_title['url'] : $isf_img_title;
            ?>
            <img class="img-title" src="<?php echo esc_url($isf_img_title); ?>"  />
        <?php endif; ?>
    </div> 

    <div class="isf-block-content">
    <?php if (!empty($isf_img_title)): ?>
            <?php
            $isf_img_title = is_array($isf_img_title) ? $isf_img_title['url'] : $isf_img_title;
            ?>
            <img class="img-title" src="<?php echo esc_url($isf_img_title); ?>"  />
        <?php endif; ?>
        <br class="desktop-only-br">        <br class="desktop-only-br">

        <span class="isf-block-first-description">
            <?php echo esc_html($isf_block_first_description); ?>
        </span>
        <br class="mobile-only-br">        <br class="mobile-only-br">
        <span class="isf-block-second-description">
            <?php echo esc_html($isf_block_second_description); ?>
        </span>
        
        <?php 
        if ($isf_block_button && $isf_block_button['url']):
            $link_url = $isf_block_button['url'];
            $link_title = $isf_block_button['title'] ?? '';
            $link_target = $isf_block_button['target'] ? $isf_block_button['target'] : '_self';
        ?>
            <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                <?php echo esc_html($link_title); ?>
            </a>
        <?php endif; ?>
    </div>
</div>
