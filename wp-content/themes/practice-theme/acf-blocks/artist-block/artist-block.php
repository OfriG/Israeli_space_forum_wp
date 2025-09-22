<?php
require_once get_template_directory() . '/acf-blocks/artist-block/artist-functions.php';

$artists_query = new WP_Query(array(
    'post_type'      => 'artist',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
));

$artists_data = array();
if ($artists_query->have_posts()) {
    while ($artists_query->have_posts()) : $artists_query->the_post();
        $artists_data[] = get_artist_data(get_the_ID());
    endwhile;
    wp_reset_postdata();
}
?>
<div class="artist-navigation-block">
    <div class="artist-navigation-container">
        <?php if (!empty($artists_data)) : ?>
            <div class="artist-counter">
                <span id="current-artist">1</span> / <span id="total-artists"><?php echo count($artists_data); ?></span>
            </div>

            <?php $first_artist_data = $artists_data[0]; ?>

            <div class="artist-block">
                <div class="artist-block-content">
                    <div class="artist-block-text">
                        <div class="artist-block-content-headline" id="artist-headline">
                            <?php 
                            echo render_artist_image($first_artist_data['headline_mobile'], 'headline-mobile');
                            echo render_artist_image($first_artist_data['headline_desktop'], 'headline-desktop');
                            ?>
                        </div>

                        <div class="artist-block-content-description">
                            <p id="artist-description"><?php echo nl2br(esc_html($first_artist_data['description'])); ?></p>
                        </div>
                    </div>

                    <?php get_template_part('template-parts/acf-blocks/artist-block/mobile-gallery', null, array('gallery' => $first_artist_data['gallery'])); ?>

                    <?php get_template_part('template-parts/acf-blocks/artist-block/desktop-gallery', null, array('gallery' => $first_artist_data['gallery'])); ?>

                    <div class="artist-block-dotes mobile-dots">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/dotes.svg" alt="dotes">
                    </div>
                </div>
            </div>

            <script type="application/json" id="artists-data">
                <?php echo json_encode($artists_data, JSON_HEX_APOS | JSON_HEX_QUOT); ?>
            </script>
        <?php else: ?>
            <p>No artist posts found.</p>
        <?php endif; ?>
    </div>
    </div>
</div>

<?php 
wp_enqueue_script('artist-navigation-script', get_template_directory_uri() . '/acf-blocks/artist-block/artist-navigation.js', array(), '1.0.0', true);
?>