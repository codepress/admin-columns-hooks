<?php
/**
 * The following hook allows you to alter the number of items that are processed per call.
 * Lower this number when the iterations run into a timeout
 * Default is set to 250
 */

function ac_export_increase_number_per_iteration(int $number): int
{
    // Default = 250;
    return 500;
}

add_filter('ac/export/exportable_list_screen/num_items_per_iteration', 'ac_export_increase_number_per_iteration');

/**
 * Set a different number of items to be exported per iteration for different list screens
 *
 * @param int                 $number
 * @param ACP\Export\Strategy $stategy
 *
 * @return int
 */
function ac_export_set_number_of_exported_items_per_iteration_per_list_screen(
    int $number,
    ACP\Export\Strategy $stategy
): int {
    $table_screen = $stategy->get_list_screen()
                            ->get_table_screen();

    switch (true) {
        case $table_screen instanceof AC\PostType:
            return 100;
        case $table_screen instanceof AC\TableScreen\User:
            return 200;
        case $table_screen instanceof AC\TableScreen\Comment:
            return 300;
        default:
            return $number;
    }
}

add_filter(
    'ac/export/exportable_list_screen/num_items_per_iteration',
    'ac_export_set_number_of_exported_items_per_iteration_per_list_screen',
    10,
    2
);