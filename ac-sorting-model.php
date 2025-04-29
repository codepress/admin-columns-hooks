<?php

/**
 * This filter allows you to set which column should be used to sort by as a default.
 */

/**
 * Usage of the hook
 */
function ac_sorting_model(
    ?ACP\Sorting\Model\QueryBindings $model,
    AC\Setting\Context $context,
    AC\TableScreen $table_screen
): ?ACP\Sorting\Model\QueryBindings {
    // Change the sorting modal loaded for the column

    return $model;
}

add_filter('ac/sorting/model', 'ac_sorting_model', 10, 3);

/**
 * Example of a custom sorting model
 */
add_filter('ac/sorting/model', static function (
    ?ACP\Sorting\Model\QueryBindings $model,
    AC\Setting\Context $context,
    AC\TableScreen $table_screen
) {
    // force a specific column to sort on Post Status
    if ($context->get_type() === 'my_custom_type') {
        return new ACP\Sorting\Model\Post\Status();
    }

    return $model;
}, 10, 3);