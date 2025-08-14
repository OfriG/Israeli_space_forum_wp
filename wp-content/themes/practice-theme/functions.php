<?php
function style_files() {
    wp_enqueue_style( 'style', get_template_directory_uri() . '/dist/css/style.css' );
    //wp_enqueue_style( 'footer-styles', get_template_directory_uri() . '/assets/css/components/_footer.css' );
    
    // Add custom CSS with dynamic image path
    $custom_css = "
        .site-footer::before {
            background-image: url('" . get_template_directory_uri() . "/images/stars.png');
        }
    ";
    wp_add_inline_style( 'footer-styles', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'style_files' );