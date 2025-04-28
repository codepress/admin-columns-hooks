<?php
/**
 * The filter `aac/column/render` allows you to alter the value of a column cell
 * You probably want to check for a specific column instance and check for extra conditionals related to the column in order to change the value for the correct column
 */

/**
 * @param mixed              $value The column value that is displayed within a cell on the list table
 * @param AC\Setting\Context $context
 * @param string|int         $id    Post ID, User ID, Comment ID, Attachment ID or Term ID
 *
 * @return mixed
 */
function ac_column_value_usage($value, AC\Setting\Context $context, $id)
{
    // Change the rendered column value
    // $value = 'new value';

    return $value;
}

add_filter('ac/column/render', 'ac_column_value_usage', 10, 3);

/**
 * Shorter notation
 */
add_filter('ac/column/', function ($value, AC\Setting\Context $context, $id) {
    return $value;
}, 10, 3);

/**
 * Example on how to wrap the value of a specific Custom Field column of the type 'color' in markup to give it a background color.
 */
function ac_column_value_custom_field_example($value, AC\Setting\Context $context, $id)
{
    if ($context instanceof AC\Setting\Context\CustomField) {
        // Custom Field Key
        $meta_key = $context->get_meta_key();

        // Custom Field Type can be 'excerpt|color|date|numeric|image|has_content|link|checkmark|library_id|title_by_id|user_by_id|array|count'. The default is ''.
        $custom_field_type = $context->get_field_type();

        if ('my_hex_color' === $meta_key && 'color' === $custom_field_type) {
            $value = sprintf('<span style="background-color: %1$s">%1$s</span>', $value);
        }
    }

    return $value;
}

add_filter('ac/column/value', 'ac_column_value_custom_field_example', 10, 3);

/**
 * Example on how to add a `class` attribute to the rendered value that can be styled by CSS.
 */
function ac_column_value_add_class_attribute_based_on_value($value, AC\Setting\Context $context, $id)
{
    if ($context instanceof AC\Setting\Context\CustomField) {
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

add_filter('ac/column/render', 'ac_column_value_add_class_attribute_based_on_value', 10, 3);

function ac_column_value_acf_example($value, AC\Setting\Context $context, $id)
{
    // Check for the ACF column
    if ($context instanceof ACA\ACF\Setting\Context\Field) {
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

add_filter('ac/column/render', 'ac_column_value_acf_example', 10, 3);

/* Example of checking for multiple available context types */
add_filter('ac/column/render', function ($value, AC\Setting\Context $context, $id) {
    if ($context instanceof ACA\ACF\Setting\Context\Field) {
        return $context->get_field_type();
    }

    if ($context instanceof ACA\Types\Setting\Context\Relationship) {
        return $context->get_type() . $context->get_relation()['type'];
    }

    if ($context instanceof ACA\Types\Setting\Context\Field) {
        return $context->get_field_type() . ': ' . $context->get_meta_key();
    }

    if ($context instanceof ACA\JetEngine\Setting\Context\Field) {
        return $context->get_field_type() . ': ' . $context->get_meta_key();
    }

    if ($context instanceof ACA\JetEngine\Setting\Context\Relation) {
        return $context->get_relation()->get_relation_name();
    }

    if ($context instanceof ACA\MetaBox\Setting\Context\Relation) {
        return $context->get_relation()->get_related_meta_type();
    }

    if ($context instanceof ACA\Pods\Setting\Context\Field) {
        return $context->get_field_type() . ' - ' . $context->get_meta_key();
    }

    if ($context instanceof ACA\MetaBox\Setting\Context\Field) {
        return $context->get_field_type() . ' - ' . $context->get_meta_key();
    }

    if ($context instanceof AC\Setting\Context\CustomField) {
        return $context->get_field_type();
    }

    return $value;
}, 10, 3);