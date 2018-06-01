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
	$posts = Timber::get_posts(array(
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

	// $return['posts'] = $posts;	
	
	if($posts){
		foreach($posts as $post){

			$context['post'] = $post;

			$context['authors'] = get_posts(array(
				'post_type' => 'member',
				'post__in' => $post->custom['authors'],
			));
			
			$research_field = wp_get_post_terms($post->id, 'research_field');
			$context['research_field'] = $research_field[0];
			$context['tags'] = wp_get_post_terms($post->id, array('research_topic', 'axis', 'key_concept'));
			
			$context['discovers'] = [];			
			if($post->custom['relation_publication_publication']){
				$discovers =  get_posts(array(
					'post_type' => 'publication',
					'post__in' => $post->custom['relation_publication_publication'],
					'posts_per_page' => 3	
				));
				
				foreach ($discovers as $key => $publication) {
					$list_authors = get_post_meta($publication->ID, 'publication_authors', false);
					$authors = get_posts(array(
						'post_type' => 'member',
						'post__in' => $list_authors[0]
					));
					$discovers[$key]->authors = $authors;
				
					$research_field = wp_get_post_terms($publication->ID, 'research_field');
					$discovers[$key]->research_field = $research_field[0];
				
					$parse = parse_url($publication->url);
					$discovers[$key]->domain = $parse['host'];
				}
				
				$context['discovers'] = $discovers;
			}
			$return['posts'][] = array(
				'content' => Timber::compile('partials/single-publication-content.twig', $context)
		);
		}
	} else {
		$return = "nomore";
	}
	
	wp_send_json_success($return);
	wp_die();
} 
add_action( 'wp_ajax_publication_load_more', 'publication_load_more' );
add_action( 'wp_ajax_nopriv_publication_load_more', 'publication_load_more' );
