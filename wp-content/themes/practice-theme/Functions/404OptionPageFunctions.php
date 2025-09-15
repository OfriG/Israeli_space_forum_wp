<?php

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'icon_url' => 'dashicons-admin-generic',
    ));
}

if( function_exists('acf_add_local_field_group') ) {
    acf_add_local_field_group(array(
        'key' => 'group_404_settings',
        'title' => '404 Page Settings',
        'fields' => array(
         
            array(
                'key' => 'field_404_headline_image',
                'label' => 'Headline Image',
                'name' => 'headline_image',
                'type' => 'image',
                'instructions' => 'Upload an image to use as headline instead of text. If provided, this will be used instead of the text headline.',
                'return_format' => 'array',
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'field_404_description',
                'label' => 'Description',
                'name' => 'description',
                'type' => 'textarea',
                'instructions' => 'Description text for 404 page',
                'default_value' => 'Page not found',
                'placeholder' => 'Enter description...',
                'rows' => 4,
            ),
            array(
                'key' => 'field_404_button',
                'label' => 'Button',
                'name' => 'button',
                'type' => 'link',
                'instructions' => 'Button link for 404 page',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_404_background',
                'label' => 'Background Image',
                'name' => 'background',
                'type' => 'image',
                'instructions' => 'Optional background image for 404 page',
                'return_format' => 'array',
                'preview_size' => 'medium',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-general-settings',
                ),
            ),
        ),
    ));
}

