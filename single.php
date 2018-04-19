<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;
$context['comment_form'] = TimberHelper::get_comment_form();


$args = array(
	'post_type' => array( 'members' ),
	'orderby' => 'ASC',
	'post_in' => $post->custom['authors']
);


$parse = parse_url($post->url);
$context['domain'] = $parse['host'];

$context['authors'] = get_posts(array(
	'post_type' => 'member',
	'post__in' => $post->custom['authors']
));

$research_field = wp_get_post_terms($post->id, 'research_field');
$context['research_field'] = $research_field[0];
$context['tags'] = wp_get_post_terms($post->id, array('research_topic', 'axis', 'key_concept'));



$discovers =  get_posts(array(
	'post_type' => 'publication',
	'post__in' => $post->custom['relation_publication_publication']
));

foreach ($discovers as $key => $publication) {
	$list_authors = get_post_meta($publication->ID, 'publication_authors', false);
	$authors = get_posts(array(
		'post_type' => 'member',
		'post__in' => $list_authors[0]
	));
	$discovers[$key]->authors = $authors;

	$research_field = wp_get_post_terms($publication->ID, 'research_field');
	$discovers[$key]->research_field = $research_field[0];

	$parse = parse_url($publication->url);
	$discovers[$key]->domain = $parse['host'];
}

$context['discovers'] = $discovers;

// echo '<pre>';
// print_r($discovers);
// echo '</pre>';



if ( post_password_required( $post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig' ), $context );
}
