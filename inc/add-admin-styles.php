<?php

add_action('admin_head', 'delete_add_taxonomy');
function delete_add_taxonomy(){
	echo '
		<style>
			.taxonomy-add-new{
				display: none;
			}
		</style>
	';
}
