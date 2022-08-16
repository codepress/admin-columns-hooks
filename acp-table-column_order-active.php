<?php
/**
 * The filter `acp/table/column_order/active` allows you to toggle the column order feature programmatically for the provided list screen
 */

/**
 * @param bool          $active      The column value that is displayed within a cell on the list table
 * @param AC\ListScreen $list_screen Post ID, User ID, Comment ID, Attachement ID or Term ID
 *
 * @return bool
 */
add_filter( 'acp/table/column_order/active', function ( $active, AC\ListScreen $list_screen ) {
	return $active;
}, 10, 2 );

/**
 * Example for specific list screen checks
 */
add_filter( 'acp/table/column_order/active', function ( $active, AC\ListScreen $list_screen ) {
	switch ( true ) {
		case $list_screen instanceof AC\ListScreen\User:
			// Disable for user list table
			return false;
		case $list_screen instanceof AC\ListScreen\Post:
			// Only enable for posts, disable for other post types
			return $list_screen->get_post_type() === 'post';
		default:
			return $active;
	}
}, 10, 2 );