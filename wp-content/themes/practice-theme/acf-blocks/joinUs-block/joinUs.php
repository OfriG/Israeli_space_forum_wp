<?php 
$headline_mobile_joinus = get_field('headline_joinus');
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

// Ensure all fields are strings, not arrays
$headline_mobile_joinus = is_array($headline_mobile_joinus) ? '' : $headline_mobile_joinus;
$headline_desktop_joinus = is_array($headline_desktop_joinus) ? '' : $headline_desktop_joinus;
$description_joinus = is_array($description_joinus) ? '' : $description_joinus;
$first_name_form = is_array($first_name_form) ? '' : $first_name_form;
$last_name_form = is_array($last_name_form) ? '' : $last_name_form;
$job_title_form = is_array($job_title_form) ? '' : $job_title_form;
$affiliation_form = is_array($affiliation_form) ? '' : $affiliation_form;
$email_form = is_array($email_form) ? '' : $email_form;
$phone_number_form = is_array($phone_number_form) ? '' : $phone_number_form;
$register_button_form = is_array($register_button_form) ? '' : $register_button_form;
?>
<div class="joinUs-block">
    <div class="joinUs-block-content">
        <h2 class="joinUs-block-content-title-mobile"><?php echo $headline_mobile_joinus ?: 'Join Us'; ?></h2>
        <h2 class="joinUs-block-content-title-desktop"><?php echo $headline_desktop_joinus; ?></h2>
        <p class="joinUs-block-content-description"><?php echo $description_joinus; ?></p>
 </div>
 <div class="joinUs-block-form">

      <form id="joinUs-form" class="joinUs-ajax-form" method="post">
            <?php wp_nonce_field('joinUs_nonce', 'joinUs_nonce'); ?>          
            <div class="form-row">
                <input class="form-field" type="text" name="first_name" placeholder="<?php echo esc_attr($first_name_form ?: 'First Name'); ?>">
                <input class="form-field" type="text" name="last_name" placeholder="<?php echo esc_attr($last_name_form ?: 'Last Name'); ?>">
            </div>
            <div class="form-row">
                <input class="form-field" type="text" name="job_title" placeholder="<?php echo esc_attr($job_title_form ?: 'Job Title'); ?>">
                <input class="form-field" type="text" name="affiliation" placeholder="<?php echo esc_attr($affiliation_form ?: 'Affiliation'); ?>">
            </div>
            <div class="form-row">
                <input class="form-field" type="email" name="email" placeholder="<?php echo esc_attr($email_form ?: 'Email'); ?>">
                <div class="phone-input-container">
                    <input class="form-field-phone-prefix" type="text" name="phone_prefix" value="+123" >
                    <input class="form-field-phone" type="tel" name="phone_number" placeholder="Phone number">
                </div>
            </div>
            <button type="submit">
                <?php echo esc_html($register_button_form ?: 'Register'); ?>
            </button>    
     </form>
    </div>
 <div  >
</div> 

<?php
?>