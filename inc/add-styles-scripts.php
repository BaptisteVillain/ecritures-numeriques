<?php
// Enqueue scripts
function my_scripts() {

	global $post;

	// Use jQuery from a CDN
	wp_deregister_script('jquery');
	wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', array(), null, true);
	wp_enqueue_style( 'my-styles', get_template_directory_uri() . '/assets/public/css/main.min.css', 1.0);
	wp_enqueue_script( 'my-js', get_template_directory_uri() . '/assets/public/js/main.min.js', array('jquery'), '1.0.0', true );
	wp_localize_script('my-js', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
	wp_localize_script('my-js', 'vars', array(
		'postID' => $post->ID,
		'postDate' => $post->date_create,
	));

	if(!empty(get_search_query())){
		wp_localize_script('my-js', 'searchquery', get_search_query());
	}
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

