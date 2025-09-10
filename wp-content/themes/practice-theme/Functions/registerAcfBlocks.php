<?php
add_action('acf/init', 'practice_theme_register_acf_blocks');

function practice_theme_register_acf_blocks()
{
    acf_register_block_type(array(
        'name' => 'homepage-hero-block',
        'title' => 'Hero',

        'description' => ('A custom hero block with a headline, description, and a button.'),
        'category' => 'theme',
        'icon' => 'superhero-alt',
        'keywords' => array('hero', 'header', 'banner'),
        'mode' => 'preview',
        'render_template' => get_template_directory() . '/acf-blocks/homepage-hero/homepage-hero.php',
        'enqueue_style' => get_template_directory_uri() . '/dist/css/homepage-hero.css?v=' . (file_exists(get_template_directory() . '/dist/css/homepage-hero.css') ? filemtime(get_template_directory() . '/dist/css/homepage-hero.css') : '1.0'),

    ));

    acf_register_block_type(array(
        'name' => 'iac-block',
        'title' => 'IAC',
        'description' => ('A custom iac block with a headline, description, and a button.'),
        'category' => 'theme',
        'icon' => 'superhero-alt',
        'keywords' => array('iac', 'block'),
        'mode' => 'preview',
        'render_template' => get_template_directory() . '/acf-blocks/iac-block/iac-block.php',
        'enqueue_style' => get_template_directory_uri() . '/dist/css/iac-block.css?v=' . (file_exists(get_template_directory() . '/dist/css/iac-block.css') ? filemtime(get_template_directory() . '/dist/css/iac-block.css') : '1.0'),
    ));

    acf_register_block_type(array(
        'name' => 'banner-block',
        'title' => 'Banner Block',
        'description' => ('A custom banner block.'),
        'category' => 'theme',
        'icon' => 'dashicons-format-image',
        'keywords' => array('banner', 'block'),
        'mode' => 'preview',
        'render_template' => get_template_directory() . '/acf-blocks/bannerBlock/bannerBlock.php',
        'enqueue_style' => get_template_directory_uri() . '/dist/css/bannerBlock.css',
    )); 
      acf_register_block_type(array(
        'name' => 'joinUs-block',
        'title' => 'Join Us Block',
        'description' => ('A custom join us block.'),
        'category' => 'theme',
        'icon' => 'email',
        'keywords' => array('joinUs', 'block'),
        'mode' => 'preview',
         'render_template' => get_template_directory() . '/acf-blocks/joinUs-block/joinUs-block.php',
        'enqueue_style' => get_template_directory_uri() . '/dist/css/joinUs-block.css',
    ));
    acf_register_block_type(array(
        'name' => 'members-block',
        'title' => 'Members Block',
        'description' => ('A custom that shows the members and the collaborators of the forum.'),
        'category' => 'theme',
        'icon' => 'dashicons-format-image',
        'keywords' => array('members', 'block'),
        'mode' => 'preview',
        'render_template' => get_template_directory() . '/acf-blocks/members-block/members-block.php',
        'enqueue_style' => get_template_directory_uri() . '/dist/css/members-block.css',
    ));

    acf_register_block_type(array(
        'name' => 'isf-block',
        'title' => 'ISF Block',
        'description' => ('A custom of Israel Space Forum block.'),
        'category' => 'theme',
        'icon' => 'dashicons-format-image',
            'keywords' => array('isf', 'block'),
            'mode' => 'preview',
        'render_template' => get_template_directory() . '/acf-blocks/isf-block/isf-block.php',
        'enqueue_style' => get_template_directory_uri() . '/dist/css/isf-block.css',
    ));

    acf_register_block_type(array(
        'name' => 'AboutUs-hero',
        'title' => 'About Us Hero',
        'description' => ('A custom of About Us Hero block.'),
        'category' => 'theme',
        'icon' => 'dashicons-id',
            'keywords' => array('AboutUs', 'block'),
            'mode' => 'preview',
        'render_template' => get_template_directory() . '/acf-blocks/AboutUs-hero/AboutUs-hero.php',
        'enqueue_style' => get_template_directory_uri() . '/dist/css/AboutUs-hero.css',
    ));
    acf_register_block_type(array(
        'name' => 'campanis-block',
        'title' => 'Campanis Block',
        'description' => ('A custom that present companies.'),
        'category' => 'theme',
        'icon' => 'dashicons-groups',
            'keywords' => array('Campanis', 'block'),
            'mode' => 'preview',
        'render_template' => get_template_directory() . '/acf-blocks/campanis-block/campanis-block.php',
        'enqueue_style' => get_template_directory_uri() . '/dist/css/campanis-block.css',
    ));
}

