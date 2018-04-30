<?php
/**
 * Template Name: Front Page
 * Description: Front page
 */

$context = Timber::get_context();


/**
 * Links
 */

 $context['path_rubrics'] = get_permalink(7460);


/**
 * Get Page Fields
 */
 $context['page'] = $post;

/**
 * Get last publications
 */
$context['publications'] = Timber::get_posts(array(
  'post_type' => 'publication',
  'posts_per_page' => 3
));

foreach ($context['publications'] as $key => $publication) {
  $terms = Timber::get_terms($taxonomy);
  $context['publications'][$key]->terms = wp_get_post_terms($publication->ID, array('research_field'));

  $context['publications'][$key]->authors = get_posts(array(
    'post_type' => 'member',
    'post__in' => $$publication->publication_authors
  ));  
}

/**
 * Get last projects
 */
$sens_public = Timber::get_posts(array(
  'name' => 'sens_public',
  'post_type' => 'project',
  'posts_per_page' => 1,
));

$projects = Timber::get_posts(array(
  'post_type' => 'project',
  'posts_per_page' => empty($sens_public) ? 3 : 2,
  'meta_query' => array(
    'key' => 'slug',
    'value' => 'sens_public',
    'compare' => '!='
  )
));
$context['projects'] = array_merge($sens_public, $projects);


/**
 * Get highlighted event
 */
$context['highlighted_event'] = Timber::get_posts(array(
  'post_type' => 'event',
  'posts_per_page' => 1,
  'meta_query' => array(
    array(
      'key' => 'highlight_event',
      'value' => '1',
      'compare' => '=='
    )
  )
));

if(count($context['highlighted_event']) < 1){
  $args = array(
    'post_type' => 'event',
    'posts_per_page' => 5
  );
} else {
  $args = array(
    'post_type' => 'event',
    'posts_per_page' => 4,
    'meta_query' => array(
      array(
        'key' => 'highlight_event',
        'value' => '1',
        'compare' => '!='
      )
    )
  );
}

/**
 * Get last events
 */
$context['events'] = Timber::get_posts($args);

if(count($context['highlighted_event']) < 1){
  $context['highlighted_event'] = array();
  if(!empty($context['events'][0])){
    $context['highlighted_event'][] = $context['events'][0];
  }
  array_shift($context['events']);
}

if(!empty($context['events'][0])){
  $context['highlighted_event'][0]->cover = get_field('cover_image', $context['highlighted_event'][0]->ID);
  $context['highlighted_event'][0]->tags = wp_get_post_terms($context['highlighted_event'][0]->ID, array('research_field','axis','research_topic','key_concept'));
}

foreach ($context['events'] as $key => $event) {
  $context['events'][$key]->cover = get_field('cover_image', $event->ID);
}

/**
 * Get All Taxonomies terms
 */
$context['rubrics'] =  array();
$taxonomies = array('research_field',  'axis', 'research_topic', 'key_concept');

foreach ($taxonomies as $key => $taxonomy) {
  $terms = Timber::get_terms(array(
    "taxonomy" => $taxonomy,
    "hide_empty" => false
  ));
  $context['rubrics'][] = $terms;
}


/**
 * Get Youtube Video
 */
$id = 'UC5LIw0dopbSSgqI2zdIi84w';
$key = 'AIzaSyB2z9bqaFVRYupNp5tDv2NTpdh0dLYucy0';
$url = 'https://www.googleapis.com/youtube/v3/search?order=date&part=id&maxResults=3&type=video&eventType=completed&channelId='.$id.'&key='.$key;
$response = json_decode(file_get_contents($url), true);
$videos = $response['items'];

$ids = array();
foreach ($videos as $id) {
  $ids[] = $id['id']['videoId'];
}

$ids = implode($ids, ',');
$url = 'https://www.googleapis.com/youtube/v3/videos?part=snippet,statistics&id='.$ids.'&key='.$key;

$data[] = json_decode(file_get_contents($url), true);

$context['videos'] = $data[0]['items'];


/**
 * Get current live
 */
$id = 'UC5LIw0dopbSSgqI2zdIi84w';
$url = 'https://www.googleapis.com/youtube/v3/search?order=date&part=id&maxResults=1&type=video&eventType=live&channelId='.$id.'&key='.$key;
$response = json_decode(file_get_contents($url), true);
$live = $response['items'];

if(!empty($live)){
  $url = 'https://www.googleapis.com/youtube/v3/videos?part=snippet,statistics&id='.$live[0]['id']['videoId'].'&key='.$key;
  $context['live'] = json_decode(file_get_contents($url), true);
}
else{
  $context['live'] = false;
}

Timber::render( 'front-page.twig', $context);