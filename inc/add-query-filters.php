<?php
add_filter( 'posts_where', 'id_filter', 10, 2 );
function id_filter($where, $q){
	global $wpdb;

	if( $pid = $q->get( 'wpse_pid' )){
			$cmp = $q->get( 'wpse_compare' );

			$cmp = in_array( 
					$cmp, 
					[ '<', '>', '!=', '<>', '<=', '>=' ] 
			)
				 ? $cmpF
				 : '=';  // default

			$where .= $wpdb->prepare( " AND {$wpdb->posts}.ID {$cmp} %d ", $pid ) ;
	}
	return $where;
}
