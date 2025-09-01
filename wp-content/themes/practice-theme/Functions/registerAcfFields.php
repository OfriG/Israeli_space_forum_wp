<?php
add_action('acf/init', 'practice_theme_register_acf_fields');

function practice_theme_register_acf_fields()
{
    // Check if ACF is available
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    // Register field group for Homepage Hero Block
    acf_add_local_field_group(array(
        'key' => 'group_homepage_hero',
        'title' => 'Homepage Hero Fields',
        'fields' => array(
            array(
                'key' => 'field_background_image',
                'label' => 'Background Image',
                'name' => 'background_image',
                'type' => 'image',
                'instructions' => 'Upload a background image for the hero section',
                'required' => 0,
                'return_format' => 'array',
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'field_headline',
                'label' => 'Headline',
                'name' => 'headline',
                'type' => 'text',
                'instructions' => 'Enter the main headline text',
                'required' => 1,
                'placeholder' => 'Enter your headline...',
            ),
            array(
                'key' => 'field_highlight_headline',
                'label' => 'Highlight Headline',
                'name' => 'highlight_headline',
                'type' => 'text',
                'instructions' => 'Enter text to highlight (will appear with gradient)',
                'required' => 0,
                'placeholder' => 'Highlighted text...',
            ),
            array(
                'key' => 'field_description',
                'label' => 'Description',
                'name' => 'description',
                'type' => 'textarea',
                'instructions' => 'Enter the description text',
                'required' => 0,
                'rows' => 3,
                'placeholder' => 'Enter description...',
            ),
            array(
                'key' => 'field_button_text',
                'label' => 'Button Text',
                'name' => 'button_text',
                'type' => 'text',
                'instructions' => 'Enter the button text',
                'required' => 0,
                'placeholder' => 'Button text...',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/homepage-hero',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));
}
