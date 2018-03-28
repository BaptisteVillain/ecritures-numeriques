<?php
/**
 * Template Name: Front Page
 * Description: Front page
 */

$context = Timber::get_context();

/**
 * Get last publications
 */
$context['publications'] = Timber::get_posts(array(
  'post_type' => 'publication',
  'posts_per_page' => 3
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
  $args = array(
    'post_type' => 'event',
    'posts_per_page' => 5
  );
} else {
  $args = array(
    'post_type' => 'event',
    'posts_per_page' => 4,
    'meta_query' => array(
      array(
        'key' => 'highlight_event',
        'value' => '1',
        'compare' => '!='
      )
    )
  );
}
/**
 * Get last events
 */
$context['events'] = Timber::get_posts($args);

if(count($context['highlighted_event']) < 1){
  $context['highlighted_event'] = array();
  $context['highlighted_event'][] = $context['events'][0];
  array_shift($context['events']);
}

Timber::render( 'front-page.twig', $context );