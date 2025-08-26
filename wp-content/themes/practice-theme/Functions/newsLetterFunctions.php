<?php
function enqueue_newsletter_scripts()
{
    wp_enqueue_script('newsletter-js', get_theme_file_uri('/dist/js/newsLetter.js'), ['jquery'], '1.0', true);

    wp_localize_script('newsletter-js', 'newsletterSettings', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('newsletter_nonce')
    ]);
}
add_action('wp_enqueue_scripts', 'enqueue_newsletter_scripts');

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


    wp_send_json_success(['message' => 'Thank you for subscribing!']);
}
