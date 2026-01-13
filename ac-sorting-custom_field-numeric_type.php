<?php

/**
 * This filter allows you to set the data type of custom `numeric` field used to sort the column.
 */

/**
 * Usage of the hook
 */
function ac_sorting_custom_field_numeric_type(string $date_type, AC\Setting\Config $config): string
{
    // Change the custom field type e.g. 'numeric' or 'decimal'
    // $date_type = 'numeric';

    return $date_type;
}

add_filter('ac/sorting/custom_field/date_type', 'ac_sorting_custom_field_numeric_type', 10, 2);

/**
 * Set the sorting data type for a specific custom field to decimal
 */
function ac_sorting_use_decimal_data_type_for_specific_field(string $date_type, AC\Setting\Config $config): string
{
    if ('you_meta_key' === $config->get('field')) {
        $date_type = 'decimal';
    }

    return $date_type;
}

add_filter('ac/sorting/custom_field/numeric_type', 'ac_sorting_use_decimal_data_type_for_specific_field', 10, 2);

/**
 * Set the sorting data type for a specific custom field
 */
function ac_sorting_use_decimal_data_type(): string
{
    return 'decimal';
}

add_filter('ac/sorting/custom_field/numeric_type', 'ac_sorting_use_decimal_data_type', 10, 2);