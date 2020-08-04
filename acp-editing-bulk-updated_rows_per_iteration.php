<?php
/**
 * Change the amount of items being prepared per batch process for Bulk Edit.
 * This process is done before the actual processing finds place.
 * Default amount is 2000
 */

/**
 * Prepare less items if you experiencing performance issues or time out issues
 *
 * @param int $amount
 */
function acp_editing_bulk_less_items_per_iteration( $amount ) {
	return 100;
}

add_filter( 'acp/editing/bulk/editable_rows_per_iteration', 'acp_editing_bulk_less_items_per_iteration' );