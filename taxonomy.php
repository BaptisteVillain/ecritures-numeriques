<?php
/**
 * The Template for displaying all single taxonomies
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

global $params;

$term = new Term($params['term']);

$taxonomies = get_taxonomies(array(
  'public' => true,
  '_builtin' => false
));

if(!$params['term'] || empty($term->name) || !in_array($term->taxonomy, $taxonomies))
{
  Timber::render( '404.twig', $context );
  exit;
}

$context = Timber::get_context();
$context['term'] = $term;

Timber::render( array( 'single-rubric.twig' ), $context );
