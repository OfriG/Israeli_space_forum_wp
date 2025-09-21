<?php


// take care of the request
add_action('wp_ajax_practice_newsletter', 'handle_newsletter_signup');
add_action('wp_ajax_nopriv_practice_newsletter', 'handle_newsletter_signup');

function handle_newsletter_signup()
{
    // security check
    if (!wp_verify_nonce($_POST['nonce'], 'newsletter_nonce')) {
        wp_send_json_error(['message' => 'Security check failed']);
    }

    $email = sanitize_email($_POST['email']);

    if (!is_email($email)) {
        wp_send_json_error(['message' => 'Invalid email address']);
    }

    // Send admin notification email
    $email_result = send_newsletter_notification_email($email);
    
    if ($email_result['success']) {
        wp_send_json_success(['message' => 'Thank you for subscribing!']);
    } else {
        wp_send_json_success(['message' => 'Thank you for subscribing! Email notification saved to backup file.']);
    }
}
