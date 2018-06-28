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
$context['post'] = new Project();


Timber::render( 'single-project.twig', $context );
