<?php

function render_joinus_form_fields($data) {
    ?>
    <div class="form-row">
        <input class="form-field" 
               type="text" 
               name="first_name" 
               placeholder="<?php echo esc_attr($data['first_name_form']); ?>">
        <input class="form-field" 
               type="text" 
               name="last_name" 
               placeholder="<?php echo esc_attr($data['last_name_form']); ?>">
    </div>
    
    <div class="form-row">
        <input class="form-field" 
               type="text" 
               name="job_title" 
               placeholder="<?php echo esc_attr($data['job_title_form']); ?>">
        <input class="form-field" 
               type="text" 
               name="affiliation" 
               placeholder="<?php echo esc_attr($data['affiliation_form']); ?>">
    </div>
    
    <div class="form-row">
        <input class="form-field" 
               type="email" 
               name="email" 
               placeholder="<?php echo esc_attr($data['email_form']); ?>">
        <div class="phone-input-container">
            <input class="form-field-phone-prefix" 
                   type="text" 
                   name="phone_prefix" 
                   placeholder="<?php echo esc_attr($data['phone_prefix_form']); ?>">
            <input class="form-field-phone" 
                   type="tel" 
                   name="phone_number" 
                   placeholder="<?php echo esc_attr($data['phone_number_form']); ?>">
        </div>
    </div>
    <?php
}
