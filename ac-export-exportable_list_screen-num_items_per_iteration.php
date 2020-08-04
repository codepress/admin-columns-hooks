<?php
/**
 * The following hook allows you to alter the number of items that are processed per call.
 * Lower this number when the iterations run into a timeout
 * Default is set to 250
 */

/**
 * @param int                 $number
 * @param ACP\Export\Strategy $stategy
 *
 * @return int
 */
function acp_export_increase_number_per_iteration( $number ) {
	// Default = 250;
	return 500;
}

add_filter( 'ac/export/exportable_list_screen/num_items_per_iteration', 'acp_export_increase_number_per_iteration', 10, 1 );

/**
 * Set a different number of items to be exported per iteration for different list screens
 *
 * @param int                 $number
 * @param ACP\Export\Strategy $stategy
 *
 * @return int
 */
function acp_export_set_number_of_exported_items_per_iteration_per_list_screen( $number, ACP\Export\Strategy $stategy ) {
	$list_screen = $stategy->get_list_screen();

	switch ( true ) {
		case $list_screen instanceof AC\ListScreen\Post:
			return 100;
		case $list_screen instanceof AC\ListScreen\User:
			return 200;
		case $list_screen instanceof AC\ListScreen\Comment:
			return 300;
		default:
			return $number;
	}
}

add_filter( 'ac/export/exportable_list_screen/num_items_per_iteration', 'acp_export_set_number_of_exported_items_per_iteration_per_list_screen', 10, 2 );