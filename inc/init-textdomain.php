<?php

function textdomain_init() {
	$rel_path = get_template_directory() . '/languages';
	load_theme_textdomain( 'ecritures-numeriques', $rel_path );
}
add_action('after_setup_theme', 'textdomain_init');
