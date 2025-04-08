<?php
/**
 * The filter `ac/v2/column/value` allows you to alter the value of a column cell
 * You probably want to check for a specific column instance and check for extra conditionals related to the column in order to change the value for the correct column
 */

/**
 * @param mixed              $value The column value that is displayed within a cell on the list table
 * @param string|int         $id    Post ID, User ID, Comment ID, Attachment ID or Term ID
 * @param AC\Setting\Context $context
 *
 * @return mixed
 */
function ac_column_value_usage($value, $id, AC\Setting\Context $context)
{
    // Change the rendered column value
    // $value = 'new value';

    return $value;
}

add_filter('ac/v2/column/value', 'ac_column_value_usage', 10, 3);

/**
 * Shorter notation
 */
add_filter('ac/v2/column/value', function ($value, $id, AC\Setting\Context $context) {
    return $value;
}, 10, 3);

/**
 * Example on how to wrap the value of a specific Custom Field column of the type 'color' in markup to give it a background color.
 *
 * @param mixed              $value   Column value
 * @param int|string         $id      Post ID, User ID, Comment ID, Attachment ID or Term ID
 * @param AC\Setting\Context $context Context
 */
function ac_column_value_custom_field_example($value, $id, AC\Setting\Context $context)
{
    if ($context->get_type() === 'column-meta') {
        // Custom Field Key
        $meta_key = $context->get('meta_key');

        // Custom Field Type can be 'excerpt|color|date|numeric|image|has_content|link|checkmark|library_id|title_by_id|user_by_id|array|count'. The default is ''.
        $custom_field_type = $context->get('field_type');

        if ('my_hex_color' === $meta_key && 'color' === $custom_field_type) {
            $value = sprintf('<span style="background-color: %1$s">%1$s</span>', $value);
        }
    }

    return $value;
}

add_filter('ac/column/value', 'ac_column_value_custom_field_example', 10, 3);

/**
 * Example on how to add a `class` attribute to the rendered value that can be styled by CSS.
 *
 * @param mixed              $value   Column value
 * @param int|string         $id      Post ID, User ID, Comment ID, Attachment ID or Term ID
 * @param AC\Setting\Context $context Context
 */
function ac_column_value_add_class_attribute_based_on_value($value, $id, AC\Setting\Context $context)
{
    if ($context->get_type() === 'column-meta') {
        // Add a unique `class` attribute to the rendered value.

        if ('my_custom_field_key' === $context->get('meta_key')) {
            $value = sprintf(
                '<span class="%s %s">%s</span>',
                esc_attr('column-' . $context->get('name')), // Add the column name to the `class` attribute
                esc_attr('value-' . sanitize_key($value)),  // Add a sanitized column value to the `class` attribute
                $value
            );
        }
    }

    return $value;
}

add_filter('ac/column/value', 'ac_column_value_add_class_attribute_based_on_value', 10, 3);
