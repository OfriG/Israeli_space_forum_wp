<?php
// ACF fields for Artist Custom Post Type
function artist_cpt_acf_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_artist_cpt_fields',
            'title' => 'Artist Custom Post Type Fields',
            'fields' => array(
                array(
                    'key' => 'field_headline_image_mobile',
                    'label' => 'Headline Image Mobile',
                    'name' => 'headline_image_mobile',
                    'type' => 'image',
                    'return_format' => 'array',
                ),
                array(
                    'key' => 'field_headline_image_desktop',
                    'label' => 'Headline Image Desktop',
                    'name' => 'headline_image_desktop',
                    'type' => 'image',
                    'return_format' => 'array',
                ),
                array(
                    'key' => 'field_description',
                    'label' => 'Description',
                    'name' => 'description',
                    'type' => 'textarea',
                ),
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
add_action('acf/init', 'artist_cpt_acf_fields');
