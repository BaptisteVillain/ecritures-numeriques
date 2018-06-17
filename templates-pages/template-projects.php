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
'orderby' => array(
    'date' => 'DESC'
));

$context['projects'] = Timber::get_posts( $args );


// echo '<pre>';
// print_r($context['projects']);
// echo '</pre>';
// exit;
Timber::render( 'projects.twig', $context );
 