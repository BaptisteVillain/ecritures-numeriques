<?php

/*
 *
 * Taxonomies
 *
 */

// Same as with Custom Types, you only need the arguments and register_taxonomy function here. They are hooked into WordPress in functions.php.

/**
 * Research Fields Taxonomy
 */
$labels = array(
  'name'              => _x( 'Research Fields', 'taxonomy general name', 'textdomain' ),
  'singular_name'     => _x( 'Research Field', 'taxonomy singular name', 'textdomain' ),
  'search_items'      => __( 'Search Research Fields', 'textdomain' ),
  'all_items'         => __( 'All Research Fields', 'textdomain' ),
  'parent_item'       => __( 'Parent Research Field', 'textdomain' ),
  'parent_item_colon' => __( 'Parent Research Field:', 'textdomain' ),
  'edit_item'         => __( 'Edit Research Field', 'textdomain' ),
  'update_item'       => __( 'Update Research Field', 'textdomain' ),
  'add_new_item'      => __( 'Add New Research Field', 'textdomain' ),
  'new_item_name'     => __( 'New Research Field Name', 'textdomain' ),
  'menu_name'         => __( 'Research Fields', 'textdomain' ),
);

$args = array(
  'hierarchical'      => true,
  'labels'            => $labels,
  'show_ui'           => true,
  'show_admin_column' => true,
  'query_var'         => true,
  'rewrite'           => array( 'slug' => 'research-field' ),
);
register_taxonomy( 'research_field', array( 'publication', 'project', 'event' ), $args );


/**
 * Research Topics Taxonomy
 */
$labels = array(
  'name'              => _x( 'Research Topics', 'taxonomy general name', 'textdomain' ),
  'singular_name'     => _x( 'Research Topic', 'taxonomy singular name', 'textdomain' ),
  'search_items'      => __( 'Search Research Topics', 'textdomain' ),
  'all_items'         => __( 'All Research Topics', 'textdomain' ),
  'parent_item'       => __( 'Parent Research Topic', 'textdomain' ),
  'parent_item_colon' => __( 'Parent Research Topic:', 'textdomain' ),
  'edit_item'         => __( 'Edit Research Topic', 'textdomain' ),
  'update_item'       => __( 'Update Research Topic', 'textdomain' ),
  'add_new_item'      => __( 'Add New Research Topic', 'textdomain' ),
  'new_item_name'     => __( 'New Research Topic Name', 'textdomain' ),
  'menu_name'         => __( 'Research Topics', 'textdomain' ),
);

$args = array(
  'hierarchical'      => true,
  'labels'            => $labels,
  'show_ui'           => true,
  'show_admin_column' => true,
  'query_var'         => true,
  'rewrite'           => array( 'slug' => 'research-topic' ),
);
register_taxonomy( 'research_topic', array( 'publication', 'project', 'event' ), $args );

/**
 * Key-concepts Taxonomy
 */
$labels = array(
  'name'              => _x( 'Key-concepts', 'taxonomy general name', 'textdomain' ),
  'singular_name'     => _x( 'Key-concept', 'taxonomy singular name', 'textdomain' ),
  'search_items'      => __( 'Search Key-concepts', 'textdomain' ),
  'all_items'         => __( 'All Key-concepts', 'textdomain' ),
  'parent_item'       => __( 'Parent Key-concept', 'textdomain' ),
  'parent_item_colon' => __( 'Parent Key-concept:', 'textdomain' ),
  'edit_item'         => __( 'Edit Key-concept', 'textdomain' ),
  'update_item'       => __( 'Update Key-concept', 'textdomain' ),
  'add_new_item'      => __( 'Add New Key-concept', 'textdomain' ),
  'new_item_name'     => __( 'New Key-concept Name', 'textdomain' ),
  'menu_name'         => __( 'Key-concepts', 'textdomain' ),
);

$args = array(
  'hierarchical'      => true,
  'labels'            => $labels,
  'show_ui'           => true,
  'show_admin_column' => true,
  'query_var'         => true,
  'rewrite'           => array( 'slug' => 'key-concept' ),
);
register_taxonomy( 'key_concept', array( 'publication', 'project', 'event' ), $args );

/**
 * Axes Taxonomy
 */
$labels = array(
  'name'              => _x( 'Axes', 'taxonomy general name', 'textdomain' ),
  'singular_name'     => _x( 'Axis', 'taxonomy singular name', 'textdomain' ),
  'search_items'      => __( 'Search Axes', 'textdomain' ),
  'all_items'         => __( 'All Axes', 'textdomain' ),
  'parent_item'       => __( 'Parent Axis', 'textdomain' ),
  'parent_item_colon' => __( 'Parent Axis:', 'textdomain' ),
  'edit_item'         => __( 'Edit Axis', 'textdomain' ),
  'update_item'       => __( 'Update Axis', 'textdomain' ),
  'add_new_item'      => __( 'Add New Axis', 'textdomain' ),
  'new_item_name'     => __( 'New Axis Name', 'textdomain' ),
  'menu_name'         => __( 'Axes', 'textdomain' ),
);

$args = array(
  'hierarchical'      => true,
  'labels'            => $labels,
  'show_ui'           => true,
  'show_admin_column' => true,
  'query_var'         => true,
  'rewrite'           => array( 'slug' => 'axis' ),
);
register_taxonomy( 'axis', array( 'publication', 'project', 'event' ), $args );
