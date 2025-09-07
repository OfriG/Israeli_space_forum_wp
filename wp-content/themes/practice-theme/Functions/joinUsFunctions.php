<?php
add_action('wp_ajax_handle_joinUs_form', 'handle_joinUs_form_submission');
function handle_joinUs_form_submission() {
if(!wp_verify_nonce($_POST['joinUs_nonce'], 'joinUs_nonce')) {
    wp_send_json_error(['message' => 'Security check failed']);
    return;
}
$first_name = sanitize_text_field($_POST['first_name']);
$last_name = sanitize_text_field($_POST['last_name']);
$job_title = sanitize_text_field($_POST['job_title']);
$affiliation = sanitize_text_field($_POST['affiliation']);
$email= sanitize_email($_POST['email']);
$phone_number = sanitize_text_field($_POST['phone_number']);
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
if(email_exists($email)) {
    $errors[] = 'Email already exists';
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
    add_post_meta($post_id, 'phone_number', $phone_number);
}
wp_send_json_success(['message' => 'Form submitted successfully']);
}