<?php

/*
 *
 * Custom Post Types
 *
 */


/**
 * Publications
 */
$labels = array(
  'name'                  => _x( 'Publications', 'Post Type General Name', 'ecritures-numeriques' ),
  'singular_name'         => _x( 'Publication', 'Post Type Singular Name', 'ecritures-numeriques' ),
  'menu_name'             => __( 'Publications', 'ecritures-numeriques' ),
  'name_admin_bar'        => __( 'Publications', 'ecritures-numeriques' ),
  'archives'              => __( 'Publication Archives', 'ecritures-numeriques' ),
  'attributes'            => __( 'Publication Attributes', 'ecritures-numeriques' ),
  'parent_item_colon'     => __( 'Parent Publication:', 'ecritures-numeriques' ),
  'all_items'             => __( 'All Publications', 'ecritures-numeriques' ),
  'add_new_item'          => __( 'Add New Publication', 'ecritures-numeriques' ),
  'add_new'               => __( 'Add Publication', 'ecritures-numeriques' ),
  'new_item'              => __( 'New Publication', 'ecritures-numeriques' ),
  'edit_item'             => __( 'Edit Publication', 'ecritures-numeriques' ),
  'update_item'           => __( 'Update Publication', 'ecritures-numeriques' ),
  'view_item'             => __( 'View Publication', 'ecritures-numeriques' ),
  'view_items'            => __( 'View Publications', 'ecritures-numeriques' ),
  'search_items'          => __( 'Search Publication', 'ecritures-numeriques' ),
  'not_found'             => __( 'Not found', 'ecritures-numeriques' ),
  'not_found_in_trash'    => __( 'Not found in Trash', 'ecritures-numeriques' ),
  'featured_image'        => __( 'Featured Image', 'ecritures-numeriques' ),
  'set_featured_image'    => __( 'Set featured image', 'ecritures-numeriques' ),
  'remove_featured_image' => __( 'Remove featured image', 'ecritures-numeriques' ),
  'use_featured_image'    => __( 'Use as featured image', 'ecritures-numeriques' ),
  'insert_into_item'      => __( 'Insert into item', 'ecritures-numeriques' ),
  'uploaded_to_this_item' => __( 'Uploaded to this item', 'ecritures-numeriques' ),
  'items_list'            => __( 'Items list', 'ecritures-numeriques' ),
  'items_list_navigation' => __( 'Items list navigation', 'ecritures-numeriques' ),
  'filter_items_list'     => __( 'Filter items list', 'ecritures-numeriques' ),
);

$args = array(
  'label'                 => __( 'publication', 'ecritures-numeriques' ),
  'description'           => __( 'Digital Textualities Publications', 'ecritures-numeriques' ),
  'labels'                => $labels,
  'supports'              => array( 'title', 'editor' ),
  'hierarchical'          => false,
  'public'                => true,
  'show_ui'               => true,
  'show_in_menu'          => true,
  'menu_position'         => 3,
  'menu_icon'             => 'dashicons-format-aside',  
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
 * Events
 */
$labels = array(
  'name'                  => _x( 'Events', 'Post Type General Name', 'ecritures-numeriques' ),
  'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'ecritures-numeriques' ),
  'menu_name'             => __( 'Events', 'ecritures-numeriques' ),
  'name_admin_bar'        => __( 'Events', 'ecritures-numeriques' ),
  'archives'              => __( 'Item Archives', 'ecritures-numeriques' ),
  'attributes'            => __( 'Item Attributes', 'ecritures-numeriques' ),
  'parent_item_colon'     => __( 'Parent Item:', 'ecritures-numeriques' ),
  'all_items'             => __( 'All Events', 'ecritures-numeriques' ),
  'add_new_item'          => __( 'Add New Event', 'ecritures-numeriques' ),
  'add_new'               => __( 'Add New', 'ecritures-numeriques' ),
  'new_item'              => __( 'New Event', 'ecritures-numeriques' ),
  'edit_item'             => __( 'Edit Event', 'ecritures-numeriques' ),
  'update_item'           => __( 'Update Event', 'ecritures-numeriques' ),
  'view_item'             => __( 'View Event', 'ecritures-numeriques' ),
  'view_items'            => __( 'View Events', 'ecritures-numeriques' ),
  'search_items'          => __( 'Search Event', 'ecritures-numeriques' ),
  'not_found'             => __( 'Not found', 'ecritures-numeriques' ),
  'not_found_in_trash'    => __( 'Not found in Trash', 'ecritures-numeriques' ),
  'featured_image'        => __( 'Featured Image', 'ecritures-numeriques' ),
  'set_featured_image'    => __( 'Set featured image', 'ecritures-numeriques' ),
  'remove_featured_image' => __( 'Remove featured image', 'ecritures-numeriques' ),
  'use_featured_image'    => __( 'Use as featured image', 'ecritures-numeriques' ),
  'insert_into_item'      => __( 'Insert into item', 'ecritures-numeriques' ),
  'uploaded_to_this_item' => __( 'Uploaded to this item', 'ecritures-numeriques' ),
  'items_list'            => __( 'Items list', 'ecritures-numeriques' ),
  'items_list_navigation' => __( 'Items list navigation', 'ecritures-numeriques' ),
  'filter_items_list'     => __( 'Filter items list', 'ecritures-numeriques' ),
);

$args = array(
  'label'                 => __( 'event', 'ecritures-numeriques' ),
  'description'           => __( 'Digital Textualities Events', 'ecritures-numeriques' ),
  'labels'                => $labels,
  'supports'              => array( 'title', 'editor' ),  
  'hierarchical'          => false,
  'public'                => true,
  'show_ui'               => true,
  'show_in_menu'          => true,
  'menu_position'         => 3,
  'menu_icon'             => 'dashicons-admin-site',  
  'show_in_admin_bar'     => true,
  'show_in_nav_menus'     => true,
  'can_export'            => true,
  'has_archive'           => false,
  'exclude_from_search'   => false,
  'publicly_queryable'    => true,
  'capability_type'       => 'page',
);
register_post_type( 'event', $args );


/**
 * Projects
 */
$labels = array(
  'name'                  => _x( 'Projects', 'Post Type General Name', 'ecritures-numeriques' ),
  'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'ecritures-numeriques' ),
  'menu_name'             => __( 'Projects', 'ecritures-numeriques' ),
  'name_admin_bar'        => __( 'Projects', 'ecritures-numeriques' ),
  'archives'              => __( 'Item Archives', 'ecritures-numeriques' ),
  'attributes'            => __( 'Item Attributes', 'ecritures-numeriques' ),
  'parent_item_colon'     => __( 'Parent Item:', 'ecritures-numeriques' ),
  'all_items'             => __( 'All Projects', 'ecritures-numeriques' ),
  'add_new_item'          => __( 'Add New Project', 'ecritures-numeriques' ),
  'add_new'               => __( 'Add New', 'ecritures-numeriques' ),
  'new_item'              => __( 'New Project', 'ecritures-numeriques' ),
  'edit_item'             => __( 'Edit Project', 'ecritures-numeriques' ),
  'update_item'           => __( 'Update Project', 'ecritures-numeriques' ),
  'view_item'             => __( 'View Project', 'ecritures-numeriques' ),
  'view_items'            => __( 'View Projects', 'ecritures-numeriques' ),
  'search_items'          => __( 'Search Project', 'ecritures-numeriques' ),
  'not_found'             => __( 'Not found', 'ecritures-numeriques' ),
  'not_found_in_trash'    => __( 'Not found in Trash', 'ecritures-numeriques' ),
  'featured_image'        => __( 'Featured Image', 'ecritures-numeriques' ),
  'set_featured_image'    => __( 'Set featured image', 'ecritures-numeriques' ),
  'remove_featured_image' => __( 'Remove featured image', 'ecritures-numeriques' ),
  'use_featured_image'    => __( 'Use as featured image', 'ecritures-numeriques' ),
  'insert_into_item'      => __( 'Insert into item', 'ecritures-numeriques' ),
  'uploaded_to_this_item' => __( 'Uploaded to this item', 'ecritures-numeriques' ),
  'items_list'            => __( 'Items list', 'ecritures-numeriques' ),
  'items_list_navigation' => __( 'Items list navigation', 'ecritures-numeriques' ),
  'filter_items_list'     => __( 'Filter items list', 'ecritures-numeriques' ),
);

$args = array(
  'label'                 => __( 'project', 'ecritures-numeriques' ),
  'description'           => __( 'Digital Textualities Projects', 'ecritures-numeriques' ),
  'labels'                => $labels,
  'supports'              => array( 'title', 'editor' ),  
  'hierarchical'          => false,
  'public'                => true,
  'show_ui'               => true,
  'show_in_menu'          => true,
  'menu_position'         => 3,
  'menu_icon'             => 'dashicons-welcome-widgets-menus',    
  'show_in_admin_bar'     => true,
  'show_in_nav_menus'     => true,
  'can_export'            => true,
  'has_archive'           => false,
  'exclude_from_search'   => false,
  'publicly_queryable'    => true,
  'capability_type'       => 'page',
);
register_post_type( 'project', $args );


/**
 * Members
 */
$labels = array(
  'name'                  => _x( 'Members', 'Post Type General Name', 'ecritures-numeriques' ),
  'singular_name'         => _x( 'Member', 'Post Type Singular Name', 'ecritures-numeriques' ),
  'menu_name'             => __( 'Team', 'ecritures-numeriques' ),
  'name_admin_bar'        => __( 'Members', 'ecritures-numeriques' ),
  'archives'              => __( 'Item Archives', 'ecritures-numeriques' ),
  'attributes'            => __( 'Item Attributes', 'ecritures-numeriques' ),
  'parent_item_colon'     => __( 'Parent Item:', 'ecritures-numeriques' ),
  'all_items'             => __( 'All Members', 'ecritures-numeriques' ),
  'add_new_item'          => __( 'Add New Member', 'ecritures-numeriques' ),
  'add_new'               => __( 'Add New', 'ecritures-numeriques' ),
  'new_item'              => __( 'New Member', 'ecritures-numeriques' ),
  'edit_item'             => __( 'Edit Member', 'ecritures-numeriques' ),
  'update_item'           => __( 'Update Member', 'ecritures-numeriques' ),
  'view_item'             => __( 'View Member', 'ecritures-numeriques' ),
  'view_items'            => __( 'View Members', 'ecritures-numeriques' ),
  'search_items'          => __( 'Search Member', 'ecritures-numeriques' ),
  'not_found'             => __( 'Not found', 'ecritures-numeriques' ),
  'not_found_in_trash'    => __( 'Not found in Trash', 'ecritures-numeriques' ),
  'featured_image'        => __( 'Featured Image', 'ecritures-numeriques' ),
  'set_featured_image'    => __( 'Set featured image', 'ecritures-numeriques' ),
  'remove_featured_image' => __( 'Remove featured image', 'ecritures-numeriques' ),
  'use_featured_image'    => __( 'Use as featured image', 'ecritures-numeriques' ),
  'insert_into_item'      => __( 'Insert into item', 'ecritures-numeriques' ),
  'uploaded_to_this_item' => __( 'Uploaded to this item', 'ecritures-numeriques' ),
  'items_list'            => __( 'Items list', 'ecritures-numeriques' ),
  'items_list_navigation' => __( 'Items list navigation', 'ecritures-numeriques' ),
  'filter_items_list'     => __( 'Filter items list', 'ecritures-numeriques' ),
);

$args = array(
  'label'                 => __( 'member', 'ecritures-numeriques' ),
  'description'           => __( 'Digital Textualities Members', 'ecritures-numeriques' ),
  'labels'                => $labels,
  'supports'              => array( 'title', 'editor' ),
  'hierarchical'          => false,
  'public'                => true,
  'show_ui'               => true,
  'show_in_menu'          => true,
  'menu_position'         => 3,
  'menu_icon'             => 'dashicons-admin-users',
  'show_in_admin_bar'     => true,
  'show_in_nav_menus'     => true,
  'can_export'            => true,
  'has_archive'           => false,
  'exclude_from_search'   => false,
  'publicly_queryable'    => true,
  'capability_type'       => 'page',
);
register_post_type( 'member', $args );