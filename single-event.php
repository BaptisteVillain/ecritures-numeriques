<?php
/**
 * The Template for displaying all single events
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$context['event'] = $post;

$context['event']->custom['image_url'] = get_field('cover_image', $context['event']->ID);


// echo '<pre>';
// print_r($context['event']);
// echo '</pre>';
// exit;


Timber::render('single-event.twig', $context );
