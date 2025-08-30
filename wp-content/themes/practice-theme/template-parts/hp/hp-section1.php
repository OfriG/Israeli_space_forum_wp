<?php
$args = array(
    'post_type' => 'page',
    'post_title' => 'hp',
    'posts_per_page' => 1
);

$hp_page_query = new WP_Query($args);

if ($hp_page_query->have_posts()) {
    $hp_page_query->the_post();
    $hp_page_id = get_the_ID();
} else {
    echo 'not found';

    exit;
}

wp_reset_postdata();

?>

<div class="section1" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/footerMobileBackground.png');">
    <div class="shape-future-content">
        <h1>
            <?php
            $title = get_field('section1_headline', $hp_page_id);
            if ($title) {
                $title_lines = explode("\n", $title);
                $last_line = array_pop($title_lines);
                $first_part = implode("\n", $title_lines);
                echo wp_kses_post(nl2br($first_part));
                echo '<span class="gradient-text">' . esc_html($last_line) . '</span>';
            } else {
                echo 'usgdew';
            }
            ?>
        </h1>


        <div class="shape-future-text">
            <p>
                <?php
                $description = get_field('section1_description', $hp_page_id);
                if ($description) {
                    echo wp_kses_post($description);
                } else {
                    echo 'usgdew';
                }
                ?>
            </p>
        </div>
        <div class="joinud-btn">
            <?php
            $button = get_field('section1_button', $hp_page_id);
            if ($button) {
                echo wp_kses_post($button);
            } else {
                echo 'usgdew';
            }
            ?>
        </div>
    </div>
</div>