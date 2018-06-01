<?php

/**
 * Remove Default taxonomies
 */
function remove_taxonomies(){
	global $wp_taxonomies;

	$taxonomies = array( 'category', 'post_tag' );
	foreach( $taxonomies as $taxonomy ) {
		if ( taxonomy_exists( $taxonomy) ){
			unset( $wp_taxonomies[$taxonomy]);
		}
	}
}
add_action( 'init', 'remove_taxonomies');