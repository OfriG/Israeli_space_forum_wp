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
        'name' => 'bannerBlock',
        'title' => 'Banner Block',
        'description' => ('A custom banner block.'),
        'category' => 'theme',
        'icon' => 'dashicons-format-image',
        'keywords' => array('banner', 'block'),
        'mode' => 'preview',
        'render_template' => get_template_directory() . '/acf-blocks/bannerBlock/bannerBlock.php',
        'enqueue_style' => get_template_directory_uri() . '/dist/css/bannerBlock.css',
    ));


}

