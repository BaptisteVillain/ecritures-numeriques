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
'orderby' => array('id_number'), 
'order' => 'ASC'
);

$context['projects'] = Timber::get_posts( $args );

foreach ($context['projects'] as $key => $project) {
  $context['projects'][$key]->cover = get_field('cover_image', $project->ID);
  $context['projects'][$key]->description = get_field('content', $project->ID);
  $context['projects'][$key]->index = get_field('id_number', $project->ID);
  $context['projects'][$key]->link = get_permalink($project->ID);
}

// echo '<pre>';
// print_r($context['projects']);
// echo '</pre>';
// exit;

Timber::render( 'projects.twig', $context );
 