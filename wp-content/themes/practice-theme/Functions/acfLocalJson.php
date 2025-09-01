<?php


function practice_theme_init_acf_json() {
    if (!function_exists('acf_get_setting')) {
        return;
    }
    
    add_filter('acf/settings/save_json', function($path) {
        return get_stylesheet_directory() . '/acf-json';
    });

    add_filter('acf/settings/load_json', function($paths) {
        unset($paths[0]);
        
        $paths[] = get_stylesheet_directory() . '/acf-json';
        
        return $paths;
    });
    
    add_filter('acf/json/save_file_name', function($filename, $post, $load_path) {
        $filename = str_replace(
            array(' ', '_'),
            array('-', '-'),
            $post['title']
        );
        
        $filename = strtolower($filename) . '.json';
        
        return $filename;
    }, 10, 3);
}
add_action('acf/init', 'practice_theme_init_acf_json');
