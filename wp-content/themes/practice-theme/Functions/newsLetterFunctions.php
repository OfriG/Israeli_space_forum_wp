<?php

add_action('wp_ajax_handle_newsletter_signup', 'handle_newsletter_signup');
add_action('wp_ajax_nopriv_handle_newsletter_signup', 'handle_newsletter_signup');

function handle_newsletter_signup()
{
    if (!isset($_POST['newsletter_nonce']) || !wp_verify_nonce($_POST['newsletter_nonce'], 'newsletter_nonce')) {
        wp_send_json_error(['message' => 'Security check failed - nonce missing or invalid']);
    }

    $fields = ['email'];
    $newsletter_data = [];
    $errors = [];
    $value = sanitize_email($_POST['email'] ?? '');
    $newsletter_data['email'] = $value;

    if (empty($value)) {
        $errors[] = "Email is required";
    }
    if (!empty($errors)) {
        wp_send_json_error(['message' => implode(', ', $errors)]);
    }
    $post_id = wp_insert_post([
        'post_title'  => $newsletter_data['email'],
        'post_status' => 'private',
        'post_type'   => 'newsletter'
    ]);
    if (!$post_id) {
        wp_send_json_error(['message' => 'There was an error saving your submission.']);
    }

    foreach ($newsletter_data as $key => $value) {
        add_post_meta($post_id, $key, $value);
    }
    $email_result = send_newsletter_notification_email($newsletter_data, $post_id);
    
    if ($email_result['success']) {
        wp_send_json_success(['message' => 'Your submission has been sent and saved successfully.']);
    } else {
        wp_send_json_success([
            'message' => 'Your submission has been saved successfully. Email notification saved to backup file.'
        ]);
    }

    }


