<?php
/**
 * The Template for displaying all single publications
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();

$context['post'] = new Publication();

Timber::render('single-member.twig', $context );
