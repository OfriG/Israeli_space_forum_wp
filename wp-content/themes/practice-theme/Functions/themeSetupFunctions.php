
<?php
// Theme Setup
function theme_setup()
{
    // Title tag support
    add_theme_support('title-tag');

    // HTML5 support for modern forms
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    // Menus
    register_nav_menus(array(
        'main-menu' => esc_html__('Main Menu', 'practice-theme'),
        'secondary' => esc_html__('Footer Menu', 'practice-theme')
    ));
}
add_action('after_setup_theme', 'theme_setup');
