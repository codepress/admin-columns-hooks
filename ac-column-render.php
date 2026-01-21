<?php
/**
 * The filter `aac/column/render` allows you to alter the value of a column cell
 * You probably want to check for a specific column instance and check for extra conditionals related to the column in order to change the value for the correct column
 */

/**
 * @param mixed             $value        The column value that is displayed within a cell on the list table
 * @param AC\Column\Context $context
 * @param string|int        $id           Post ID, User ID, Comment ID, Attachment ID or Term ID
 * @param AC\TableScreen    $table_screen This onject contains info about the list table: Post, User, Comment, Taxonomy etc.
 *
 * @return mixed
 */
function ac_column_value_usage($value, AC\Column\Context $context, $id, AC\TableScreen $table_screen)
{
    // Change the rendered column value
    // $value = 'new value';

    return $value;
}

add_filter('ac/column/render', 'ac_column_value_usage', 10, 4);

/**
 * Shorter notation
 */
add_filter('ac/column/render', function ($value, AC\Column\Context $context, $id, AC\TableScreen $table_screen) {
    return $value;
}, 10, 4);

/**
 * Example on how to wrap the value of a specific Custom Field column of the type 'color' in markup to give it a background color.
 */
function ac_column_value_custom_field_example($value, AC\Column\Context $context, $id, AC\TableScreen $table_screen)
{
    // Post type of the post list table
    $post_type = $table_screen instanceof AC\PostType
        ? (string)$table_screen->get_post_type() // e.g. post, page, product, custom-post-type etc.
        : null;

    // Unique identifier for the list table
    $table_id = (string)$table_screen->get_id(); // e.g. post, page, wp-users, wp-comments, wp-taxonomy etc.

    // Taxonomy slug of the taxonomy list table
    $taxonomy = $table_screen instanceof AC\Taxonomy
        ? (string)$table_screen->get_taxonomy() // e.g. post_tag, category etc.
        : null;

    // List table labels
    $label = $table_screen->get_labels()->get_singular(); // e.g. Post, Page, Comment, User, Tag etc.
    $label_plural = $table_screen->get_labels()->get_plural(); // e.g. Posts, Pages Comments, Users, Tags etc.

    // Targets page list table with a specific custom field column
    if ('page' === $post_type && $context instanceof AC\Column\CustomFieldContext) {
        // Custom Field Key
        $meta_key = $context->get_meta_key();

        // Custom Field Type can be 'excerpt|color|date|numeric|image|has_content|link|checkmark|library_id|title_by_id|user_by_id|array|count'. The default is ''.
        $custom_field_type = $context->get_field_type();

        // Other properties
        $column_name = $context->get_name(); // e.g. 62542279f0624c
        $column_type = $context->get_type(); // column-meta
        //$column_custom_label = $context->get_label(); // e.g. My Custom Field Column Title
        //$column_type_label = $context->get_type_label(); // e.g. Custom Field

        if ('my_hex_color' === $meta_key && 'color' === $custom_field_type) {
            $value = sprintf('<span style="background-color: %1$s">%1$s</span>', $value);
        }
    }

    return $value;
}

add_filter('ac/column/render', 'ac_column_value_custom_field_example', 10, 4);

/**
 * Example on how to add a `class` attribute to the rendered value that can be styled by CSS.
 */
function ac_column_value_add_class_attribute_based_on_value(
    $value,
    AC\Column\Context $context,
    $id,
    AC\TableScreen $table_screen
) {
    if ($context instanceof AC\Column\CustomFieldContext) {
        // Add a unique `class` attribute to the rendered value.

        if ('my_custom_field_key' === $context->get_meta_key()) {
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

add_filter('ac/column/render', 'ac_column_value_add_class_attribute_based_on_value', 10, 4);

function ac_column_value_acf_example($value, AC\Column\Context $context, $id, AC\TableScreen $table_screen)
{
    // Check for the ACF column
    if ($context instanceof ACA\ACF\Column\Context) {
        /**
         * Contains all ACF field information
         */
        $field_settings = $context->get_field();

        /**
         * The unique identifier for the ACF field
         */
        $field_hash = $context->get_field_key();

        /**
         * Contains the complete list of available ACF field types 'text|number|url|radio|post_object|link|wysiwyg'
         * @see ACA\ACF\FieldType
         */
        $field_type = $context->get_field_type();

        /**
         * Custom Field `meta_key`
         */
        $meta_key = $context->get_meta_key();

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

add_filter('ac/column/render', 'ac_column_value_acf_example', 10, 4);

/**
 * Example of checking for multiple available context types
 */
add_filter('ac/column/render', function ($value, AC\Column\Context $context, $id, AC\TableScreen $table_screen) {
    if ($context instanceof ACA\ACF\Column\Context) {
        return $context->get_field_type();
    }

    if ($context instanceof ACA\Types\Column\RelationshipContext) {
        return $context->get_type() . $context->get_relation()['type'];
    }

    if ($context instanceof ACA\Types\Column\FieldContext) {
        return $context->get_field_type() . ': ' . $context->get_meta_key();
    }

    if ($context instanceof ACA\JetEngine\Column\FieldContext) {
        return $context->get_field_type() . ': ' . $context->get_meta_key();
    }

    if ($context instanceof ACA\JetEngine\Column\RelationContext) {
        return $context->get_relation()->get_relation_name();
    }

    if ($context instanceof ACA\MetaBox\Column\RelationContext) {
        return $context->get_relation()->get_related_meta_type();
    }

    if ($context instanceof ACA\MetaBox\Column\FieldContext) {
        return $context->get_field_type() . ' - ' . $context->get_meta_key();
    }

    if ($context instanceof ACA\Pods\Column\FieldContext) {
        return $context->get_field_type() . ' - ' . $context->get_meta_key();
    }

    if ($context instanceof AC\Column\CustomFieldContext) {
        return $context->get_field_type();
    }

    return $value;
}, 10, 4);