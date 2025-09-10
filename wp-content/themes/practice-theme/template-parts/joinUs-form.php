<?php
$form_fields_data = $args['form_fields_data'] ?? null;
$register_button_text = $args['register_button_text'] ?? '';
?>

<div class="joinUs-block-form">
    <form id="joinUs-form" class="joinUs-ajax-form" method="post">
        <?php wp_nonce_field('joinUs_nonce', 'joinUs_nonce'); ?>

        <?php 
        if($form_fields_data) {
            render_joinus_form_fields($form_fields_data); 
        }
        ?>
        <?php 
        if($register_button_text) {
            render_joinus_button($register_button_text); 
        }
        ?>
    </form>
</div>