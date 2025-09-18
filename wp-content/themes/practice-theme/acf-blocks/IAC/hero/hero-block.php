<?php 
$iac_logo= get_field('iac_logo');
$mobile_headline_hero= get_field('mobile_headline_hero');
$desktop_headline_hero= get_field('desktop_headline_hero');
$first_description_hero= get_field('first_description_hero');
$second_description_hero= get_field('second_description_hero');
$third_description_hero= get_field('third_description_hero');
$button_mobile_hero= get_field('button_mobile_hero');
$button_desktop_hero= get_field('button_desktop_hero');
$background_image_hero= get_field('background_image_hero');
?>
<div class="iac-hero-block" <?php if ($background_image_hero && $background_image_hero['url']): ?>
    style="background-image: url('<?php echo esc_url($background_image_hero['url']); ?>');"
    <?php else: ?>style="background-color: $gray; height: pxToRem(50);"<?php endif; ?>>
    <div class="responsive-container">
        <div class="iac-hero-block-content">
            <img class="iac-hero-block-logo" src="<?php echo esc_url($iac_logo['url']); ?>" alt="<?php echo esc_attr($iac_logo['alt']); ?>">
        <h1 class="iac-hero-block-content-headline-mobile"><?php echo nl2br(esc_html($mobile_headline_hero)); ?></h1>
        <h1 class="iac-hero-block-content-headline-desktop">    <?php echo wp_kses_post($desktop_headline_hero); ?>
        </h1>
      
        <p class="iac-hero-block-content-first-description"><?php echo esc_html($first_description_hero); ?></p>
       <div class="iac-hero-block-second-description-container">
        <p class="iac-hero-block-content-second-description"><?php echo esc_html($second_description_hero); ?></p>
        <p class="iac-hero-block-content-third-description"><?php echo esc_html(" " . $third_description_hero); ?></p>
        </div>
        <?php if ($button_mobile_hero): ?>
            <div class="iac-hero-block-button-container-mobile">
                <?php 
                get_template_part('template-parts/button', null, [
                    'button' => $button_mobile_hero
                ]); 
                ?>
            </div>
        <?php endif; ?>
        <?php if ($button_desktop_hero): ?>
            <div class="iac-hero-block-button-container-desktop">
                <?php 
                get_template_part('template-parts/button', null, [
                    'button' => $button_desktop_hero
                ]); 
                ?>
            </div>
        <?php endif; ?>
        </div>
    </div>
</div>