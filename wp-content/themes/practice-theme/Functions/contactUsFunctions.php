<?php
add_action('wp_ajax_handle_contactUs_form', 'handle_contactUs_form_submission');
add_action('wp_ajax_nopriv_handle_contactUs_form', 'handle_contactUs_form_submission');

function handle_contactUs_form_submission() {
    if (!isset($_POST['contactUs_nonce']) || !wp_verify_nonce($_POST['contactUs_nonce'], 'contactUs_nonce')) {
        wp_send_json_error(['message' => 'Security check failed - nonce missing or invalid']);
    }

    $fields = ['first_name', 'last_name', 'email', 'message'];
    $contact_data = [];
    $errors = [];

    foreach ($fields as $field) {
        $value = sanitize_text_field($_POST[$field] ?? '');
        if ($field === 'email') {
            $value = sanitize_email($_POST[$field] ?? '');
        } elseif ($field === 'message') {
            $value = sanitize_textarea_field($_POST[$field] ?? '');
        }

        $contact_data[$field] = $value;

        if (empty($value)) {
            $label = ucwords(str_replace('_', ' ', $field));
            $errors[] = "{$label} is required";
        }
    }

    if (!empty($contact_data['email']) && !is_email($contact_data['email'])) {
        $errors[] = "Please enter a valid email address";
    }

    if (!empty($errors)) {
        wp_send_json_error(['message' => implode(', ', $errors)]);
    }

    $post_id = wp_insert_post([
        'post_title'  => $contact_data['first_name'] . ' ' . $contact_data['last_name'] . ' - Contact Form',
        'post_status' => 'private',
        'post_type'   => 'contact_submission',
        'post_content' => $contact_data['message']
    ]);

    if (!$post_id) {
        wp_send_json_error(['message' => 'There was an error saving your submission.']);
    }

    foreach ($contact_data as $key => $value) {
        add_post_meta($post_id, $key, $value);
    }

    $email_result = send_contactUs_notification_email($contact_data, $post_id);
    
    if ($email_result['success']) {
        wp_send_json_success(['message' => 'Your message has been sent successfully. We will get back to you soon!']);
    } else {
        wp_send_json_success([
            'message' => 'Your message has been sent successfully. We will get back to you soon!'
        ]);
    }
}

function send_contactUs_notification_email($contact_data, $post_id) {
    $to = get_option('admin_email');
    $subject = 'New Contact Form Submission - ' . $contact_data['first_name'] . ' ' . $contact_data['last_name'];
    
    $message = "New contact form submission:\n\n";
    $message .= "Name: " . $contact_data['first_name'] . ' ' . $contact_data['last_name'] . "\n";
    $message .= "Email: " . $contact_data['email'] . "\n";
    $message .= "Message: " . $contact_data['message'] . "\n\n";
    $message .= "Submission ID: " . $post_id . "\n";
    $message .= "Date: " . date('Y-m-d H:i:s') . "\n";

    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    $email_sent = wp_mail($to, $subject, nl2br($message), $headers);
    
    if (!$email_sent) {
        $backup_file = get_template_directory() . '/backup_contact_emails.txt';
        $backup_content = date('Y-m-d H:i:s') . " - Contact Form Submission\n";
        $backup_content .= "Name: " . $contact_data['first_name'] . ' ' . $contact_data['last_name'] . "\n";
        $backup_content .= "Email: " . $contact_data['email'] . "\n";
        $backup_content .= "Message: " . $contact_data['message'] . "\n";
        $backup_content .= "Post ID: " . $post_id . "\n\n";
        
        file_put_contents($backup_file, $backup_content, FILE_APPEND | LOCK_EX);
        
        return ['success' => false, 'message' => 'Email failed, saved to backup'];
    }
    
    return ['success' => true, 'message' => 'Email sent successfully'];
}
