<?php

/**
 * The filter allows you to specify the stored date format for a custom field.
 * This is necessary when you are using the `date` smart filters and not seeing correct results.
 */
function acp_custom_field_stored_date_format(string $date_format, AC\Setting\Context $context): string
{
    // Specify the date format for a specific custom field. 'Y-m-d H:i:s', 'Y-m-d' or 'U'. Default is 'Y-m-d H:i:s'
    // $date_format = 'Y-m-d';

    return $date_format;
}

add_filter('ac/custom_field/stored_date_format', 'acp_custom_field_stored_date_format', 10, 2);

/**
 * Set the date format for a specific key to a timestamp `U`
 */
function acp_set_custom_field_stored_date_format(string $date_format, AC\Setting\Context $context): string
{
    if ($context instanceof AC\Setting\Context\CustomField && 'my_date_meta_key' === $context->get('meta_key')) {
        // Set the date format to 'U' Unix timestamp
        $date_format = 'U';
    }

    return $date_format;
}

add_filter('ac/custom_field/stored_date_format', 'acp_set_custom_field_stored_date_format', 10, 2);
