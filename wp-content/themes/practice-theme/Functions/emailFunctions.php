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
