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
// Order by post date
'orderby' => array('id_number'), 
'order' => 'ASC'
);

$context['projects'] = Timber::get_posts( $args );

foreach ($context['projects'] as $key => $project) {
  $context['projects'][$key]->cover = get_field('cover_image', $project->ID);
  $context['projects'][$key]->description = get_field('content', $project->ID);
  $context['projects'][$key]->index = get_field('id_number', $project->ID);
}

Timber::render( 'projects.twig', $context );
 