<?php
/**
 * The filter `ac/column/separator` allows you to alter the separator value of a column cell
 * You probably want to check for a specific column instance and check for extra conditionals related to the column in order to change the value for the correct column
 */

function ac_column_separator(string $separator, AC\Column $column): string
{
    // Change the rendered column separator value
    // $separator = ',';

    return $separator;
}

add_filter('ac/column/separator', 'ac_column_separator', 10, 3);

/**
 * Changes the separator value from a comma (,) to a newline (<br>) for an ACF relationship column
 */
add_filter('ac/column/separator', function (string $separator, AC\Column $column) {
    if ($column instanceof ACA\ACF\Column && $column->get_field() instanceof ACA\ACF\Field\Type\Relationship) {
        $separator = "<br>";
    }

    return $separator;
}, 10, 2);
