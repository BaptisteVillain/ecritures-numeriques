<?php
/**
 * Template Name: Presentation Page
 * Description: All Members
 */

$context = Timber::get_context();

$context['members'] = array();

$categories = Timber::get_terms(array(
  'taxonomy' => 'post',
  'parent' => 0
));

foreach ($categories as $category) {
  $context['members'][] = new Timber\PostQuery(array(
    'post_type' => 'member',
    'tax_query' => array(
      array(
        'taxonomy' => 'post',
        'field' => 'slug',
        'terms' => $category->slug
      )
    )
  ));
}

$context['categories'] = $categories;

Timber::render( 'members.twig', $context );
 