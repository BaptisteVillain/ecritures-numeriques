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
		add_theme_support( 'infinite-scroll', array(
			'container' => 'publication-container',
			'footer' => false,
		));
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		add_action( 'init', array( $this, 'register_menus' ) );
		add_action( 'init', array( $this, 'register_widgets' ) );
		parent::__construct();
	}


	// Abstracting long chunks of code.


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
		$context['socials'] = new TimberMenu('socials');

		$context['header'] = get_fields(pll_current_language('slug'));

		/* get footer content */
		$context['footer'] = get_fields(pll_current_language('slug'));
		if(!empty($context['footer']['icon'])){
			$context['footer']['icon_svg'] = file_get_contents($context['footer']['icon']);
		}

		$context['footer']['year'] = date('Y');
		if(!empty($context['footer']['socials'])){
			foreach ($context['footer']['socials'] as $key => $social) {
				$context['footer']['socials'][$key]['svg'] = file_get_contents($social['icon']);
			}
		}

		$context['site'] = $this;
		return $context;
	}

	// Here you can add your own fuctions to Twig. Don't worry about this section if you don't come across a need for it.
	// See more here: http://twig.sensiolabs.org/doc/advanced.html
	function add_to_twig( $twig ) {
		$twig->addExtension( new Twig_Extension_StringLoader() );
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
	wp_enqueue_style( 'my-styles', get_template_directory_uri() . '/assets/public/css/main.min.css', 1.0);
	wp_enqueue_script( 'my-js', get_template_directory_uri() . '/assets/public/js/main.min.js', array('jquery'), '1.0.0', true );
	wp_localize_script('my-js', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
}

add_action( 'wp_enqueue_scripts', 'my_scripts' );

function my_theme_add_editor_styles() {
	add_editor_style( get_template_directory_uri() . '/assets/public/css/editor.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );

function textdomain_init() {
	$plugin_rel_path = basename( dirname( __FILE__ ) ) . '/languages';
	load_plugin_textdomain( 'ecritures-numeriques', false, $plugin_rel_path );
}
add_action('plugins_loaded', 'textdomain_init');

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

	// foreach ($post_type as $key => $type) {
	// 	foreach ($taxonomies as $key => $taxo) {
	// 		remove_submenu_page( 'edit.php?post_type='.$type.'', 'edit-tags.php?taxonomy='.$taxo.'&amp;post_type='.$type.'' );
	// 	}
	// }
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
 * Remove auto <p> tags
 */
remove_filter('the_content', 'wpautop');
remove_filter( 'the_excerpt', 'wpautop');
remove_filter('term_description','wpautop');

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title'    => 'Footer',
		'menu_title'    => 'Footer',
		'menu_slug'     => 'footer-generales',
		'capability'    => 'edit_posts',
		'redirect'      => true
	));

  $languages = array( 'fr', 'en' );
  foreach ( $languages as $lang ) {
    acf_add_options_sub_page( array(
      'page_title' => 'Footer (' . strtoupper( $lang ) . ')',
      'menu_title' => __('Footer (' . strtoupper( $lang ) . ')', 'text-domain'),
      'menu_slug'  => "footer-${lang}",
			'post_id'    => $lang,
			'parent_slug'   => 'footer-generales',			
		));
	}
	acf_add_options_page(array(
		'page_title'    => 'Header',
		'menu_title'    => 'Header',
		'menu_slug'     => 'header-generales',
		'capability'    => 'edit_posts',
		'redirect'      => true
	));

  $languages = array( 'fr', 'en' );
  foreach ( $languages as $lang ) {
    acf_add_options_sub_page( array(
      'page_title' => 'Header (' . strtoupper( $lang ) . ')',
      'menu_title' => __('Header (' . strtoupper( $lang ) . ')', 'text-domain'),
      'menu_slug'  => "header-${lang}",
			'post_id'    => $lang,
			'parent_slug'   => 'header-generales',			
		));
	}
	
}

add_action('admin_head', 'delete_add_taxonomy');
function delete_add_taxonomy(){
	echo '
		<style>
			.taxonomy-add-new{
				display: none;
			}
		</style>
	';
}

// add default image setting to ACF image fields
add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field');
function add_default_value_to_image_field($field) {
	acf_render_field_setting( $field, array(
		'label'			=> 'Default Image',
		'instructions'		=> 'Appears when creating a new post',
		'type'			=> 'image',
		'name'			=> 'default_value',
	));
}

add_image_size('event_portrait', 200, 250, true);
add_image_size('event_banner', 360, 120, true);



// remove unwanted <p> tags
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


add_action( 'after_setup_theme', 'infinite_scroll_init' );
function infinite_scroll_init(){
	add_theme_support( 'infinite-scroll', array(
		'container' => 'publication-container',
		'footer' => false,
	) );
}


	/**
 * AJAX Load More 
 */
function publication_load_more() {
	// $args = isset( $_POST['query'] ) ? array_map( 'esc_attr', $_POST['query'] ) : array();
	// $args['post_type'] = isset( $args['post_type'] ) ? esc_attr( $args['post_type'] ) : 'post';
	// $args['paged'] = esc_attr( $_POST['page'] );
	// $args['post_status'] = 'publish';
	// ob_start();
	// $loop = new WP_Query( $args );
	// if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post();
	// 	be_post_summary();
	// endwhile; endif; wp_reset_postdata();
	// $data = ob_get_clean();
	wp_send_json_success( 'this is a sucess' );
	wp_die();
}
add_action( 'wp_ajax_publication_load_more', 'publication_load_more' );
add_action( 'wp_ajax_nopriv_publication_load_more', 'publication_load_more' );