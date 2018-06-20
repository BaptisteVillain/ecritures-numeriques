<?php

/**
 * Ajax Search filters
 */


function search_filters() {

  $query = $_POST['query'];
  $filters = $_POST['filters'];

  $args = array();
  $args['s'] = $query;
  $args['posts_per_page'] = -1;

  if(!empty($filters)){
    $args['tax_query'] = array();
  
    if(count($filters) >= 2){
      $args['tax_query']['relation'] = 'AND';
    }
  
    foreach ($filters as $filter) {
      $args['tax_query'][] = array(
        'taxonomy' => $filter['taxonomy'],
        'field' => 'slug',
        'terms' => $filter['slug']
      );
    }
  }

  $types = array('publication', 'project', 'event', 'member');

  $results = [];
  foreach ($types as $type) {
    $args['post_type'] = $type;
    $results[] = new Timber\PostQuery($args, Publication);
  }

  $response = array();
  if($results){
    
    $response['results'] = array();
    foreach ($results as $key => $result) {
      $response['results'][] = array();
      foreach ($result as $post) {
        $context['post'] = $post;
        $response['results'][$key][] = Timber::compile('partials/card-result.twig', $context);
      }
    }

    $response['available_filters'] = array();
    foreach ($results as $key => $result) {
      foreach ($result as $post) {
        foreach ($post->terms as $term) {
          if(!in_array($term->slug, $response['available_filters'])){
            $response['available_filters'][] = $term->slug;
          }
        }
      }
    }
  }

  $response['args'] = $args;

  wp_send_json_success($response);
  wp_die();
}


add_action( 'wp_ajax_search_filters', 'search_filters', 100 );
add_action( 'wp_ajax_nopriv_search_filters', 'search_filters', 100 );
