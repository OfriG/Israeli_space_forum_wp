<?php
if (!defined('ABSPATH')) {
    exit; 
}

function render_artist_image($image, $class_name, $alt_text = '') {
    if (!$image) return '';
    
    if (is_array($image) && !empty($image['url'])) {
        return '<img class="' . esc_attr($class_name) . '" src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt'] ?? $alt_text) . '" loading="lazy">';
    } elseif (is_numeric($image)) {
        return wp_get_attachment_image($image, 'full', false, array('class' => $class_name, 'loading' => 'lazy'));
    } elseif (filter_var($image, FILTER_VALIDATE_URL)) {
        return '<img class="' . esc_attr($class_name) . '" src="' . esc_url($image) . '" alt="' . esc_attr($alt_text) . '" loading="lazy">';
    }
    return '';
}

function get_artist_data($post_id) {
    return array(
        'id' => $post_id,
        'headline_mobile' => get_field('headline_image_mobile', $post_id),
        'headline_desktop' => get_field('headline_image_desktop', $post_id),
        'description' => get_field('description', $post_id),
        'gallery' => is_array(get_field('gallery', $post_id)) ? get_field('gallery', $post_id) : array()
    );
}
