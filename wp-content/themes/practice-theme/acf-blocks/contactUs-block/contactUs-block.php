<?php
$headline = get_field('headline');
$first_description_desktop = get_field('first_description_desktop');
$second_description_desktop = get_field('second_description_desktop');
$description_mobile = get_field('description_mobile');
$button = get_field('button');
$background_image = get_field('background_image');
$first_name = get_field('first_name');
$last_name = get_field('last_name');
$email = get_field('email');
$message = get_field('message');
?>
<div class="contactUs-block">
    <div class= "contactUs-block-content" <?php if ($background_image && $background_image['url']): ?>
        style="background-image: url('<?php echo esc_url($background_image['url']); ?>');"
        <?php endif; ?>>
        <div class="contactUs-block-header">
        <div class="header-content">
                <h1><?php echo esc_html($headline); ?></h1>
        </div>
        <div class="mobile-description">
            <?php echo $description_mobile; ?>
        </div>
        <div class="desktop-description"> 
            <?php echo $first_description_desktop; ?>
            <?php echo $second_description_desktop; ?>
        </div>
        </div>
        <?php
        get_template_part('template-parts/contactUs-form', null, [
            'button' => $button,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'message' => $message
        ]);
        ?>
    </div>
</div>