<?php
$headline = $contact_data['headline'] ?? '';
$first_description_desktop = $contact_data['first_description_desktop'] ?? '';
$second_description_desktop = $contact_data['second_description_desktop'] ?? '';
$description_mobile = $contact_data['description_mobile'] ?? '';
$button = $contact_data['button'] ?? '';
$first_name = $contact_data['first_name'] ?? '';
$last_name = $contact_data['last_name'] ?? '';
$email = $contact_data['email'] ?? '';
$message = $contact_data['message'] ?? '';
?>

<div id="contactUs-block-container" class="contactUs-block-container">
    <div class="contactUs-block">
        <div class="contactUs-block-content">
            <div class="stars-container"></div>
            <div class="contactUs-block-header">
                <div class="header-content">
                    <h1><?php echo esc_html($headline); ?></h1>
                </div>
                <div class="mobile-description">
                    <p><?php echo wp_kses_post($description_mobile); ?></p>
                </div>
                <div class="desktop-description"> 
                    <?php echo wp_kses_post($first_description_desktop); ?>
                    <?php echo wp_kses_post($second_description_desktop); ?>
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
</div>
