<?php
$button = $args['button'];
$first_name = $args['first_name'];
$last_name = $args['last_name'];
$email = $args['email'];
$message = $args['message'];
?>

<div class="contactUs-block-form">
    <div class="close-x" id="close-x" aria-label="Close contact form">×</div>
    <form id="contactUs-form" class="contact-form contactUs-ajax-form" method="post">
        <?php wp_nonce_field('contactUs_nonce', 'contactUs_nonce'); ?>
        
        <div class="form-row">
            <div class="input-wrapper">
                <input type="text" name="first_name" placeholder="<?php echo esc_attr($first_name); ?>" class="form-field" required>
                <span class="required-asterisk">*</span>
            </div>
        </div>
        
        <div class="form-row">
            <div class="input-wrapper">
                <input type="text" name="last_name" placeholder="<?php echo esc_attr($last_name); ?>" class="form-field" required>
                <span class="required-asterisk">*</span>
            </div>
        </div>
        
        <div class="form-row">
            <div class="input-wrapper">
                <input type="email" name="email" placeholder="<?php echo esc_attr($email); ?>" class="form-field" required>
                <span class="required-asterisk">*</span>
            </div>
        </div>
        
        <div class="form-row">
            <div class="input-wrapper">
                <textarea name="message" placeholder="<?php echo esc_attr($message); ?>" class="form-field form-textarea" rows="5" required></textarea>
                <span class="required-asterisk">*</span>
            </div>
        </div>
        
        <div class="form-row">
                <button type="submit" class="submit-button"><?php echo esc_html($button['title']); ?></button>
        </div>
    </form>
</div>