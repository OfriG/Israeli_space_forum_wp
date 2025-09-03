<?php 
$background_iac = get_field('background_iac');
$headline_iac = get_field('headline_iac');
$firstPart_description_iac  = get_field('firstPart_description_iac');
$secondpart_description_iac = get_field('secondpart_description_iac');
$button_iac   = get_field('button_iac');
$logo_iac = get_field('logo_iac');
$backgroundTextMobile= get_field('background_text_mobile');
$backgroundTextDesktop= get_field('background_text_desktop');
if (!empty($background_iac)) {
    $background_iac = is_array($background_iac) ? $background_iac['url'] : $background_iac;
}
if (!empty($logo_iac)) {
    $logo_iac = is_array($logo_iac) ? $logo_iac['url'] : $logo_iac;
}
?>
<!-- mobile -->
<div class="iac-block" style="background-image: url('<?php echo esc_url($background_iac); ?>');">
    <div class="iac-block-content">
    <div class="background-text"><?php echo nl2br(esc_html($backgroundTextMobile)); ?></div>

        <div class="icon">
            <img src="<?php echo esc_url($logo_iac); ?>" alt="Logo" />
        </div>
        
        <div class="icon-space">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/home-page/icons/Line 9.svg'); ?>" alt="Line 9" />
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/home-page/icons/Layer_1.svg'); ?>" alt="Layer 1" />
        </div>

        <div class="section3-content">
            <h1><?php echo esc_html($headline_iac); ?></h1>
            <span class="first-part-description"><?php echo esc_html($firstPart_description_iac); ?></span>
            <span id="second-part-description"><?php echo esc_html($secondpart_description_iac); ?></span>
    
          
        </div>
        <?php if (!empty($button_iac)) : ?>
            <?php if (is_array($button_iac)) : ?>
                <a class="joinud-btn" href="<?php echo esc_url($button_iac['url']); ?>" target="<?php echo esc_attr($button_iac['target'] ?: '_self'); ?>"><?php echo esc_html($button_iac['title']); ?></a>
            <?php else : ?>
                <a class="joinud-btn" href="#"><?php echo esc_html($button_iac); ?></a>
            <?php endif; ?>
        <?php endif; ?>
    
    </div>
</div>


<!-- desktop -->
<div class="iac-block-desktop" style="background-image: url('<?php echo esc_url($background_iac); ?>');">
    <div class="background-text-desktop"><?php echo nl2br(esc_html($backgroundTextDesktop)); ?></div>
    <div class="iac-block-content-desktop">
        <div class="desktop-layout">
            <div class="left-section">
                <div class="icon-space">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/home-page/icons/Line 9.svg'); ?>" alt="Line 9" />
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/home-page/icons/Layer_1.svg'); ?>" alt="Layer 1" />
                </div>
                <h1><?php echo esc_html($headline_iac); ?></h1>
            </div>
            
            <div class="center-section">
                <div class="logo-container">
                    <img src="<?php echo esc_url($logo_iac); ?>" alt="Logo" />
                </div>
            </div>
            
            <div class="right-section">
                <div class="description-content">
                    <p class="first-part-description-desktop"><?php echo esc_html($firstPart_description_iac); ?></p>
                    <p class="second-part-description-desktop"><?php echo esc_html($secondpart_description_iac); ?></p>
                    
                    <?php if (!empty($button_iac)) : ?>
                        <?php if (is_array($button_iac)) : ?>
                            <a class="joinud-btn-desktop" href="<?php echo esc_url($button_iac['url']); ?>" target="<?php echo esc_attr($button_iac['target'] ?: '_self'); ?>"><?php echo esc_html($button_iac['title']); ?></a>
                        <?php else : ?>
                            <a class="joinud-btn-desktop" href="#"><?php echo esc_html($button_iac); ?></a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>