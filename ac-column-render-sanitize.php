<?php

function ac_column_value_sanitize_usage(bool $sanitize, AC\Column\Context $column, $id, AC\TableScreen $table)
{
    return $sanitize;
}

add_filter('ac/column/render/sanitize', 'ac_column_value_sanitize_usage', 10, 4);

/**
 * Shorter notation
 */
add_filter('ac/column/render/sanitize', function (
    bool $sanitize,
    AC\Column\Context $column,
    $id,
    AC\TableScreen $table,
) {
    return $sanitize;
}, 10, 4);

// Disable sanitization for all columns
add_filter('ac/column/render/sanitize', '__return_false');

// Disable sanitization for all custom field columns
add_filter('ac/column/render/sanitize', function (bool $sanitize, AC\Column\Context $column) {
    return $column->get_type() === 'column-meta'
        ? false
        : $sanitize;
}, 10, 2);