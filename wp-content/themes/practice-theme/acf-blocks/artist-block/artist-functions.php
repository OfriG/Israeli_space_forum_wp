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
    $headline_mobile = get_field('headline_image_mobile', $post_id);
    $headline_desktop = get_field('headline_image_desktop', $post_id);
    
    // Convert attachment IDs to image URLs for JavaScript
    $headline_mobile_url = '';
    $headline_desktop_url = '';
    
    if (is_numeric($headline_mobile)) {
        $headline_mobile_url = wp_get_attachment_url($headline_mobile);
    } elseif (is_array($headline_mobile) && !empty($headline_mobile['url'])) {
        $headline_mobile_url = $headline_mobile['url'];
    } elseif (filter_var($headline_mobile, FILTER_VALIDATE_URL)) {
        $headline_mobile_url = $headline_mobile;
    }
    
    if (is_numeric($headline_desktop)) {
        $headline_desktop_url = wp_get_attachment_url($headline_desktop);
    } elseif (is_array($headline_desktop) && !empty($headline_desktop['url'])) {
        $headline_desktop_url = $headline_desktop['url'];
    } elseif (filter_var($headline_desktop, FILTER_VALIDATE_URL)) {
        $headline_desktop_url = $headline_desktop;
    }
    
    return array(
        'id' => $post_id,
        'headline_mobile' => $headline_mobile_url,
        'headline_desktop' => $headline_desktop_url,
        'description' => get_field('description', $post_id),
        'gallery' => is_array(get_field('gallery', $post_id)) ? get_field('gallery', $post_id) : array()
    );
}
