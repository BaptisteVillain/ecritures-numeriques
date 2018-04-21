<?php
/**
 * Template Name: Rubrics Page
 * Description: All Rubrics
 */

$context = Timber::get_context();


$context['rubrics'] =  array();
$taxonomies = array('research_field', 'research_topic', 'key_concept', 'axis');

foreach ($taxonomies as $key => $taxonomy) {
  $context['rubrics'][] = Timber::get_terms($taxonomy);
}

Timber::render( 'rubrics.twig', $context );
 