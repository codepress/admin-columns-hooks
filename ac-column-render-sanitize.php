<?php

function ac_column_value_sanitize_usage(
    bool $sanitize,
    AC\Setting\Context $context,
    $id,
    AC\TableScreen $table_screen,
    AC\Type\ListScreenId $list_screen_id
) {
    return $sanitize;
}

add_filter('ac/column/render/sanitize', 'ac_column_value_sanitize_usage', 10, 5);

/**
 * Shorter notation
 */
add_filter('ac/column/render/sanitize', function (
    bool $sanitize,
    AC\Setting\Context $context,
    $id,
    AC\TableScreen $table_screen,
    AC\Type\ListScreenId $list_screen_id
) {
    return $sanitize;
}, 10, 5);

// Disable sanitization for all columns
add_filter('ac/column/render/sanitize', '__return_false');

// Disable sanitization for all custom field columns
add_filter('ac/column/render/sanitize', function (bool $sanitize, AC\Setting\Context $context) {
    return $context->get_type() === 'column-meta'
        ? false
        : $sanitize;
}, 10, 2);