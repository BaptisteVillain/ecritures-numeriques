<?php

	/**
 * AJAX Load More 
 */
function publication_load_more() {

	$return = [];

	$return['post_id'] = $_POST['post_id'];
	$return['date']    = $_POST['post_date'];
	$return['page']    = $_POST['page'];


	$return['posts'] = [];	
	$posts = new Timber\PostQuery(array(
		'post_type' => 'publication',
		'post_status' => 'publish',
		'date_query'    => array(
			'column'  => 'post_date',
			'before'   => $_POST['post_date']
		),
		'posts_per_page' => 8,
		'paged' => $_POST['page'],
		'post__not_in' => array($_POST['post_id'])
	));
	
	if($posts){
		foreach($posts as $post){

			$context['post'] = $post;

			$return['posts'][] = array(
				'content' => Timber::compile('partials/single-publication-content.twig', $context)
		);
		}
	} else {
		wp_send_json_fail('no more post');
	}
	
	wp_send_json_success($return);
	wp_die();
} 
add_action( 'wp_ajax_publication_load_more', 'publication_load_more' );
add_action( 'wp_ajax_nopriv_publication_load_more', 'publication_load_more' );
