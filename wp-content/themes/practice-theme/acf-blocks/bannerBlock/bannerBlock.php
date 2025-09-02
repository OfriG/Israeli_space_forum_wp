<?php


$headline_one = get_field('headline_one');
$headline_two = get_field('headline_two');
$headline_three = get_field('headline_three');
$description_one  = get_field('description_one');
$description_two  = get_field('description_two');
$description_three  = get_field('description_three');
$description_four  = get_field('description_four');

?>
<!-- mobile -->
<div class="bannerBlock">
    <div class="items">
        <div class="item1">
            <div class="headline-content">
                <div class="text-content">
                    <h1><?php if ($headline_one) echo esc_html($headline_one); ?></h1>
                    <p>
                        <?php if ($description_one) echo esc_html($description_one); ?>
                    </p>
                </div>
                <img class="desktop-line" src="<?php echo get_template_directory_uri(); ?>/images/home-page/icons/Line 15.svg" alt="Line 15" />
            </div>

            <img class="line-mobile" src="<?php echo get_template_directory_uri(); ?>/images/home-page/icons/Line 15.svg" alt="Line 15" />
            <div class="item4 desktop-only">
                <p><?php if ($description_four) echo esc_html($description_four); ?></p>
            </div>
        </div>

        <div class="item2">
            <div class="headline-content">
                <div class="text-content">
                    <h1><?php if ($headline_two) echo esc_html($headline_two); ?></h1>
                    <p>
                        <?php if ($description_two) echo esc_html($description_two); ?>
                    </p>
                </div>
                <img class="desktop-line" src="<?php echo get_template_directory_uri(); ?>/images/home-page/icons/Line 15.svg" alt="Line 15" />
            </div>
            <img class="line-mobile" src="<?php echo get_template_directory_uri(); ?>/images/home-page/icons/Line 15.svg" alt="Line 15" />
        </div>
        <div class="item3">
            <div class="headline-content">
                <div class="text-content">
                    <h1><?php if ($headline_three) echo esc_html($headline_three); ?></h1>
                    <p>
                        <?php if ($description_three) echo esc_html($description_three); ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="item4 mobile-only">
            <p><?php if ($description_four) echo esc_html($description_four); ?></p>
        </div>
    </div>
</div>
