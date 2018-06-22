<?php
/**
 * Template Name: Presentation Page
 * Description: All Members
 */

$context = Timber::get_context();

$context['page'] = new Timber\Post();

$context['members'] = array();

$context['categories'] = Timber::get_terms(array(
  'taxonomy' => 'post',
  'parent' => 0
));

foreach ($context['categories'] as $category) {
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
// echo '<pre>';
// print_r($context['page']);
// echo '</pre>';
// exit;
Timber::render( 'members.twig', $context );
 