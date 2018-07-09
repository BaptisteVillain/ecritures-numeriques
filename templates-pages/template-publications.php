<?php
/**
 * Template Name: Publications Page
 * Description: All Publications
 */
global $params;
global $post;

$context = Timber::get_context();
$context['page'] = new Timber\Post();

$context['selected'] = array();
if(!empty($context['page']->selected_research_field)){
  $context['selected'] = array_merge($context['selected'], $context['page']->selected_research_field);
}
if(!empty($context['page']->selected_research_topic)){
  $context['selected'] = array_merge($context['selected'], $context['page']->selected_research_topic);
}
if(!empty($context['page']->selected_key_concept)){
  $context['selected'] = array_merge($context['selected'], $context['page']->selected_key_concept);
}
if(!empty($context['page']->selected_axes)){
  $context['selected'] = array_merge($context['selected'], $context['page']->selected_axes);
}


foreach ($context['selected'] as $key => $term) {
  $context['selected'][$key] = new Timber\Term($term);
}


$args = array(
  'post_type' => 'publication',
  'posts_per_page' => -1,
  'meta_query' => array(
    array(
      'key' => 'private',
      'value' => '1',
      'compare' => '!='
    )
  )
);

$context['posts'] = new Timber\PostQuery($args);

Timber::render( 'publications.twig', $context );
