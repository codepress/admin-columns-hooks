<?php

/**
 * This filter allows you to set the data type of custom `date` field used to sort the column.
 * Not setting the correct date format can result in incorrect sorting results.
 */

/**
 * Usage of the hook
 */
function ac_sorting_custom_field_date_type(string $date_type, AC\Setting\Config $config): string
{
    // Change the custom field type e.g. 'string', 'numeric', 'date' or 'datetime'. Default is 'datetime'.
    // $date_type = 'datetime';

    return $date_type;
}

add_filter('ac/sorting/custom_field/date_type', 'ac_sorting_custom_field_date_type', 10, 2);

/**
 * Change date format for a specific meta key from the default `datetime` to a `date` or `numeric` type.
 */
add_filter('ac/sorting/custom_field/date_type', static function (string $date_type, AC\Setting\Config $config): string {
    // This is the default settings for a custom field date type
    if ('my_datetime_field' === $config->get('field')) {
        $date_type = ACP\Sorting\Type\DataType::DATETIME; // 'datetime'
    }

    // Change to numeric when working with UNIX Timestamps
    if ('my_timestamp_field' === $config->get('field')) {
        $date_type = ACP\Sorting\Type\DataType::NUMERIC; // 'numeric'
    }

    // Change to date when working with dates without time notations
    if ('my_date_field' === $config->get('field')) {
        $date_type = ACP\Sorting\Type\DataType::DATE; // 'date'
    }

    return $date_type;
}, 10, 2);