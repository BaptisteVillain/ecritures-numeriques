<?php

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