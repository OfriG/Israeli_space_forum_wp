<?php
$isf_block_image = get_field('isf_block_image');
$isf_block_title = get_field('isf_block_title');
$isf_block_first_description = get_field('isf_block_first_description');
$isf_block_second_description = get_field('isf_block_second_description');
$isf_block_button = get_field('isf_block_button');
?>

<div class="isf-block">
<?php
if (!empty($isf_block_image)) {
    $isf_block_image = is_array($isf_block_image) ? $isf_block_image['url'] : $isf_block_image;
}
?>
    <div class="img-isf" style="background-image: url('<?php echo esc_url($isf_block_image); ?>');">

</div> 
<h1><?php echo esc_html($isf_block_title); ?></h1>
<div class="isf-block-content">
    <p>
    <?php echo esc_html($isf_block_first_description); ?><br>
    <?php echo esc_html($isf_block_second_description); ?>
 </p>
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