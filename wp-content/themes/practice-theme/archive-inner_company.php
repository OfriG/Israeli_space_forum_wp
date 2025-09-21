<?php
get_header();
wp_enqueue_style('innerCompany-block-css', get_template_directory_uri() . '/dist/css/innerCompany-block.css?v=' . (file_exists(get_template_directory() . '/dist/css/inner-company-block.css') ? filemtime(get_template_directory() . '/dist/css/innerCompany-block.css') : '1.0'));
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
                <?php
                the_content();
                include get_template_directory() . '/acf-blocks/innerCompany-block/innerCompany-block.php';

                ?>
            </div>
        </article>
        <?php
    endwhile;
endif;

get_footer();
