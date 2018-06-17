<?php
/**
 * Template Name: Events Page
 * Description: All Events
 */

$context = Timber::get_context();

$args = array(
// Get post type project
'post_type' => 'event',
// Get all posts
'posts_per_page' => -1,
// Order by post date
'orderby' => array(
    'date' => 'DESC'
));

$context['events']->custom['image_url'] = get_field('cover_image', $context['events']->ID);


$context['events'] = Timber::get_posts( $args );

// echo '<pre>';
// print_r($context['events']);
// echo '</pre>';
// exit;
Timber::render( 'events.twig', $context );
 