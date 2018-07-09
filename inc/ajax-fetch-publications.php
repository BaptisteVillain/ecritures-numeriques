<?php

/**
 * Ajax Publications
 */


function fetch_publications() {

  $filter = $_POST['filter'];

  if($filter['taxonomy'] !== '' || $filter['slug'] !== ''){
    $posts = new Timber\PostQuery(array(
      'post_type' => 'publication',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'tax_query' => array(
        array(
          'taxonomy' => $filter['taxonomy'],
          'field' =>  'slug',
          'terms' =>  $filter['slug']
        )
      )
    ));
  } else {
    $posts = new Timber\PostQuery(array(
      'post_type' => 'publication',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'meta_query' => array(
        array(
          'key' => 'private',
          'value' => '1',
          'compare' => '!='
        )
      )
    ));
  }

  $response = array();

  $context['posts'] = $posts;
  $response['posts'] = Timber::compile('partials/publications-content.twig', $context);

  wp_send_json_success($response);
  wp_die();
}


add_action( 'wp_ajax_fetch_publications', 'fetch_publications', 100 );
add_action( 'wp_ajax_nopriv_fetch_publications', 'fetch_publications', 100 );
