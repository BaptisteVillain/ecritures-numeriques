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

			$query = new WP_Query($args);
			
			if($query->have_posts()){
				while ($query->have_posts()) {
					$query->the_post();
					update_field('field_5ab8ba4dd78d9', false, get_the_ID());
				}
			}
		}
		}
	}
}
add_action('acf/save_post', 'check_save_event', 1);
