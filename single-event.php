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
$context['event']->custom['content'] = get_field('post_content');
$context['event']->custom['video_url'] = $wp_embed->run_shortcode('[embed]' . $context['event']->custom['medias_0_media_link'] . '[/embed]');
$context['event']->custom['medias_title'] = get_field('medias_0_media_title');

// echo '<pre>';
// print_r($context['event']);
// echo '</pre>';
// exit;


Timber::render('single-event.twig', $context );
