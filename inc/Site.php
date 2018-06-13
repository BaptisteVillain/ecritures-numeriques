<?php

class Site extends Timber\Site {

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

	function add_to_context( $context ) {

		// Our menu occurs on every page, so we add it to the global context.
		$context['menu'] = new Timber\Menu('header-menu');
		$context['language'] = new Timber\Menu('language-switch');
		$context['socials'] = new Timber\Menu('socials');

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

	function add_to_twig( $twig ) {
		$twig->addExtension( new Twig_Extension_StringLoader() );
		return $twig;
  }
  
	function register_post_types(){
		include __DIR__.'/../lib/custom-types.php';
	}

	function register_taxonomies(){
		require __DIR__.'/../lib/taxonomies.php';
	}

	function register_menus(){
		require __DIR__.'/../lib/menus.php';
	}

	function register_widgets(){
		require __DIR__.'/../lib/widgets.php';
	}
	
}

new Site();