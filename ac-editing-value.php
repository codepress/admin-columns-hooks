<?php

/**
 * This hook allows you to alter the value that is retrieved for editing before it is displayed in the editable.
 */

function ac_editing_value_example_usage(
    $value,
    AC\Column\Context $column,
    $id,
    AC\TableScreen $table,
    AC\Type\ListScreenId $list_screen_id
) {
    return $value;
}

add_filter('ac/editing/input_value', 'ac_editing_value_example_usage', 10, 5);

// Or anonymous function

add_filter('ac/editing/input_value', static function (
    $value,
    AC\Column\Context $column,
    $id,
    AC\TableScreen $table,
    AC\Type\ListScreenId $list_screen_id
) {
    return $value;
}, 10, 5);

/**
 * Example to get a nested value from an associative array. You need to parse it back when saving the value with the hook `acp/editing/save_value`
 */
add_filter('ac/editing/input_value', static function (
    $value,
    AC\Column\Context $column,
    $id,
    AC\TableScreen $table,
    AC\Type\ListScreenId $list_screen_id
) {
    if ($column instanceof AC\Column\CustomFieldContext) {
        $value = $value['sub_key'];
    }

    return $value;
}, 10, 5);