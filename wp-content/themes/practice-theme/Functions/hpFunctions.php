<?php
// Register the custom block when WordPress is initializing
add_action('init', 'register_my_custom_block');

function register_my_custom_block()
{
    // Register the block with WordPress using register_block_type()
    // 'render_callback' specifies the function to render the block content
    register_block_type('mytheme/section1', array(
        'render_callback' => 'render_my_custom_block', // Function to render the block content
    ));
}

// Callback function that renders the block content
function render_my_custom_block($attributes)
{
    // Retrieve ACF custom fields for the block
    // 'headline' is the custom field for the headline
    $headline = get_field('headline');

    // 'description' is the custom field for the description
    $description = get_field('description');

    // 'background_image' is the custom field for the background image
    $background_image = get_field('background_image');

    // Start the HTML output for the block
    $output = "<div class='my-custom-block'>";

    // If there's a background image, output the image HTML
    if ($background_image) {
        $output .= "<div class='my-custom-block-image'>";
        $output .= wp_get_attachment_image($background_image['ID'], 'large'); // Display image
        $output .= "</div>";
    }

    // If there's a headline, output the headline HTML
    if ($headline) {
        $output .= "<h2 class='my-custom-block-headline'>" . esc_html($headline) . "</h2>";
    }

    // If there's a description, output the description HTML
    if ($description) {
        $output .= "<p class='my-custom-block-description'>" . esc_html($description) . "</p>";
    }

    // Close the block's HTML container
    $output .= "</div>";

    // Return the final HTML content for the block
    return $output;
}


//section 3
