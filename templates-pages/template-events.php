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

$context['events'] = Timber::get_posts( $args );

foreach ($context['events'] as $key => $event) {
  $context['events'][$key]->cover = get_field('cover_image', $event->ID);
}

// echo '<pre>';
// print_r($context['events']);
// echo '</pre>';
// exit;
Timber::render( 'events.twig', $context );
 