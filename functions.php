<?php

// If the Timber plugin isn't activated, print a notice in the admin.
if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		} );
	return;
}


// Create our version of the TimberSite object
class StarterSite extends TimberSite {

	// This function applies some fundamental WordPress setup, as well as our functions to include custom post types and taxonomies.
	function __construct() {
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		add_action( 'init', array( $this, 'register_menus' ) );
		add_action( 'init', array( $this, 'register_widgets' ) );
		parent::__construct();
	}


	// Abstracting long chunks of code.

	// The following included files only need to contain the arguments and register_whatever functions. They are applied to WordPress in these functions that are hooked to init above.

	// The point of having separate files is solely to save space in this file. Think of them as a standard PHP include or require.

	function register_post_types(){
		require('lib/custom-types.php');
	}

	function register_taxonomies(){
		require('lib/taxonomies.php');
	}

	function register_menus(){
		require('lib/menus.php');
	}

	function register_widgets(){
		require('lib/widgets.php');
	}


	// Access data site-wide.

	// This function adds data to the global context of your site. In less-jargon-y terms, any values in this function are available on any view of your website. Anything that occurs on every page should be added here.

	function add_to_context( $context ) {

		// Our menu occurs on every page, so we add it to the global context.
		$context['menu'] = new TimberMenu('header-menu');
		$context['language'] = new TimberMenu('language-switch');

		// This 'site' context below allows you to access main site information like the site title or description.
		$context['site'] = $this;
		return $context;
	}

	// Here you can add your own fuctions to Twig. Don't worry about this section if you don't come across a need for it.
	// See more here: http://twig.sensiolabs.org/doc/advanced.html
	function add_to_twig( $twig ) {
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter( 'myfoo', new Twig_Filter_Function( 'myfoo' ) );
		return $twig;
	}

}

new StarterSite();


/*
 *
 * My Functions (not from Timber)
 *
 */

// Enqueue scripts
function my_scripts() {

	// Use jQuery from a CDN
	wp_deregister_script('jquery');
	wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', array(), null, true);

	// Enqueue our stylesheet and JS file with a jQuery dependency.
	// Note that we aren't using WordPress' default style.css, and instead enqueueing the file of compiled Sass.
	wp_enqueue_style( 'my-styles', get_template_directory_uri() . '/assets/public/css/main.min.css', 1.0);
	wp_enqueue_script( 'my-js', get_template_directory_uri() . '/assets/public/js/main.min.js', array('jquery'), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'my_scripts' );




function custom_posts_menu() {
	remove_menu_page('edit.php');
	remove_menu_page('edit-comments.php');
	$post_type = array(
		'publication',
		'event',
		'project'
	);
	
	$taxonomies = array(
		'axis',
		'research_field',
		'research_topic',
		'key_concept'
	);

	foreach ($post_type as $key => $type) {
		foreach ($taxonomies as $key => $taxo) {
			remove_submenu_page( 'edit.php?post_type='.$type.'', 'edit-tags.php?taxonomy='.$taxo.'&amp;post_type='.$type.'' );
		}
	}
}
add_action('admin_menu', 'custom_posts_menu');



/**
 * Change admin menu order
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


/**
 *
 * Remove default taxonomies
 *
 * @link http://w4dev.com/wp/remove-taxonomy/
 *
 */
 
function remove_taxonomy(){
	global $wp_taxonomies;

	$taxonomies = array( 'category', 'post_tag' );
	foreach( $taxonomies as $taxonomy ) {
		if ( taxonomy_exists( $taxonomy) ){
			unset( $wp_taxonomies[$taxonomy]);
		}
	}
}
add_action( 'init', 'remove_taxonomy');


/**
 * ACF SELECTED EVENT
 */

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


/**
 * Hide admin bar
 */
add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
// if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
// }
}


/**
 * Remove auto p
 */
add_filter( 'the_content', 'remove_auto_tags', 0 );
function remove_auto_tags( $content )
{
	remove_filter('the_content', 'wpautop');
	return $content;
}