<?php
add_action('wp_ajax_handle_joinUs_form', 'handle_joinUs_form_submission');
add_action('wp_ajax_nopriv_handle_joinUs_form', 'handle_joinUs_form_submission');

function handle_joinUs_form_submission() {
    if (!isset($_POST['joinUs_nonce']) || !wp_verify_nonce($_POST['joinUs_nonce'], 'joinUs_nonce')) {
        wp_send_json_error(['message' => 'Security check failed - nonce missing or invalid']);
    }

    $fields = ['first_name', 'last_name', 'job_title', 'affiliation', 'email', 'phone_prefix', 'phone_number'];
    $registration_data = [];
    $errors = [];

    foreach ($fields as $field) {
        $value = sanitize_text_field($_POST[$field] ?? '');
        if ($field === 'email') {
            $value = sanitize_email($_POST[$field] ?? '');
        }

        $registration_data[$field] = $value;

        if (empty($value) && $field !== 'phone_prefix') {
            $label = ucwords(str_replace('_', ' ', $field));
            $errors[] = "{$label} is required";
        }
    }

    if (!empty($errors)) {
        wp_send_json_error(['message' => implode(', ', $errors)]);
    }

    $post_id = wp_insert_post([
        'post_title'  => $registration_data['first_name'] . ' ' . $registration_data['last_name'],
        'post_status' => 'private',
        'post_type'   => 'registration'
    ]);

    if (!$post_id) {
        wp_send_json_error(['message' => 'There was an error saving your submission.']);
    }

    foreach ($registration_data as $key => $value) {
        add_post_meta($post_id, $key, $value);
    }

    $email_result = send_joinUs_notification_email($registration_data, $post_id);
    
    if ($email_result['success']) {
        wp_send_json_success(['message' => 'Your submission has been sent and saved successfully.']);
    } else {
        wp_send_json_success([
            'message' => 'Your submission has been saved successfully. Email notification saved to backup file.'
        ]);
    }
}

