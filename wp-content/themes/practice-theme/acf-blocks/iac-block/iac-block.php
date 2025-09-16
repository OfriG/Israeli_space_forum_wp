<?php 
$headline_iac = get_field('headline_iac');
$firstPart_description_iac  = get_field('firstPart_description_iac');
$secondpart_description_iac = get_field('secondpart_description_iac');
$button_iac   = get_field('button_iac');
$logo_iac = get_field('logo_iac');
$backgroundTextMobile= get_field('background_text_mobile');
$backgroundTextDesktop= get_field('background_text_desktop');
?>
<!-- mobile -->

<div class="iac-block">
    <div class="stars-container"></div>
    <div class="iac-block-content">
    <div class="background-text"><?php echo nl2br(esc_html($backgroundTextMobile)); ?></div>

        <div class="icon">
            <?php
            if (!empty($logo_iac)) {
                $logo_iac = is_array($logo_iac) ? $logo_iac['url'] : $logo_iac;
            }
            if (!empty($logo_iac)) : ?>
                <img src="<?php echo esc_url($logo_iac); ?>" alt="Logo" />
            <?php endif; ?>
        </div>
        
        <div class="icon-space">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/blueLine.svg'); ?>" alt="Blue Line" />
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/blueStar.svg'); ?>" alt="Blue Star" />
        </div>

        <div class="section-content">
            <h1><?php echo esc_html($headline_iac); ?></h1>
            <span class="first-part-description"><?php echo esc_html($firstPart_description_iac); ?></span>
            <span id="second-part-description"><?php echo esc_html($secondpart_description_iac); ?></span>   
        </div>
        <?php 
        if ($button_iac && $button_iac['url']):
            $link_url = $button_iac['url'];
            $link_title = $button_iac['title'] ?? '';
            $link_target = $button_iac['target'] ? $button_iac['target'] : '_self';
        ?>
        <a class="joinud-btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
            <?php echo esc_html($link_title); ?>
        </a>
        <?php endif; ?>
    
    </div>
</div>

<!-- desktop -->
<div class="iac-block-desktop-container">
    <div class="stars-container"></div>
    <div class="iac-background-text"><?php echo nl2br(esc_html($backgroundTextDesktop)); ?></div>
    <div class="iac-main-content">
        <div class="iac-three-column-layout">
            <div class="iac-header-section">
                <div class="iac-decorative-icons">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/images/blueLine.svg'); ?>"  />
                <img src="<?php echo esc_url(get_template_directory_uri() . '/images/blueStar.svg'); ?>"  />
                </div>
                <h1><?php echo esc_html($headline_iac); ?></h1>
            </div>
            
            <div class="iac-logo-section">
                <div class="iac-logo-wrapper">
                    <?php
                    // Check and extract logo image URL for desktop
                    $desktop_logo = $logo_iac; // Use original field value
                    if (!empty($desktop_logo)) {
                        $desktop_logo = is_array($desktop_logo) ? $desktop_logo['url'] : $desktop_logo;
                    }
                    // Only show logo if URL exists
                    if (!empty($desktop_logo)) : ?>
                        <img src="<?php echo esc_url($desktop_logo); ?>" alt="Logo" />
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="iac-content-section">
                <div class="iac-text-content">
                    <p><span class="iac-description-primary"><?php echo esc_html($firstPart_description_iac); ?></span><span class="iac-description-secondary"><?php echo esc_html($secondpart_description_iac); ?></span></p>
                    
                    <?php 
                    if ($button_iac && $button_iac['url']):
                        $link_url = $button_iac['url'];
                        $link_title = $button_iac['title'] ?? '';
                        $link_target = $button_iac['target'] ? $button_iac['target'] : '_self';
                    ?>
                    <a class="iac-cta-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <?php echo esc_html($link_title); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>