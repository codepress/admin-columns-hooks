<?php

/**
 * Filter for changing the value before storing it to the DB
 *
 * @param mixed      $value  Value send from inline edit ajax callback
 * @param AC\Column  $column Column object
 * @param int|string $id     Post/User/Comment ID
 *
 * @return mixed
 */
function my_acp_editable_ajax_column_save_value($value, AC\Column $column, $id)
{
    // Possibly modify $value

    return $value;
}

add_filter('acp/v2/editing/save_value', 'my_acp_editable_ajax_column_save_value', 10, 3);