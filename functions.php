<?php

include_once __DIR__.'/routes/routes.php';

foreach (glob(__DIR__.'/inc/*.php') as $filename)
{
	include $filename;
}

foreach (glob(__DIR__.'/controller/*.php') as $controller)
{
		include $controller;
}

/**
 * Hide admin bar
 */
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	show_admin_bar(false);
}
