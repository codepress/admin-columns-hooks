<?php

/**
 * This contains examples on the available template functions for Admin Columns
 */
function acp_loaded() {

	/**
	 * The "List Screen ID' can be found by opening the screen options in the top-right corner of the
	 * admin columns settings page. Enable the "List screen ID" by clicking the checkbox next to it.
	 * The list screen ID will now be visible in the right sidebar.
	 * @var string $list_screen_id
	 */
	$list_screen_id = "<LIST SCREEN ID GOES HERE>"; // e.g. '5e84e8302794f'

	/**
	 * @var AC\ListScreen $list_screen
	 */
	$list_screen = ac_get_list_screen( $list_screen_id );

	/**
	 * Get all column objects
	 * @var AC\Column[] $columns
	 */
	$columns = $list_screen->get_columns();

	/**
	 * The "Column Name/ID" can be found by opening the screen options in the top-right corner of the
	 * admin columns settings page. Enable the "Column ID" by clicking the checkbox next to it.
	 * The Column Name/ID will now be visible for each column.
	 * @var string $column_name The column's identifier
	 */
	$column_name = "<COLUMN NAME/ID GOES HERE>"; // e.g. '5f2a7bb898468' or 'title'

	/**
	 * Get a single column object
	 * @var AC\Column $column
	 */
	$column = $list_screen->get_column_by_name( $column_name );

}

add_action( 'wp_loaded', 'acp_loaded' );
