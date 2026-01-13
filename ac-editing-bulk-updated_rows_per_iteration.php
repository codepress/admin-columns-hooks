<?php

/**
 * The filter acp/editing/bulk/updated_rows_per_iteration allows you to set the number of records that is processed per iteration with Bulk Edit.
 * The default number is 250, but if you have a slow server, you may want to lower this number.
 */

/**
 * Reduce the amount of items that is saved per batch operation.
 * Lower this when experiencing time out issues
 */
function acp_editing_bulk_reduce_records_to_update_per_iteration(int $number): int
{
    return 10; // Default is 250
}

add_filter('ac/editing/bulk/updated_rows_per_iteration', 'acp_editing_bulk_reduce_records_to_update_per_iteration');

/**
 * Example to set the amount for a specific Table
 */
add_filter('ac/editing/bulk/updated_rows_per_iteration', static function (int $number, AC\ListScreen $listScreen) {
    if ($listScreen->get_key()->equals(new AC\Type\ListKey('page'))) {
        $number = 10;
    }

    return $number;
}, 10, 2);