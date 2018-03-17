<?php

/*
 *
 * Custom Post Types
 *
 */

// Note that you only need the arguments and register_post_type function here. They are hooked into WordPress in functions.php.
// Register Custom Post Type


/**
 * Publications
 */
$labels = array(
  'name'                  => _x( 'Publications', 'Post Type General Name', 'text_domain' ),
  'singular_name'         => _x( 'Publication', 'Post Type Singular Name', 'text_domain' ),
  'menu_name'             => __( 'Publications', 'text_domain' ),
  'name_admin_bar'        => __( 'Publications', 'text_domain' ),
  'archives'              => __( 'Publication Archives', 'text_domain' ),
  'attributes'            => __( 'Publication Attributes', 'text_domain' ),
  'parent_item_colon'     => __( 'Parent Publication:', 'text_domain' ),
  'all_items'             => __( 'All Publications', 'text_domain' ),
  'add_new_item'          => __( 'Add New Publication', 'text_domain' ),
  'add_new'               => __( 'Add Publication', 'text_domain' ),
  'new_item'              => __( 'New Publication', 'text_domain' ),
  'edit_item'             => __( 'Edit Publication', 'text_domain' ),
  'update_item'           => __( 'Update Publication', 'text_domain' ),
  'view_item'             => __( 'View Publication', 'text_domain' ),
  'view_items'            => __( 'View Publications', 'text_domain' ),
  'search_items'          => __( 'Search Publication', 'text_domain' ),
  'not_found'             => __( 'Not found', 'text_domain' ),
  'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
  'featured_image'        => __( 'Featured Image', 'text_domain' ),
  'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
  'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
  'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
  'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
  'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
  'items_list'            => __( 'Items list', 'text_domain' ),
  'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
  'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
);

$args = array(
  'label'                 => __( 'publication', 'text_domain' ),
  'description'           => __( 'Digital Textualities Publications', 'text_domain' ),
  'labels'                => $labels,
  'supports'              => array( 'title', 'editor' ),
  'hierarchical'          => false,
  'public'                => true,
  'show_ui'               => true,
  'show_in_menu'          => true,
  'menu_position'         => 5,
  'show_in_admin_bar'     => true,
  'show_in_nav_menus'     => true,
  'can_export'            => true,
  'has_archive'           => false,
  'exclude_from_search'   => false,
  'publicly_queryable'    => true,
  'capability_type'       => 'page',
);
register_post_type( 'publication', $args );

/**
 * Members
 */
$labels = array(
  'name'                  => _x( 'Members', 'Post Type General Name', 'text_domain' ),
  'singular_name'         => _x( 'Member', 'Post Type Singular Name', 'text_domain' ),
  'menu_name'             => __( 'Members', 'text_domain' ),
  'name_admin_bar'        => __( 'Members', 'text_domain' ),
  'archives'              => __( 'Item Archives', 'text_domain' ),
  'attributes'            => __( 'Item Attributes', 'text_domain' ),
  'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
  'all_items'             => __( 'All Members', 'text_domain' ),
  'add_new_item'          => __( 'Add New Member', 'text_domain' ),
  'add_new'               => __( 'Add New', 'text_domain' ),
  'new_item'              => __( 'New Member', 'text_domain' ),
  'edit_item'             => __( 'Edit Member', 'text_domain' ),
  'update_item'           => __( 'Update Member', 'text_domain' ),
  'view_item'             => __( 'View Member', 'text_domain' ),
  'view_items'            => __( 'View Members', 'text_domain' ),
  'search_items'          => __( 'Search Member', 'text_domain' ),
  'not_found'             => __( 'Not found', 'text_domain' ),
  'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
  'featured_image'        => __( 'Featured Image', 'text_domain' ),
  'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
  'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
  'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
  'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
  'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
  'items_list'            => __( 'Items list', 'text_domain' ),
  'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
  'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
);

$args = array(
  'label'                 => __( 'member', 'text_domain' ),
  'description'           => __( 'Digital Textualities Members', 'text_domain' ),
  'labels'                => $labels,
  'supports'              => array( 'title', 'editor' ),
  'hierarchical'          => false,
  'public'                => true,
  'show_ui'               => true,
  'show_in_menu'          => true,
  'menu_position'         => 5,
  'show_in_admin_bar'     => true,
  'show_in_nav_menus'     => true,
  'can_export'            => true,
  'has_archive'           => false,
  'exclude_from_search'   => false,
  'publicly_queryable'    => true,
  'capability_type'       => 'page',
);
register_post_type( 'member', $args );

