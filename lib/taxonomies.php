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
  'name'              => _x( 'Research Fields', 'taxonomy general name', 'ecritures-numeriques' ),
  'singular_name'     => _x( 'Research Field', 'taxonomy singular name', 'ecritures-numeriques' ),
  'search_items'      => __( 'Search Research Fields', 'ecritures-numeriques' ),
  'all_items'         => __( 'All Research Fields', 'ecritures-numeriques' ),
  'parent_item'       => __( 'Parent Research Field', 'ecritures-numeriques' ),
  'parent_item_colon' => __( 'Parent Research Field:', 'ecritures-numeriques' ),
  'edit_item'         => __( 'Edit Research Field', 'ecritures-numeriques' ),
  'update_item'       => __( 'Update Research Field', 'ecritures-numeriques' ),
  'add_new_item'      => __( 'Add New Research Field', 'ecritures-numeriques' ),
  'new_item_name'     => __( 'New Research Field Name', 'ecritures-numeriques' ),
  'menu_name'         => __( 'Research Fields', 'ecritures-numeriques' ),
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
  'name'              => _x( 'Research Topics', 'taxonomy general name', 'ecritures-numeriques' ),
  'singular_name'     => _x( 'Research Topic', 'taxonomy singular name', 'ecritures-numeriques' ),
  'search_items'      => __( 'Search Research Topics', 'ecritures-numeriques' ),
  'all_items'         => __( 'All Research Topics', 'ecritures-numeriques' ),
  'parent_item'       => __( 'Parent Research Topic', 'ecritures-numeriques' ),
  'parent_item_colon' => __( 'Parent Research Topic:', 'ecritures-numeriques' ),
  'edit_item'         => __( 'Edit Research Topic', 'ecritures-numeriques' ),
  'update_item'       => __( 'Update Research Topic', 'ecritures-numeriques' ),
  'add_new_item'      => __( 'Add New Research Topic', 'ecritures-numeriques' ),
  'new_item_name'     => __( 'New Research Topic Name', 'ecritures-numeriques' ),
  'menu_name'         => __( 'Research Topics', 'ecritures-numeriques' ),
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
  'name'              => _x( 'Key-concepts', 'taxonomy general name', 'ecritures-numeriques' ),
  'singular_name'     => _x( 'Key-concept', 'taxonomy singular name', 'ecritures-numeriques' ),
  'search_items'      => __( 'Search Key-concepts', 'ecritures-numeriques' ),
  'all_items'         => __( 'All Key-concepts', 'ecritures-numeriques' ),
  'parent_item'       => __( 'Parent Key-concept', 'ecritures-numeriques' ),
  'parent_item_colon' => __( 'Parent Key-concept:', 'ecritures-numeriques' ),
  'edit_item'         => __( 'Edit Key-concept', 'ecritures-numeriques' ),
  'update_item'       => __( 'Update Key-concept', 'ecritures-numeriques' ),
  'add_new_item'      => __( 'Add New Key-concept', 'ecritures-numeriques' ),
  'new_item_name'     => __( 'New Key-concept Name', 'ecritures-numeriques' ),
  'menu_name'         => __( 'Key-concepts', 'ecritures-numeriques' ),
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
  'name'              => _x( 'Axes', 'taxonomy general name', 'ecritures-numeriques' ),
  'singular_name'     => _x( 'Axis', 'taxonomy singular name', 'ecritures-numeriques' ),
  'search_items'      => __( 'Search Axes', 'ecritures-numeriques' ),
  'all_items'         => __( 'All Axes', 'ecritures-numeriques' ),
  'parent_item'       => __( 'Parent Axis', 'ecritures-numeriques' ),
  'parent_item_colon' => __( 'Parent Axis:', 'ecritures-numeriques' ),
  'edit_item'         => __( 'Edit Axis', 'ecritures-numeriques' ),
  'update_item'       => __( 'Update Axis', 'ecritures-numeriques' ),
  'add_new_item'      => __( 'Add New Axis', 'ecritures-numeriques' ),
  'new_item_name'     => __( 'New Axis Name', 'ecritures-numeriques' ),
  'menu_name'         => __( 'Axes', 'ecritures-numeriques' ),
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

/**
 * Member Taxonomy
 */
$labels = array(
  'name'              => _x( 'Posts', 'taxonomy general name', 'ecritures-numeriques' ),
  'singular_name'     => _x( 'Post', 'taxonomy singular name', 'ecritures-numeriques' ),
  'search_items'      => __( 'Search Posts', 'ecritures-numeriques' ),
  'all_items'         => __( 'All Posts', 'ecritures-numeriques' ),
  'parent_item'       => __( 'Parent Post', 'ecritures-numeriques' ),
  'parent_item_colon' => __( 'Parent Post:', 'ecritures-numeriques' ),
  'edit_item'         => __( 'Edit Post', 'ecritures-numeriques' ),
  'update_item'       => __( 'Update Post', 'ecritures-numeriques' ),
  'add_new_item'      => __( 'Add New Post', 'ecritures-numeriques' ),
  'new_item_name'     => __( 'New Post Name', 'ecritures-numeriques' ),
  'menu_name'         => __( 'Posts', 'ecritures-numeriques' ),
);

$args = array(
  'hierarchical'      => true,
  'labels'            => $labels,
  'show_ui'           => true,
  'show_admin_column' => true,
  'query_var'         => true,
  'rewrite'           => array( 'slug' => 'post' ),
);
register_taxonomy( 'post', 'member', $args );
