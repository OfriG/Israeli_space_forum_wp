
<?php


// Load assets
function theme_enqueue_assets()
{
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap', array(), null);

    // CSS Files - Add navbar styles directly
    wp_enqueue_style('navbar-styles', get_template_directory_uri() . '/dist/css/_navbar-components.css', array(), '1.0.0');
    wp_enqueue_style('main-styles', get_template_directory_uri() . '/dist/css/_main-styles.css', array(), '1.0.0');
    wp_enqueue_style('footer-styles', get_template_directory_uri() . '/dist/css/_footer.css', array(), '1.0.0');
    wp_enqueue_style('upper-footer-styles', get_template_directory_uri() . '/dist/css/footer/_upper-footer.css', array(), '1.0.0');
    wp_enqueue_style('bottom-footer-styles', get_template_directory_uri() . '/dist/css/footer/_bottom-footer.css', array(), '1.0.1');

    // JavaScript
    wp_enqueue_script('theme-js', get_template_directory_uri() . '/dist/js/app.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('header-js', get_template_directory_uri() . '/dist/js/header.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');
