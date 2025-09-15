
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
    wp_enqueue_style('newsletter-styles', get_template_directory_uri() . '/dist/css/footer/_newsletter.css', array(), '1.0.0');
    wp_enqueue_style('404-styles', get_template_directory_uri() . '/dist/css/404.css', array(), '1.0.0');
    wp_enqueue_style( 'sweetalert2-css', 'https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css' );

    // JavaScript
    wp_enqueue_script('theme-js', get_template_directory_uri() . '/dist/js/app.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('header-js', get_template_directory_uri() . '/dist/js/header.js', array(), '1.0.0', true);
    wp_enqueue_script('joinUs-js', get_template_directory_uri() . '/dist/js/joinUs.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script( 'sweetalert2', 'https://cdn.jsdelivr.net/npm/sweetalert2@11', array(), null, true );

    // Localize script for AJAX
    wp_localize_script('joinUs-js', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');

