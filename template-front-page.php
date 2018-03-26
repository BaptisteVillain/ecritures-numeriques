<?php
/**
 * Template Name: Front Page
 * Description: Front page
 */

$context = Timber::get_context();

/**
 * Get last publications
 */
$context['posts'] = Timber::get_posts(array(
  'post_type' => 'publication',
  'posts_per_page' => 5,
));

/**
 * Get last projects
 */
$context['projects'] = Timber::get_posts(array(
  'post_type' => 'project',
  'posts_per_page' => 3,
));

/**
 * Get highlighted event
 */
$context['highlighted_event'] = Timber::get_posts(array(
  'post_type' => 'event',
  'posts_per_page' => 1,
  'meta_query' => array(
    array(
      'key' => 'highlight_event',
      'value' => '1',
      'compare' => '=='
    )
  )
));

if(count($context['highlighted_event']) < 1){
  $events_count = 3;
} else {
  $events_count = 2; 
}

/**
 * Get last events
 */
$context['events'] = Timber::get_posts(array(
  'post_type' => 'event',
  'posts_per_page' => $events_count,
));


Timber::render( 'front-page.twig', $context );