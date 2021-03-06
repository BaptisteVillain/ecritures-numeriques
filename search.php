<?php
/**
 * Search results page
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$context = Timber::get_context();


$context['results'] = array();

$types = array('publication', 'project', 'event', 'member');

if(get_search_query() !== '' && !empty(get_search_query())){
  foreach ($types as $type) {
    $context['results'][] = new Timber\PostQuery(array(
      'post_type' => $type,
      's' => get_search_query(),
      'posts_per_page' => -1,
    ));
  }
} else {
  foreach ($types as $type) {
    $context['results'][] = array();
  }
}




/**
 * Get all taxonmies terms as filters
 */
$context['filters'] = array();

$taxonomies = array('research_field', 'research_topic', 'key_concept', 'axis');

foreach ($taxonomies as $taxonomy) {
  $context['filters'][] = Timber::get_terms(array(
    'taxonomy' => $taxonomy,
    'hide_empty' => false,
  ));
}

/**
 * Get all available filters
 */
$context['available_filters'] = array();

foreach ($context['results'] as $key => $result) {
  foreach ($result as $post) {
    foreach ($post->terms as $term) {
      if(!in_array($term->slug, $context['available_filters'])){
        $context['available_filters'][] = $term->slug;
      }
    }
  }
}

$context['count'] = 0;
foreach ($context['results'] as $result) {
  $context['count'] += count($result);
}


Timber::render( 'search.twig', $context );
