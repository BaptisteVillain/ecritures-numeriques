<?php
/**
 * The Template for displaying all single events
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

 global $wp_embed;

$context = Timber::get_context();
$context['event'] = new Timber\Post();

$context['event']->custom['image_url'] = get_field('cover_image', $context['event']->ID);
$context['event']->custom['content_text'] = get_field('content');
$context['event']->custom['medias_title'] = get_field('medias_0_media_title');

// echo '<pre>';
// print_r($context['event']);
// echo '</pre>';
// exit;


Timber::render('single-event.twig', $context );
