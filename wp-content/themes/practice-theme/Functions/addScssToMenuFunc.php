<?php
function add_cta_class_to_menu_items($classes, $item, $args) {
    if ($args->theme_location === 'main-menu') {
        // Add 'cta' class to menu items with specific titles
        $cta_titles = array('Join-us', 'join us', 'JOIN US', 'Join Us');
        
        if (in_array(strtolower($item->title), array_map('strtolower', $cta_titles))) {
            $classes[] = 'cta';        }  
    }
    
    return $classes;
}
add_filter('nav_menu_css_class', 'add_cta_class_to_menu_items', 10, 3);
?>