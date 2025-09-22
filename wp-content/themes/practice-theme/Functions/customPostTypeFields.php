<?php

function artist_cpt_acf_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_artist_cpt_fields',
            'title' => 'Artist Custom Post Type Fields',
            'fields' => array(
                array(
                    'key' => 'field_gallery',
                    'label' => 'Gallery',
                    'name' => 'gallery',
                    'type' => 'repeater',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_first_headline',
                            'label' => 'First Headline',
                            'name' => 'first_headline',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_second_headline',
                            'label' => 'Second Headline',
                            'name' => 'second_headline',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_image',
                            'label' => 'Image',
                            'name' => 'image',
                            'type' => 'image',
                        ),
                        array(
                            'key' => 'field_item_description',
                            'label' => 'Description',
                            'name' => 'item_description',
                            'type' => 'textarea',
                        ),
                        array(
                            'key' => 'field_email',
                            'label' => 'Email',
                            'name' => 'email',
                            'type' => 'email',
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'artist',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'active' => true,
        ));
    }
}
function innerCompany_acf_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_inner_company_fields',
            'title' => 'Inner Company Block',
            'fields' => array(
                array(
                    'key' => 'field_first_button',
                    'label' => 'First Button',
                    'name' => 'first_button',
                    'type' => 'link',
                    'return_format' => 'array',
                ),
                array(
                    'key' => 'field_second_button',
                    'label' => 'Second Button',
                    'name' => 'second_button',
                    'type' => 'link',
                    'return_format' => 'array',
                ),
                array(
                    'key' => 'field_headline',
                    'label' => 'Headline',
                    'name' => 'headline',
                    'type' => 'textarea',
                ),
                array(
                    'key' => 'field_description',
                    'label' => 'Description',
                    'name' => 'description',
                    'type' => 'textarea',
                ),
                array(
                    'key' => 'field_full_name',
                    'label' => 'Full Name',
                    'name' => 'full_name',
                    'type' => 'textarea',
                ),
                array(
                    'key' => 'field_job_title',
                    'label' => 'Job Title',
                    'name' => 'job_title',
                    'type' => 'textarea',
                ),
                array(
                    'key' => 'field_mail',
                    'label' => 'Email',
                    'name' => 'mail',
                    'type' => 'email',
                ),
                array(
                    'key' => 'field_icon',
                    'label' => 'Icon',
                    'name' => 'icon',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'inner_company',
                    ),
                ),
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/innercompany-block',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'active' => true,
        ));
    }
}
add_action('acf/init', 'innerCompany_acf_fields');

add_action('acf/init', 'artist_cpt_acf_fields');
