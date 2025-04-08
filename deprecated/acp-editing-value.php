<?php
/**
 * @removed   since 7.0
 */

/**
 * This hook allows you to alter the value that is retrieved for editing before it is displayed in the editable.
 */

/**
 * @param mixed      $value
 * @param int|string $id
 * @param AC\Column  $column
 *
 * @return mixed
 */
function acp_editing_value_example_usage($value, $id, AC\Column $column)
{
    return $value;
}

add_filter('acp/editing/value', 'acp_editing_value_example_usage', 10, 3);

// Or anonymous function

add_filter('acp/editing/value', function ($value, $id, AC\Column $column) {
    return $value;
}, 10, 3);

/**
 * Example to get a nested value from an associative array. You need to parse it back when saving the value with the hook `acp/editing/save_value`
 *
 * @param mixed      $value
 * @param int|string $id
 * @param AC\Column  $column
 *
 * @return mixed
 */
function acp_editing_value_get_nested_value($value, $id, AC\Column $column)
{
    if ($column instanceof AC\Column\Customfield && 'my_custom_field_key' === $column->get_meta_key()) {
        $value = $value['sub_key'];
    }

    return $value;
}

add_filter('acp/editing/value', 'acp_editing_value_get_nested_value', 10, 3);