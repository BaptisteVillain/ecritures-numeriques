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
    'date_end' => 'DESC'
),
'meta_query' => array(
        array(
            'key' => 'date_end',
            'value' => date('Y-m-d'),
            'compare' => '>=',
            'type' => 'DATE'
        )
    ),
);

$args_past = array(
// Get post type project
'post_type' => 'event',
// Get all posts
'posts_per_page' => -1,
// Order by post date
'orderby' => array(
    'date' => 'DESC'
),
'meta_query' => array(
        array(
            'key' => 'date_end',
            'value' => date('Y-m-d'),
            'compare' => '<=',
            'type' => 'DATE'
        )
    ),
);

$context['events'] = Timber::get_posts( $args );
$context['events_past'] = Timber::get_posts( $args_past );

foreach ($context['events'] as $key => $event) {
  $context['events'][$key]->cover = get_field('cover_image', $event->ID);
}

foreach ($context['events_past'] as $key => $event) {
  $context['events_past'][$key]->cover = get_field('cover_image', $event->ID);
}

// echo '<pre>';
// print_r($context['events']);
// echo '</pre>';
// exit;
Timber::render( 'events.twig', $context );
 