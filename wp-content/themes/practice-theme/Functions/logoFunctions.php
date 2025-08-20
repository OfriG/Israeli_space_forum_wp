
<?php
// Custom Post Type for logo
function create_logo_post_type()
{
    register_post_type('logo_settings', array(
        'labels' => array(
            'name' => 'Logo Settings',
            'singular_name' => 'Logo Setting',
            'add_new' => 'Add New Logo',
            'edit_item' => 'Edit Logo Setting',
        ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 25,
        'menu_icon' => 'dashicons-format-image',
        'supports' => array('title'),
    ));
}
add_action('init', 'create_logo_post_type');



// Get site logo
function get_site_logo()
{
    // Check if ACF is active
    if (!function_exists('get_field')) {
        return false;
    }

    // 1. Check ACF Options page for site_logo field
    $logo = get_field('site_logo', 'option');
    if ($logo && isset($logo['url'])) {
        return $logo;
    }

    // 2. Check WordPress customizer
    $custom_logo_id = get_theme_mod('custom_logo');
    if ($custom_logo_id) {
        $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
        if ($logo_url) {
            return array('url' => $logo_url, 'alt' => get_bloginfo('name'));
        }
    }

    // 3. Search in Custom Post Type
    $logo_posts = get_posts(array(
        'post_type' => 'logo_settings',
        'post_status' => 'publish',
        'numberposts' => 1,
        'orderby' => 'date',
        'order' => 'DESC'
    ));

    if (!empty($logo_posts)) {
        $logo = get_field('site_logo', $logo_posts[0]->ID);
        if ($logo && isset($logo['url'])) {
            return $logo;
        }
    }

    // 4. Check for any ACF field named 'logo' or 'site_logo' on any page
    global $wpdb;
    $meta_value = $wpdb->get_var(
        "SELECT meta_value FROM {$wpdb->postmeta} 
         WHERE meta_key IN ('site_logo', 'logo') 
         AND meta_value LIKE '%{\"url\"%' 
         LIMIT 1"
    );

    if ($meta_value) {
        $logo_data = maybe_unserialize($meta_value);
        if (is_array($logo_data) && isset($logo_data['url'])) {
            return $logo_data;
        }
    }

    return false;
}

// Display site logo
function display_site_logo()
{
    $logo = get_site_logo();
    if ($logo && isset($logo['url'])) {
        $alt = !empty($logo['alt']) ? $logo['alt'] : get_bloginfo('name');
        echo '<a href="' . esc_url(home_url('/')) . '">';
        echo '<img src="' . esc_url($logo['url']) . '" alt="' . esc_attr($alt) . '">';
        echo '</a>';
    } else {
        // Fallback: site name as text
        echo '<a href="' . esc_url(home_url('/')) . '">';
        echo '<h1>' . get_bloginfo('name') . '</h1>';
        echo '</a>';
    }
}
