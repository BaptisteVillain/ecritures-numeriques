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

foreach ($types as $type) {
  $context['results'][] = new Timber\PostQuery(array(
    'post_type' => $type,
    's' => get_search_query(),
		'posts_per_page' => -1,
  ));
}


/**
 * Get all taxonmies terms as filters
 */
$context['filters'] = array();

$taxonomies = get_taxonomies(array(
  'public' => true,
  '_builtin' => false
));

foreach ($taxonomies as $taxonomy) {
  $context['filters'][] = Timber::get_terms(array(
    'taxonomy' => $taxonomy,
    'hide_empty' => false,
  ));
}


Timber::render( 'search.twig', $context );
