<?php
/**
 * @removed   since 7.0
 */

/**
 * This hook allows you to alter the value that is retrieved for editing before it is displayed in the editable.
 */

function acp_editing_value_example_usage(
    $value,
    AC\Column\Context $context,
    $id,
    AC\TableScreen $table_screen,
    AC\Type\ListScreenId $list_screen_id
) {
    return $value;
}

add_filter('ac/editing/input_value', 'acp_editing_value_example_usage', 10, 5);

// Or anonymous function

add_filter('ac/editing/input_value', static function (
    $value,
    AC\Column\Context $context,
    $id,
    AC\TableScreen $table_screen,
    AC\Type\ListScreenId $list_screen_id
) {
    return $value;
}, 10, 5);

/**
 * Example to get a nested value from an associative array. You need to parse it back when saving the value with the hook `acp/editing/save_value`
 */
add_filter('ac/editing/input_value', static function (
    $value,
    AC\Column\Context $context,
    $id,
    AC\TableScreen $table_screen,
    AC\Type\ListScreenId $list_screen_id
) {
    if ($context instanceof AC\Column\CustomFieldContext) {
        $value = $value['sub_key'];
    }

    return $value;
}, 10, 5);