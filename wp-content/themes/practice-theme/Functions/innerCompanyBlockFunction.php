<?php
function innerCompany_post_type() {
    $labels = array(
        'name' => 'Inner Company',
        'singular_name' => 'Inner Company',
        'menu_name' => 'Inner Company',
        'name_admin_bar' => 'Inner Company',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Inner Company',
        'new_item' => 'New Inner Company',
        'edit_item' => 'Edit Inner Company',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => 'inner-company',
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'inner-company'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-admin-users',
    );

    register_post_type('inner_company', $args);
}
add_action('init', 'innerCompany_post_type');

function innerCompany_rewrite_flush() {
    innerCompany_post_type();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'innerCompany_rewrite_flush');
