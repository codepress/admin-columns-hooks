<?php
/**
 * The filter `ac/column/value` allows you to alter the value of a column cell
 * You probably want to check for a specific column instance and check for extra conditionals related to the column in order to change the value for the correct column
 */

/**
 * @param mixed      $value  The column value that is displayed within a cell on the list table
 * @param string|int $id     Post ID, User ID, Comment ID, Attachment ID or Term ID
 * @param AC\Column  $column Column object
 *
 * @return mixed
 */
function ac_column_value_usage($value, $id, AC\Column $column)
{
    // Change the rendered column value
    // $value = 'new value';

    return $value;
}

add_filter('ac/column/value', 'ac_column_value_usage', 10, 3);

/**
 * Shorter notation
 */
add_filter('ac/column/value', function ($value, $id, AC\Column $column) {
    return $value;
}, 10, 3);

/**
 * Example on how to wrap the value of a specific Custom Field column of the type 'color' in markup to give it a background color.
 *
 * @param mixed      $value  Column value
 * @param int|string $id     Post ID, User ID, Comment ID, Attachment ID or Term ID
 * @param AC\Column  $column Column object
 *
 * @return mixed
 */
function ac_column_value_custom_field_example($value, $id, AC\Column $column)
{
    if ($column instanceof AC\Column\CustomField) {
        // Custom Field Key
        $meta_key = $column->get_meta_key();

        // Custom Field Type can be 'excerpt|color|date|numeric|image|has_content|link|checkmark|library_id|title_by_id|user_by_id|array|count'. The default is ''.
        $custom_field_type = $column->get_field_type();

        if (
            'my_hex_color' === $meta_key
            && 'color' === $custom_field_type
        ) {
            $value = sprintf('<span style="background-color: %1$s">%1$s</span>', $value);
        }
    }

    return $value;
}

add_filter('ac/column/value', 'ac_column_value_custom_field_example', 10, 3);

/**
 * Example on how to add a `class` attribute to the rendered value that can be styled by CSS.
 *
 * @param mixed      $value  Column value
 * @param int|string $id     Post ID, User ID, Comment ID, Attachment ID or Term ID
 * @param AC\Column  $column Column object
 *
 * @return mixed
 */
function ac_column_value_add_class_attribute_based_on_value($value, $id, AC\Column $column)
{
    if ($column instanceof AC\Column\CustomField) {
        // Add a unique `class` attribute to the rendered value.

        if ('my_custom_field_key' === $column->get_meta_key()) {
            $value = sprintf(
                '<span class="%s %s">%s</span>',
                esc_attr('column-' . $column->get_name()), // Add the column name to the `class` attribute
                esc_attr('value-' . sanitize_key($value)),  // Add a sanitized column value to the `class` attribute
                $value
            );
        }
    }

    return $value;
}

add_filter('ac/column/value', 'ac_column_value_add_class_attribute_based_on_value', 10, 3);

/**
 * Example on how change the rendered custom field value on the 'Page' list table.
 *
 * @param mixed      $value  Column value
 * @param int|string $id     Post ID, User ID, Comment ID, Attachment ID or Term ID
 * @param AC\Column  $column Column object
 *
 * @return mixed
 */
function ac_column_value_display_word_count($value, $id, AC\Column $column)
{
    if ($column instanceof AC\Column\CustomField) {
        // Post type
        $post_type = $column->get_post_type();

        // Custom Field Key
        $meta_key = $column->get_meta_key();

        if (
            'page' === $post_type
            && 'my_custom_text_field' === $meta_key
        ) {
            // We use our own utility method to count the number of words. But feel free to use your own logic.
            $value = ac_helper()->string->word_count((string)$value);
        }
    }

    return $value;
}

add_filter('ac/column/value', 'ac_column_value_display_word_count', 10, 3);

/**
 * Example on how to alter the value based on an ACF Column. It defines different variables that can be used to check for specific conditionals
 *
 * @param mixed      $value  Column value
 * @param int|string $id     Post ID, User ID, Comment ID, Attachment ID or Term ID
 * @param AC\Column  $column Column object
 *
 * @return mixed
 */
function ac_column_value_acf_example($value, $id, AC\Column $column)
{
    // Check for the ACF column
    if ($column instanceof ACA\ACF\Column) {
        /**
         * Contains all ACF field information
         */
        $field_settings = $column->get_field()->get_settings();

        /**
         * The unique identifier for the ACF field
         */
        $field_hash = $column->get_field_hash();

        /**
         * Contains the complete list of available ACF field types 'text|number|url|radio|post_object|link|wysiwyg'
         * @see ACA\ACF\FieldType
         */
        $field_type = $column->get_field_type();

        /**
         * Custom Field `meta_key`
         */
        $meta_key = $column->get_meta_key();

        // Modify the rendered column value for the ACF `text` field type
        if (
            'my_custom_field_key' === $meta_key
            && 'text' === $field_type
        ) {
            // In this example we will append a string
            $value .= ' ( Additional Text )';
        }
    }

    return $value;
}

add_filter('ac/column/value', 'ac_column_value_acf_example', 10, 3);

/**
 * Example to target the taxonomy column and prefix it with the taxonomy name
 */
function ac_column_value_taxonomy_example($value, $id, AC\Column $column)
{
    $taxonomy = $column->get_taxonomy();

    if ($taxonomy) {
        $value = $taxonomy . ' > ' . $value;
    }

    return $value;
}

add_filter('ac/column/value', 'ac_column_value_taxonomy_example', 10, 3);

/**
 * Example to wrap a custom field columns value in a link tag
 */
function ac_column_value_wrap_custom_field_in_post_link($value, $id, AC\Column $column)
{
    if (
        $column->get_post_type() &&
        $column instanceof AC\Column\CustomField &&
        'my_own_key' === $column->get_meta_key()
    ) {
        $value = sprintf('<a href="%s">%s</a>', get_permalink($id), $value);
    }

    return $value;
}

add_filter('ac/column/value', 'ac_column_value_wrap_custom_field_in_post_link', 10, 3);
