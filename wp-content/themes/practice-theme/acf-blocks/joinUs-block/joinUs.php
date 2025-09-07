<?php 
// Include the form components
require_once get_template_directory() . '/acf-blocks/joinUs-block/form-fields-component.php';
require_once get_template_directory() . '/acf-blocks/joinUs-block/button-component.php';

$headline_mobile_joinus = get_field('headline_mobile_joinus');
$headline_desktop_joinus = get_field('headline_desktop_joinus');
$description_joinus = get_field('description_joinus');
$first_name_form = get_field('first_name_form');
$last_name_form = get_field('last_name_form');
$job_title_form = get_field('job_title_form');
$affiliation_form = get_field('affiliation_form');
$email_form = get_field('email_form');
$phone_number_form = get_field('phone_number_form');
$register_button_form = get_field('register_button_form');
$phone_prefix_form = get_field('phone_prefix_form');
$register_button_text = $register_button_form['title'] ?? '';

// Prepare data for the form fields component
$form_fields_data = [
    'first_name_form' => $first_name_form,
    'last_name_form' => $last_name_form,
    'job_title_form' => $job_title_form,
    'affiliation_form' => $affiliation_form,
    'email_form' => $email_form,
    'phone_number_form' => $phone_number_form,
    'phone_prefix_form' => $phone_prefix_form
];
?>
<div class="joinUs-block">
    <div class="joinUs-block-content">
        <?php if ($headline_mobile_joinus): ?>
            <h2 class="joinUs-block-content-title-mobile"><?php echo $headline_mobile_joinus; ?></h2>
        <?php endif; ?>
        <?php if ($headline_desktop_joinus): ?>
            <h2 class="joinUs-block-content-title-desktop"><?php echo $headline_desktop_joinus; ?></h2>
        <?php endif; ?>
        <?php if ($description_joinus): ?>
            <p class="joinUs-block-content-description"><?php echo $description_joinus; ?></p>
        <?php endif; ?>
    </div>
    <div class="joinUs-block-form">
        <form id="joinUs-form" class="joinUs-ajax-form" method="post">
            <?php wp_nonce_field('joinUs_nonce', 'joinUs_nonce'); ?>
            
            <?php 
            // Render form fields using component
            render_joinus_form_fields($form_fields_data); 
            ?>
            
            <?php 
            // Render submit button using component
            render_joinus_button($register_button_text); 
            ?>
        </form>
    </div>
</div>