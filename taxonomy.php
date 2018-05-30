<?php
/**
 * The Template for displaying all single taxonomies
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$context['term'] = new TimberTerm();

$context['term']->description = term_description($context['term']->term_id);

$context['term']->related = []; 

/**
 * Get Related Publications, projects and events
 */
$types = array('publication', 'project', 'event');
foreach ($types as $key => $type) {

  $args = array(
  'posts_per_page' => -1,
  'post_type' => $type,
  'tax_query' => array(
    array(
      'taxonomy' => $context['term']->taxonomy,
      'field' => 'term_id',
      'terms' => $context['term']->id
    )
  ));

  if($type === 'publication'){
    $args['meta_query'] = array(
      array(
        'key' => 'private',
        'compare' => '!=',
        'value' => '1'
      )
    );
  }

  $result = get_posts($args);
  
  foreach ($result as $key => $item) {
    $result[$key]->path = get_permalink($item->ID);
  }

  if(!empty($result)){
    $context['term']->related[] = $result;
  }
}

/**
 * Get previous and next taxonomies
 */

$taxonomies = array('research_field',  'axis', 'research_topic', 'key_concept');
$terms = array();
foreach ($taxonomies as $key => $taxonomy) {
  $term = get_terms(array(
    "taxonomy" => $taxonomy,
    "hide_empty" => false
  ));

  $terms = array_merge($terms, $term);
}

$index = 0;
foreach ($terms as $key => $term) {
  if($term->slug == $context['term']->slug){
    $index = $key;
  }
}

if($index > 0){
  $context['previous'] = $terms[$index - 1];
}
else {
  $context['previous'] = $terms[count($terms) - 1];  
}

if ($index < count($terms) - 1) {
  $context['next'] = $terms[$index + 1];
}
else{
  $context['next'] = $terms[0];
}

$context['next']->path = get_term_link($context['next']->term_id);
$context['previous']->path = get_term_link($context['previous']->term_id);

Timber::render( array( 'single-rubrique.twig' ), $context );
