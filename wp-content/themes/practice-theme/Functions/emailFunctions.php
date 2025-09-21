<?php
//send email to admin will work at server- not localhost
//for now the data save at email_backup.txt
function send_joinUs_notification_email($registration_data, $post_id) {
    $to = get_option('admin_email');
    $subject = "Join Us form from user {$registration_data['first_name']} {$registration_data['last_name']}";
    $headers = ['Content-Type: text/html; charset=UTF-8'];

    $body = "<h2>Join Us form submission</h2>";
    foreach ($registration_data as $key => $value) {
        $label = ucwords(str_replace('_', ' ', $key));
        $body .= "<p><strong>{$label}:</strong> {$value}</p>";
    }
    $body .= "<p><em>This submission has been saved as registration ID: {$post_id}</em></p>";

    $email_sent = wp_mail($to, $subject, $body, $headers);

    if (!$email_sent) {
        error_log("Join Us form: Failed to send email for ID: {$post_id}");

        $email_backup = "=== Join Us Form Submission ===\n";
        $email_backup .= "Date: " . date('Y-m-d H:i:s') . "\n";
        $email_backup .= "To: {$to}\n";
        $email_backup .= "Subject: {$subject}\n";
        $email_backup .= "Content:\n" . strip_tags($body) . "\n";
        $email_backup .= "================================\n\n";

        file_put_contents(
            get_template_directory() . '/email_backup.txt',
            $email_backup,
            FILE_APPEND | LOCK_EX
        );

        return ['success' => false, 'message' => 'Email failed, saved to backup file'];
    }

    return ['success' => true, 'message' => 'Email sent successfully'];
}

function send_newsletter_notification_email($email, $post_id) {
    error_log("send_newsletter_notification_email called with email: $email and post_id: $post_id");
    
    $to = get_option('admin_email');
    $subject = "New Newsletter Subscription from {$email}";
    $headers = ['Content-Type: text/html; charset=UTF-8'];

    $body = "<h2>Newsletter Subscription</h2>";
    $body .= "<p><strong>Email:</strong> {$email}</p>";
    $body .= "<p><strong>Subscription Date:</strong> " . date('Y-m-d H:i:s') . "</p>";
    $body .= "<p><em>This subscription has been saved as newsletter ID: {$post_id}</em></p>";

    // For testing purposes, always save to backup on localhost
    $is_localhost = (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || 
                     strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false ||
                     strpos($_SERVER['HTTP_HOST'], '.local') !== false);
    
    error_log("Is localhost: " . ($is_localhost ? 'true' : 'false'));
    
    if ($is_localhost) {
        error_log("Saving newsletter to backup file");
        
        // Always save to backup on localhost for testing
        $email_backup = "=== Newsletter Subscription ===\n";
        $email_backup .= "Date: " . date('Y-m-d H:i:s') . "\n";
        $email_backup .= "To: {$to}\n";
        $email_backup .= "Subject: {$subject}\n";
        $email_backup .= "Content:\n" . strip_tags($body) . "\n";
        $email_backup .= "Newsletter ID: {$post_id}\n";
        $email_backup .= "================================\n\n";

        $result = file_put_contents(
            get_template_directory() . '/email_backup.txt',
            $email_backup,
            FILE_APPEND | LOCK_EX
        );
        
        error_log("File write result: " . ($result !== false ? 'success' : 'failed'));
        error_log("Newsletter subscription saved to backup for localhost testing");
        return ['success' => false, 'message' => 'Email saved to backup file (localhost)'];
    }

    $email_sent = wp_mail($to, $subject, $body, $headers);

    if (!$email_sent) {
        error_log("Newsletter subscription: Failed to send email for: {$email}");

        $email_backup = "=== Newsletter Subscription ===\n";
        $email_backup .= "Date: " . date('Y-m-d H:i:s') . "\n";
        $email_backup .= "To: {$to}\n";
        $email_backup .= "Subject: {$subject}\n";
        $email_backup .= "Content:\n" . strip_tags($body) . "\n";
        $email_backup .= "Newsletter ID: {$post_id}\n";
        $email_backup .= "================================\n\n";

        file_put_contents(
            get_template_directory() . '/email_backup.txt',
            $email_backup,
            FILE_APPEND | LOCK_EX
        );

        return ['success' => false, 'message' => 'Email failed, saved to backup file'];
    }

    return ['success' => true, 'message' => 'Email sent successfully'];
}

function create_email_backup($to, $subject, $body, $post_id) {
    $email_backup = "=== Join Us Form Submission ===\n";
    $email_backup .= "Date: " . date('Y-m-d H:i:s') . "\n";
    $email_backup .= "To: {$to}\n";
    $email_backup .= "Subject: {$subject}\n";
    $email_backup .= "Content:\n" . strip_tags($body) . "\n";
    $email_backup .= "Registration ID: {$post_id}\n";
    $email_backup .= "================================\n\n";

    return file_put_contents(
        get_template_directory() . '/email_backup.txt',
        $email_backup,
        FILE_APPEND | LOCK_EX
    ) !== false;
}
