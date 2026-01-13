<?php
/**
 * @removed   since 7.0
 */

/**
 * Change the amount of items being prepared per batch process for Bulk Edit.
 * This process is done before the actual processing finds place.
 */

/**
 * Prepare less items if you experiencing performance issues or time out issues
 */
function acp_editing_bulk_less_items_per_iteration(int $amount): int
{
    return 100; // Default is 2000
}

add_filter('acp/editing/bulk/editable_rows_per_iteration', 'acp_editing_bulk_less_items_per_iteration');