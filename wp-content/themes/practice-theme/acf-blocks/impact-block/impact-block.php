<?php 
$impact_block_headline = get_field('headline');
$impact_block_description = get_field('description');
$button = get_field('button');
$video = get_field('video');

$template_args = [
    'headline' => $impact_block_headline,
    'description' => $impact_block_description,
    'button' => $button,
    'video' => $video
];

get_template_part('template-parts/acf-blocks/impact-block/impact-block-mobile', null, $template_args);
get_template_part('template-parts/acf-blocks/impact-block/impact-block-desktop', null, $template_args);
?>