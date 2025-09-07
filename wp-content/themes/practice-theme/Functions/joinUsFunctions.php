<?php
// Handle form submission for both logged-in and non-logged-in users
add_action('wp_ajax_handle_joinUs_form', 'handle_joinUs_form_submission');
add_action('wp_ajax_nopriv_handle_joinUs_form', 'handle_joinUs_form_submission');

function handle_joinUs_form_submission() {

if(!isset($_POST['joinUs_nonce']) || !wp_verify_nonce($_POST['joinUs_nonce'], 'joinUs_nonce')) {
    wp_send_json_error(['message' => 'Security check failed - nonce missing or invalid']);
    return;
}
$first_name = sanitize_text_field($_POST['first_name'] ?? '');
$last_name = sanitize_text_field($_POST['last_name'] ?? '');
$job_title = sanitize_text_field($_POST['job_title'] ?? '');
$affiliation = sanitize_text_field($_POST['affiliation'] ?? '');
$email = sanitize_email($_POST['email'] ?? '');
$phone_prefix = sanitize_text_field($_POST['phone_prefix'] ?? '');
$phone_number = sanitize_text_field($_POST['phone_number'] ?? '');
$errors = array();
if(empty($first_name)) {
    $errors[] = 'First Name is required';
}
if(empty($last_name)) {
    $errors[] = 'Last Name is required';
}
if(empty($job_title)) {
    $errors[] = 'Job Title is required';
}
if(empty($affiliation)) {
    $errors[] = 'Affiliation is required';
}
if(empty($email)) {
    $errors[] = 'Email is required';
}
if(empty($phone_number)) {
    $errors[] = 'Phone Number is required';
}
if(!empty($errors)) {
    wp_send_json_error(array('message' =>implode('<br>', $errors)));
}
$registration_data = array(
    'first_name' => $first_name,
    'last_name' => $last_name,
    'job_title' => $job_title,
    'affiliation' => $affiliation,
    'email' => $email,
    'phone_prefix' => $phone_prefix,
    'phone_number' => $phone_number
);
$post_id = wp_insert_post(array(
    'post_title' => $first_name . ' ' . $last_name,
    'post_status' => 'private',
    'post_type' => 'registration'
));

if ($post_id) {
    add_post_meta($post_id, 'first_name', $first_name);
    add_post_meta($post_id, 'last_name', $last_name);
    add_post_meta($post_id, 'job_title', $job_title);
    add_post_meta($post_id, 'affiliation', $affiliation);
    add_post_meta($post_id, 'email', $email);
    add_post_meta($post_id, 'phone_prefix', $phone_prefix);
    add_post_meta($post_id, 'phone_number', $phone_number);
    
    // Send email notification to admin
    $to = get_option('admin_email');
    $subject = "Join Us from of the user{$first_name} {$last_name}";
    $headers = ['Content-Type: text/html; charset=UTF-8'];
    $body = "
        <h2>Join Us from of the user {$first_name} {$last_name}</h2>
        <p>Name: {$first_name} {$last_name}</p>
        <p>Job Title: {$job_title}</p>
        <p>Affiliation: {$affiliation}</p>
        <p>Email: {$email}</p>
        <p>Phone: +{$phone_prefix} {$phone_number}</p>
        <p><em>This submission has been saved as registration ID: {$post_id}</em></p>
    ";
    
    if (wp_mail($to, $subject, $body, $headers)) {
        wp_send_json_success(['message' => 'Your submission has been sent and saved.']);
    } else {
     
    wp_send_json_error(['message' => 'There was an error with your submission.']);
}
}}