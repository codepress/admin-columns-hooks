<?php
/**
 * This hook allows you to alter the default sorting for a list screen when you visit the page for the first time or when you reset sorting
 * Altering the value must probably always be done for a specific list screen ID
 */

/**
 * Example on how to change the default sorting for a specific list screen
 *
 * @param array         $default
 * @param AC\ListScreen $list_screen
 *
 * @return array
 */

function acp_sorting_set_default( $default, AC\ListScreen $list_screen ) {

	// Set the default sorting to the title in descending order for a specific list ID
	if ( '5f0ef965c16d6' === $list_screen->get_id() ) {
		$default = [ 'title', 'desc' ];
	}

	return $default;
}

add_filter( 'acp/sorting/default', 'acp_sorting_set_default', 10, 2 );