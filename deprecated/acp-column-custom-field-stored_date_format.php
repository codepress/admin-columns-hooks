<?php

/**
 * @deprecated since 7.0
 *             Use `acp/v2/custom_field/stored_date_format` instead.
 */

/**
 * The filter allows you to specify the stored date format for a custom field.
 * This is necessary when you are using the `date` smart filters and not seeing correct results.
 */
function acp_custom_field_stored_date_format(string $date_format, ACP\Column\CustomField $column): string
{
    // Specify the date format for a specific custom field. 'Y-m-d H:i:s', 'Y-m-d' or 'U'. Default is 'Y-m-d H:i:s'
    // $date_format = 'Y-m-d';

    return $date_format;
}

add_filter('acp/custom_field/stored_date_format', 'acp_custom_field_stored_date_format', 10, 2);

/**
 * Set the date format for a specific key to a timestamp `U`
 */
function acp_set_custom_field_stored_date_format(string $date_format, ACP\Column\CustomField $column): string
{
    if ('my_date_meta_key' === $column->get_meta_key()) {
        // Set the date format to 'U' Unix timestamp
        $date_format = 'U';
    }

    return $date_format;
}

add_filter('acp/custom_field/stored_date_format', 'acp_set_custom_field_stored_date_format', 10, 2);
