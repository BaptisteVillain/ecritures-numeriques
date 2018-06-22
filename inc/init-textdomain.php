<?php

function textdomain_init() {
	$rel_path = basename( dirname( __FILE__ ) ) . '/languages';
	load_textdomain( 'ecritures-numeriques', $rel_path );
}
add_action('plugins_loaded', 'textdomain_init');
