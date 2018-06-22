<?php

function check_save_event($post_id){
	
	$fields = false;

	if(get_post_type($post_id) === 'event'){
		if(isset($_POST['acf'])){
		
		$fields = $_POST['acf'];
		$highlighted = $fields[field_5ab8ba4dd78d9];


		if($highlighted){

			$args = array(
				'post_type' => 'event',
				'posts_per_page' => -1,
				'meta_query' => array(
					array(
						'key' => 'highlight_event',
						'value' => '1',
						'compare' => '=='
					)
				),
			);

			$posts = new Timber\PostQuery($args);
			
			if($posts){
				foreach($posts as $post){
					if($post_id !== $post->ID){
						update_field('field_5ab8ba4dd78d9', false, $post->ID);
					}
				}
			}
		}
		}
	}
}
add_action('acf/save_post', 'check_save_event', 1);
