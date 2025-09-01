<?php
add_action('acf/init', 'practice_theme_register_acf_blocks');

function practice_theme_register_acf_blocks()
{
    acf_register_block_type(array(
        'name' => 'Homepage Hero Block',
        'title' => 'Hero',

        'description' => ('A custom hero block with a headline, description, and a button.'),
        'category' => 'theme',
        'icon' => 'superhero-alt',
        'keywords' => array('hero', 'header', 'banner'),
        'mode' => 'preview',
        'render_template' => get_template_directory() . '/acf-blocks/homepage-hero/homepage-hero.php',
        'enqueue_style' => get_template_directory_uri() . '/dist/css/homepage-hero.css',

    ));
    acf_register_block_type(array(
        'name' => 'impactBanner',
        'title' => 'Impact Banner',

        'description' => ('A custom impact banner block with information about the impact of the startup.'),
        'category' => 'theme',
    'icon' => 'dashicons-welcome-learn-more',
        'keywords' => array('impact', 'banner'),
        'mode' => 'preview',
        'render_template' => get_template_directory() . '/acf-blocks/impactBanner/impactBanner.php',
        'enqueue_style' => get_template_directory_uri() . '/dist/css/impactBanner.css',

       
    ));

}

