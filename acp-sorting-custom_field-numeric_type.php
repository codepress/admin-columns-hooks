<?php

/**
 * This filter allows you to set the data type of custom `numeric` field used to sort the column.
 */

/**
 * Usage of the hook
 */
function acp_sorting_custom_field_numeric_type(string $date_type, AC\Column\CustomField $column): string
{
    // Change the custom field type e.g. 'numeric' or 'decimal'
    // $date_type = 'numeric';

    return $date_type;
}

add_filter('acp/sorting/custom_field/date_type', 'acp_sorting_custom_field_numeric_type', 10, 2);

/**
 * Set the sorting data type for a specific custom field to decimal
 */
function acp_sorting_use_decimal_data_type_for_specific_field(string $date_type, AC\Column\CustomField $column): string
{
    if ('you_meta_key' === $column->get_meta_key()) {
        $date_type = 'decimal';
    }

    return $date_type;
}

add_filter('acp/sorting/custom_field/numeric_type', 'acp_sorting_use_decimal_data_type_for_specific_field', 10, 2);

/**
 * Set the sorting data type for a specific custom field
 */
function acp_sorting_use_decimal_data_type(): string
{
    return 'decimal';
}

add_filter('acp/sorting/custom_field/numeric_type', 'acp_sorting_use_decimal_data_type', 10, 2);