<?php
/**
 * Template Name: Publications Page
 * Description: All Publications
 */
global $params;
global $post;

$context = Timber::get_context();
$context['page'] = new Timber\Post(7475);

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

function get_selected($slug, $array){
  foreach ($array as $key => $term) {
    if($term->slug === $slug){
      return $term;
    }
  }

  return false;
}

$context['term'] = get_selected($params['term'], $context['selected']);

if(!$context['term']){
  $args = array(
    'post_type' => 'publication',
    'posts_per_page' => -1
  );
} else {
  $args = array(
    'post_type' => 'publication',
    'posts_per_page' => -1,
    'tax_query' => array(
      array(
        'taxonomy' => $context['term']->taxonomy,
        'field' =>  'slug',
        'terms' =>  $context['term']->slug
      )
    )
  );
}

$context['posts'] = new Timber\PostQuery($args);

echo '<pre>';
print_r($context['selected']);
echo '</pre>';

Timber::render( 'publications.twig', $context );
