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

$types = array('publication', 'projet', 'event');
foreach ($types as $key => $type) {
  $result = get_posts(
    array(
      'posts_per_page' => -1,
      'post_type' => $type,
      'tax_query' => array(
        array(
          'taxonomy' => $context['term']->taxonomy,
          'field' => 'term_id',
          'terms' => $context['term']->id
        )
      )
    )
  );
  
  foreach ($result as $key => $item) {
    $result[$key]->path = get_permalink($item->ID);
  }
  if(!empty($result)){
    $context['term']->related[] = $result;
  }
}

// echo '<pre>';
// print_r($context['term']->related);
// echo '</pre>';

Timber::render( array( 'taxonomy.twig' ), $context );
