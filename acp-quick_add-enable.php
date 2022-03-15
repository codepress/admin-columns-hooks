<?php
/**
 * This hooks allows you to enable Quick Add for a specific List Screen
 */

/**
 * @param bool          $enabled
 * @param AC\ListScreen $list_screen
 *
 * @return bool
 */
function acp_quick_add_enable( $enabled, AC\ListScreen $list_screen ) {
	return $enabled;
}

add_filter( 'acp/quick_add/enable', 'acp_quick_add_enable', 10, 2 );

// Anonymous function
add_filter( 'acp/quick_add/enable', function ( $enabled, AC\ListScreen $list_screen ) {
	return $enabled;
}, 10, 2 );

/*
 * Example hook that enabled quick always for specific post types
 */
add_filter( 'acp/quick_add/enable', function ( $enabled, AC\ListScreen $list_screen ) {
	$enabled_post_types = [ 'post', 'page', 'custom_post_type' ];

	if ( $list_screen instanceof AC\ListScreen\Post && in_array( $list_screen->get_post_type(), $enabled_post_types ) ) {
		return true;
	}

	return $enabled;
}, 10, 2 );