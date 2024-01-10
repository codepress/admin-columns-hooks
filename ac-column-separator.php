<?php
/**
 * The filter `ac/column/separator` allows you to alter the separator value of a column cell
 * You probably want to check for a specific column instance and check for extra conditionals related to the column in order to change the value for the correct column
 */

use ACA\ACF\Column;
use ACA\ACF\Field\Type\Relationship;

/**
 * @param string    $separator The column separator value
 * @param AC\Column $column    Column object
 *
 * @return string
 */
function ac_column_separator($separator, AC\Column $column)
{
    // Change the rendered column separator value
    // $separator = ',';

    return $separator;
}

add_filter('ac/column/separator', 'ac_column_separator', 10, 3);

// Changes the separator value from a comma (,) to a newline (<br>) for an ACF relationship column
add_filter('ac/column/separator', function ($separator, $column) {
    if ($column instanceof Column && $column->get_field() instanceof Relationship) {
        $separator = "<br>";
    }

    return $separator;
}, 10, 2);
