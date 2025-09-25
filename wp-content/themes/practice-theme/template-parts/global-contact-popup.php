<?php
$contact_data = null;
$pages = get_pages();
foreach ($pages as $page) {
    $blocks = parse_blocks($page->post_content);
    foreach ($blocks as $block) {
        if ($block['blockName'] === 'acf/contactus-block' && !empty($block['attrs']['data'])) {
            $contact_data = $block['attrs']['data'];
            break 2;
        }
    }
}

if ($contact_data) {
    $headline = $contact_data['headline'];
    $first_description_desktop = $contact_data['first_description_desktop'];
    $second_description_desktop = $contact_data['second_description_desktop'];
    $description_mobile = $contact_data['description_mobile'];
    $button = $contact_data['button'];
    $first_name = $contact_data['first_name'];
    $last_name = $contact_data['last_name'];
    $email = $contact_data['email'];
    $message = $contact_data['message'];
    ?>
    
    <div id="global-contact-popup" class="contactUs-block-container" style="display: none;">
        <div class="contactUs-block">
            <div class="contactUs-block-content">
                <div class="stars-container"></div>
                <div class="contactUs-block-header">
                    <div class="header-content">
                        <div class="close-x" id="close-x" aria-label="Close contact form">×</div>
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
    <?php
}
?>
