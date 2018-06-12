<?php

function custom_posts_menu() {
	remove_menu_page('edit.php');
  remove_menu_page('edit-comments.php');
  
	// $post_type = array(
	// 	'publication',
	// 	'event',
	// 	'project'
	// );
	
	// $taxonomies = array(
	// 	'axis',
	// 	'research_field',
	// 	'research_topic',
	// 	'key_concept'
	// );

	// foreach ($post_type as $key => $type) {
	// 	foreach ($taxonomies as $key => $taxo) {
	// 		remove_submenu_page( 'edit.php?post_type='.$type.'', 'edit-tags.php?taxonomy='.$taxo.'&amp;post_type='.$type.'' );
	// 	}
	// }
}
add_action('admin_menu', 'custom_posts_menu');


/**
 * Menu Order
 */
function custom_menu_order() {
	return array( 
		'index.php',
		'edit.php?post_type=publication',
		'edit.php?post_type=event',
		'edit.php?post_type=project',
		'edit.php?post_type=member',
		'edit.php?post_type=research_field',
		'edit.php?post_type=research_topic',
		'edit.php?post_type=key_concept',
		'edit.php?post_type=axis',
	);
}

add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'custom_menu_order' );
