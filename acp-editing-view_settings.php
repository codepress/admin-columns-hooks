<?php
/**
 * Change the behavior of the editable for a specific column.
 * Mostly use to alter the behavior of Custom Field columns
 */

/**
 * Example code that explains what can be done with this hook
 *
 * @param array     $data
 * @param AC\Column $column
 *
 * @return mixed
 */
function acp_editing_view_settings_usage_example($data, AC\Column $column)
{
    // First Check for a specific column
    // if( $column instanceof \AC\Column\Meta ){}
    // if( $column->get_type() === 'column-ancestors'
    // if( $column->get_name() === 'generated_name'

    // Now alter Data
    $data['type'] = 'select'; // text|select|textarea|media|email|select2_dropdown
    $data['options'] = []; // works in combination with select type
    $data['multiple'] = true; // works in combination with select type

    return $data;
}

add_filter('acp/editing/view_settings', 'acp_editing_view_settings_usage_example', 10, 2);

/**
 * Change the editing settings for a specific Custom Field
 * Set the edit type to a drop down box with defined options
 *
 * @param array     $data
 * @param AC\Column $column
 *
 * @return mixed
 */
function acp_editing_view_settings_change_select_options_example($data, AC\Column $column)
{
    if ($column instanceof AC\Column\Meta && 'my_fruit_custom_field_key' === $column->get_meta_key()) {
        $data['type'] = 'select';
        $data['options'] = [
            'apple'  => 'Apple',
            'orange' => 'Orange',
            'banana' => 'Banana',
            'pear'   => 'Pear',
        ];
    }

    return $data;
}

add_filter('acp/editing/view_settings', 'acp_editing_view_settings_change_select_options_example', 10, 2);

/**
 * Change the editing settings for a specific Custom Field
 * Set specific numeric field settings
 *
 * @param array     $data
 * @param AC\Column $column
 *
 * @return mixed
 */
function acp_editing_view_settings_change_numeric_custom_field_example($data, AC\Column $column)
{
    if ($column instanceof AC\Column\Meta && 'my_custom_numeric_field_key' === $column->get_meta_key()) {
        $data['type'] = 'number';
        $data['range_min'] = 1;
        $data['range_max'] = 5;
        $data['range_step'] = 1;
    }

    return $data;
}

add_filter('acp/editing/view_settings', 'acp_editing_view_settings_change_numeric_custom_field_example', 10, 2);

/**
 * Enable Bulk Editing for Content column
 *
 * @param array     $data
 * @param AC\Column $column
 *
 * @return mixed
 */

function acp_editing_view_settings_enable_bulk_editing_for_content_column($data, AC\Column $column)
{
    if ($column instanceof AC\Column\Post\Content) {
        $data['bulk_editable'] = true;
    }

    return $data;
}

add_filter('acp/editing/view_settings', 'acp_editing_view_settings_enable_bulk_editing_for_content_column', 10, 2);

/**
 * Enables the clear button for every column
 */
function acp_editing_view_settings_always_enable_clear_button($data)
{
    $data['clear_button'] = true;

    return $data;
}

add_filter('acp/editing/view_settings', 'acp_editing_view_settings_always_enable_clear_button', 10, 1);