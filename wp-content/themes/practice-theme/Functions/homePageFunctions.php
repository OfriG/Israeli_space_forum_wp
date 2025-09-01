<?php
add_action('acf/init', 'practice_theme_register_acf_blocks');

function practice_theme_register_acf_blocks()
{
    error_log(' practice_theme_register_acf_blocks RAN');

    acf_register_block_type(array(
        'name' => 'hero',
        'title' => 'Hero',

        'description' => ('A custom hero block with a headline, description, and a button.'),
        'category' => 'theme',
        'icon' => 'superhero-alt',
        'keywords' => array('hero', 'header', 'banner'),
        'mode' => 'preview',
        'render_template' => get_template_directory() . '/template-parts/home-page/hero.php',
        'supports' => array(
            'align' => false,
            'anchor' => true
        )
    ));
}
