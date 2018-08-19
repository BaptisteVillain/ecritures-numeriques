<?php
/**
 * The Template for displaying all single taxonomies
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

global $params;

$term = new Term();

$taxonomies = get_taxonomies(array(
  'public' => true,
  '_builtin' => false
));

$context = Timber::get_context();
$context['term'] = $term;

Timber::render( array( 'single-rubric.twig' ), $context );
