<?php
/**
 * Template Name: Contact Page
 * Description: Contact page
 */

$context = Timber::get_context();

$context['page'] = new Timber\Post();

Timber::render( 'contact.twig', $context );
 