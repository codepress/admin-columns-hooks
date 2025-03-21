<?php
/**
 * This hook allows you to alter the exported value when generating a CSV file
 */

add_filter('ac/export/value', function (string $value, AC\Column $column, $id): string {
    return $value;
}, 10, 3);

/**
 * Change the exported date format to 'Y-m-d' for a custom field.
 */
function acp_export_change_export_date_format(string $value, AC\Column $column): string
{
    if ($column instanceof AC\Column\CustomField && 'date' === $column->get_field_type()) {
        $timestamp = ac_helper()->date->strtotime($value);

        if ($timestamp) {
            $value = date('Y-m-d', $timestamp);
        }
    }

    return $value;
}

add_filter('ac/export/value', 'acp_export_change_export_date_format', 10, 2);

/**
 * Alter the column value from a `Attachment ID` to an `Image URL` for an ACF field of the type `Image`.
 *
 * @param string     $value
 * @param AC\Column  $column
 * @param int|string $id
 *
 * @return string
 */
function acp_export_change_acf_image_export_value(string $value, AC\Column $column, $id): string
{
    if ($column instanceof ACA\ACF\Column && 'image' === $column->get_field_type()) {
        // In this example `$value` is an attachment ID
        $attchment_id = (int)$value;

        $image_src = wp_get_attachment_image_src($attchment_id);

        // Replace `$value` with the Image URL
        $value = $image_src[0];
    }

    return $value;
}

add_filter('ac/export/value', 'acp_export_change_acf_image_export_value', 10, 3);

/**
 * Example on how to strip HTML from the exported value
 */
function ac_column_export_value_strip_html(string $value, AC\Column $column): string
{
    // Check for a custom field column
    if ($column instanceof ACP\Column\CustomField) {
        // The meta key you want the HTML stripped from
        $meta_key = 'my_custom_field_key';

        if ($meta_key === $column->get_meta_key()) {
            // Strips all HTML.
            // Example: '<a href="#">my label</a>' will become 'my label'.
            $value = strip_tags($value);
        }
    }

    return $value;
}

add_filter('ac/export/value', 'ac_column_export_value_strip_html', 10, 2);

/**
 * Change the number format to use comma (,) as its decimal separator
 */
function acp_export_change_number_format(string $value, AC\Column $column): string
{
    // The meta key you want to apply a different number format
    $meta_key = 'my_number_meta_key';

    // Check for a custom field column type and the correct meta key
    if ($column instanceof AC\Column\CustomField && $meta_key === $column->get_meta_key()) {
        // Change decimal separator to a comma
        $value = number_format($value, 2, ',', '');
    }

    return $value;
}

add_filter('ac/export/value', 'acp_export_change_number_format', 10, 2);