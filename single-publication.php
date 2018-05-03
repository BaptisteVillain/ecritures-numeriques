<?php
/**
 * The Template for displaying all single publications
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;

$context['authors'] = get_posts(array(
	'post_type' => 'member',
	'post__in' => $post->custom['authors']
));

$research_field = wp_get_post_terms($post->id, 'research_field');
$context['research_field'] = $research_field[0];
$context['tags'] = wp_get_post_terms($post->id, array('research_topic', 'axis', 'key_concept'));


$context['discovers'] = [];
if($post->custom['relation_publication_publication']){
	$discovers =  get_posts(array(
		'post_type' => 'publication',
		'post__in' => $post->custom['relation_publication_publication'],
		'post_per_page' => 3
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
}

Timber::render('single-publication.twig', $context );
