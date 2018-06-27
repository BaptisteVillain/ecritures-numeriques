<?php
/**
 * Template Name: Events Page
 * Description: All Events
 */

$context = Timber::get_context();

// Request for only upcoming events
$args = array(
// Get post type event
'post_type' => 'event',
// Get all posts
'posts_per_page' => -1,
// Order by post end date
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

// Request for only past events
$args_past = array(
// Get post type event
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

// Request for only highlighted events
$args_highlight = array(
// Get post type event
'post_type' => 'event',
// Get all posts
'posts_per_page' => -1,
// Order by highlighted events
'orderby' => 'highlight_event',
'meta_query' => array(
        array(
            'key' => 'highlight_event',
            'value' => '1',
            'compare' => '=',
            'type' => 'BOOLEAN'
        )
    ),
);

$context['events'] = new Timber\PostQuery( $args );
$context['events_past'] = new Timber\PostQuery( $args_past );
$context['events_highlight'] = new Timber\PostQuery( $args_highlight );

Timber::render( 'events.twig', $context );
 