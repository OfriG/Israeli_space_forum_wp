
<?php
get_header();
wp_enqueue_style('artist-block-css', get_template_directory_uri() . '/dist/css/artist-block.css?v=' . (file_exists(get_template_directory() . '/dist/css/artist-block.css') ? filemtime(get_template_directory() . '/dist/css/artist-block.css') : '1.0'));
if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
         include get_template_directory() . '/acf-blocks/artist-block/artist-block.php';
    endwhile;
endif;
get_footer();
