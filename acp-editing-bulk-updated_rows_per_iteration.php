<?php
/**
 * The filter acp/editing/bulk/updated_rows_per_iteration allows you to set the number of records that is processed per iteration with Bulk Edit.
 * The default number is 250, but if you have a slow server, you may want to lower this number.
 */

/**
 * Reduce the amount of items that is saved per batch operation.
 * Lower this when experiencing time out issues
 *
 * @param int $number Default is 250.
 *
 * @return int
 */
function acp_editing_bulk_reduce_records_to_update_per_iteration( $number ) {
	return 10; // Default is 250
}

add_filter( 'acp/editing/bulk/updated_rows_per_iteration', 'acp_editing_bulk_reduce_records_to_update_per_iteration' );