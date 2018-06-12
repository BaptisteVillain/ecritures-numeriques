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

$templates = array( 'search.twig', 'archive.twig', 'index.twig' );
$context = Timber::get_context();

$context['title'] = 'Search results for '. get_search_query();
$context['posts'] = Timber::get_posts();

$context['results'] = array();

$types = array('publication', 'project', 'event', 'member');

foreach ($types as $type) {
  $context['results'][] = Timber::get_posts(array(
    'post_type' => $type,
    's' => get_search_query()
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
  $context['filters'][] = get_terms(array(
    'taxonomy' => $taxonomy,
    'hide_empty' => false,
  ));
}

// echo '<pre>';
// print_r($context['results']);
// echo '</pre>';

Timber::render( $templates, $context );
