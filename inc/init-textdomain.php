<?php

function textdomain_init() {
	$plugin_rel_path = basename( dirname( __FILE__ ) ) . '/languages';
	load_plugin_textdomain( 'ecritures-numeriques', false, $plugin_rel_path );
}
add_action('plugins_loaded', 'textdomain_init');
