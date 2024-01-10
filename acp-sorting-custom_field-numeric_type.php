<?php

/**
 * This filter allows you to set the data type of a custom `numeric` field used to sort the column.
 */

/**
 * Usage of the hook
 *
 * @param string                $date_type 'numeric' or 'decimal'.
 * @param AC\Column\CustomField $column
 *
 * @return string
 */
function acp_sorting_custom_field_numeric_type($date_type, AC\Column\CustomField $column)
{
    // Change the custom field type
    // $data_type = 'numeric';

    return $date_type;
}

add_filter('acp/sorting/custom_field/date_type', 'acp_sorting_custom_field_numeric_type', 10, 2);

/**
 * Set the sorting data type for a specific custom field to decimal
 *
 * @param string                $date_type 'numeric' or 'decimal'.
 * @param AC\Column\CustomField $column
 *
 * @return string
 */
function acp_sorting_use_decimal_data_type_for_specific_field($data_type, AC\Column\CustomField $column)
{
    if ('you_meta_key' === $column->get_meta_key()) {
        $data_type = 'decimal';
    }

    return $data_type;
}

add_filter('acp/sorting/custom_field/numeric_type', 'acp_sorting_use_decimal_data_type_for_specific_field', 10, 2);

/**
 * Set the sorting data type for a specific custom field
 * @return string
 */
function acp_sorting_use_decimal_data_type()
{
    return 'decimal';
}

add_filter('acp/sorting/custom_field/numeric_type', 'acp_sorting_use_decimal_data_type', 10, 2);