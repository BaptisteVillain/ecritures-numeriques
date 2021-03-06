<?php
/**
 * Template Name: Rubrics Page
 * Description: All Rubrics
 */

$context = Timber::get_context();
$context['page'] = Timber::query_post();


$context['rubrics'] =  array();
$taxonomies = array('research_field',  'axis', 'research_topic', 'key_concept');

foreach ($taxonomies as $key => $taxonomy) {
  $terms = Timber::get_terms(array(
    "taxonomy" => $taxonomy,
    "hide_empty" => false
  ));
  foreach ($terms as $key => $term) {
    $terms[$key]->path = get_term_link((int)$term->id);
  }
  $context['rubrics'][] = $terms;
}

Timber::render( 'rubrics.twig', $context );
 