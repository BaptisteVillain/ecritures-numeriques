<?php
/**
 * The Template for displaying all single projects
 *
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;

$context['tags'] = array();

Timber::render( 'single-project.twig', $context );
