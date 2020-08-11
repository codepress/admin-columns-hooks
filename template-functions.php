<?php

/**
 * This contains examples on the available template functions for Admin Columns
 */

function acp_loaded() {

	/**
	 * The "List Screen ID' can be found by opening the screen options in the top-right corner of the
	 * admin columns settings page. Enable the "List screen ID" by clicking the checkbox next to it.
	 * The list screen ID will now be visible in the right sidebar.
	 */
	$list_screen_id = "<LIST SCREEN ID GOES HERE>"; // e.g. 5e84e8302794f

	/**
	 * When you want to use `ac_get_list_screen`, make sure you load it within or after the 'wp_loaded' hook.
	 * @var AC\ListScreen $list_screen Contains all data about the list table.
	 */
	$list_screen = ac_get_list_screen( $list_screen_id );

	/**
	 * @var AC\Column[] $columns All the columns that are stored within the list screen
	 */
	$columns = $list_screen->get_columns();

}

add_action( 'wp_loaded', 'acp_loaded' );
