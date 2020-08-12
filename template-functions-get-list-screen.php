<?php

/**
 * Fetch a single list screen by its ID
 */
function acp_loaded() {

	/**
	 * The "List Screen ID" can be found by opening the screen options in the top-right corner of the
	 * admin columns settings page. Enable the "List screen ID" by clicking the checkbox next to it.
	 * The list screen ID will now be visible in the right sidebar.
	 * @var string $list_screen_id
	 */
	$list_screen_id = "<LIST SCREEN ID GOES HERE>"; // e.g. '5e84e8302794f'

	/**
	 * @var AC\ListScreen $list_screen
	 */
	$list_screen = ac_get_list_screen( $list_screen_id );

}

add_action( 'wp_loaded', 'acp_loaded' );
