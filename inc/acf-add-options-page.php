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
      'menu_title' => __('Footer (' . strtoupper( $lang ) . ')', 'ecritures-numeriques'),
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

  foreach ( $languages as $lang ) {
    acf_add_options_sub_page( array(
      'page_title' => 'Header (' . strtoupper( $lang ) . ')',
      'menu_title' => __('Header (' . strtoupper( $lang ) . ')', 'ecritures-numeriques'),
      'menu_slug'  => "header-${lang}",
			'post_id'    => $lang,
			'parent_slug'   => 'header-generales',			
		));
	}

	acf_add_options_page(array(
		'page_title'    => 'Site Pages',
		'menu_title'    => 'Site Pages',
		'menu_slug'     => 'site-pages',
		'capability'    => 'edit_posts',
		'redirect'      => true
	));
	foreach ( $languages as $lang ) {
    acf_add_options_sub_page( array(
      'page_title' => 'Site Pages (' . strtoupper( $lang ) . ')',
      'menu_title' => __('Site Pages (' . strtoupper( $lang ) . ')', 'ecritures-numeriques'),
      'menu_slug'  => "site-pages-${lang}",
			'post_id'    => $lang,
			'parent_slug'   => 'site-pages',			
		));
	}
	
}