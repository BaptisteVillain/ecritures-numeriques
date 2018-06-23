<?php
/**
 * Template Name: Legals Page
 * Description: Legal mentions page
 */

$context = Timber::get_context();

$context['page'] = new Timber\Post();


Timber::render( 'legals.twig', $context );
 