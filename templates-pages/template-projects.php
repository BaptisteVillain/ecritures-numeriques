<?php
/**
 * Template Name: Projects Page
 * Description: All Projects
 */

$context = Timber::get_context();

$args = array(
// Get post type project
'post_type' => 'project',
// Get all posts
'posts_per_page' => -1,
// Order by index post
'meta_key' => 'id_number',
'orderby' => 'meta_value', 
'order' => 'ASC'
);

$context['projects'] = new Timber\PostQuery( $args );

Timber::render( 'projects.twig', $context );
 