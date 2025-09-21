<?php
function artist_post_type() {
    $labels = array(
        'name' => 'Artist',
        'singular_name' => 'Artist',
        'menu_name' => 'Artist',
        'name_admin_bar' => 'Artist',
        'add_new' => 'Add New',
            'add_new_item' => 'Add New Artist',
            'new_item' => 'New Artist',
            'edit_item' => 'Edit Artist',
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => 'artist',
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'artist'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-admin-users',
    );

    register_post_type('artist', $args);
}
add_action('init', 'artist_post_type');

function artist_rewrite_flush() {
    artist_post_type();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'artist_rewrite_flush');
