<?php

foreach (glob(__DIR__.'/inc/*.php') as $filename)
{
    include $filename;
}

/**
 * Hide admin bar
 */
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	show_admin_bar(false);
}
