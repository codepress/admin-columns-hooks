<?php
/**
 * The filter `ac/column/render` allows you to alter the value of a column cell
 * You probably want to check for a specific column instance and check for extra conditionals related to the column in order to change the value for the correct column
 */

/**
 * @param string            $value  The column value that is displayed within a cell on the list table
 * @param AC\Column\Context $column The column properties and all its settings
 * @param string|int        $id     Post ID, User ID, Comment ID, Attachment ID or Term ID
 * @param AC\TableScreen    $table  The table properties
 *
 * @return mixed
 */
function ac_column_value_usage(string $value, AC\Column\Context $column, $id, AC\TableScreen $table)
{
    // Change the rendered column value
    // $value = 'new value';

    return $value;
}

add_filter('ac/column/render', 'ac_column_value_usage', 10, 4);

/**
 * Shorter notation
 */
add_filter('ac/column/render', function (string $value, AC\Column\Context $column, $id, AC\TableScreen $table) {
    return $value;
}, 10, 4);

/**
 * Example on how to wrap the value of a specific Custom Field column of the type 'color' in markup to give it a background color.
 */
function ac_column_value_custom_field_example(string $value, AC\Column\Context $column, $id, AC\TableScreen $table)
{
    // Target a Custom Field column on the "Page" list table
    if (
        $table instanceof AC\PostType && // this is a post type
        $table->get_post_type()->equals('page') && // this is a "Page" list table
        $column instanceof AC\Column\CustomFieldContext // this is a "Custom Field" column
    ) {
        // Custom Field Key
        $meta_key = $column->get_meta_key(); // e.g. my_custom_field_key

        // Custom Field Type can be 'excerpt|color|date|numeric|image|has_content|link|checkmark|library_id|title_by_id|user_by_id|array|count'. The default is ''.
        $custom_field_type = $column->get_field_type();

        // Other properties
        $column_name = $column->get_name(); // e.g. 62542279f0624c
        $column_type = $column->get_type(); // column-meta
        $column_label = $column->get('label'); // e.g. My Column Label
        //$column_type_label = $column->get_type_label(); // e.g. Custom Field

        // Target a specific meta_key and field type
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
function ac_column_value_add_class_attribute(string $value, AC\Column\Context $column, $id, AC\TableScreen $table)
{
    if ($column instanceof AC\Column\CustomFieldContext) {
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

add_filter('ac/column/render', 'ac_column_value_add_class_attribute', 10, 4);

function ac_column_value_acf_example(string $value, AC\Column\Context $column, $id, AC\TableScreen $table)
{
    // Check for the ACF column
    if ($column instanceof ACA\ACF\Column\Context) {
        /**
         * Contains all ACF field information
         */
        $field_settings = $column->get_field();

        /**
         * The unique identifier for the ACF field
         */
        $field_hash = $column->get_field_key();

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
        if ('my_custom_field_key' === $meta_key && 'text' === $field_type) {
            // In this example we will append a string
            $value .= ' ( Additional Text )';
        }
    }

    return $value;
}

add_filter('ac/column/render', 'ac_column_value_acf_example', 10, 4);

/**
 * Example for a Custom Field. List of all properties.
 */
add_filter('ac/column/render', function (string $value, AC\Column\Context $column, $id, AC\TableScreen $table) {
    // Custom Field column
    if ($column instanceof AC\Column\CustomFieldContext) {
        $meta_key = $column->get_meta_key(); // e.g. my_meta_key
        $meta_type = $column->get_meta_type(); // e.g. post, user, comment or term
        $meta_type = $column->get_post_type(); // e.g. post, page, my-custom-post-type etc.
        $meta_type = $column->get_taxonomy(); // e.g. post_category, tag, my-custom-taxonomy etc.
        $field_type = $column->get_field_type(); // e.g. date, text, image, url etc.
        $name = $column->get_name(); // Column type identifier. e.g. column-meta
        $label = $column->get('label'); // User defined column label. e.g. My column label
        $settings = $column->all(); // List of stored options: [ 'width' => 120, 'label' => 'My Column Label', ... ]

        // Change Custom Field column value here
        // $value = 'Custom Field: ' . $value;

        return $value;
    }

    return $value;
}, 10, 4);

/**
 * Example for 3rd party add-ons: ACF, MetaBox, JetEngine, Pods, Toolset Types.
 */
add_filter('ac/column/render', function (string $value, AC\Column\Context $column, $id, AC\TableScreen $table) {
    // Advanced Custom Field column
    if ($column instanceof ACA\ACF\Column\Context) {
        $acf_field_settings = $column->get_field(); // Array of all field options
        $acf_field_setting = $column->get_field_setting('label'); // Array of all field options
        $acf_field_key = $column->get_field_key(); // e.g. field_530367d9e582e
        $acf_field_label = $column->get_field_label(); // e.g. My Field Label
        $acf_field_type = $column->get_field_type(); // e.g. checkbox, radio, select, text, image etc.
        $acf_meta_key = $column->get_meta_key(); // e.g. my_acf_field

        // Change ACF column value here
        // $value = 'ACF: ' . $value;

        return $value;
    }

    // JetEngine column
    if ($column instanceof ACA\JetEngine\Column\FieldContext) {
        $jetengine_field_settings = $column->get_field_settings(); // Array of all field options
        $jetengine_field_id = $column->get_field_setting('id'); // e.g. 1234
        $jetengine_field_type = $column->get_type(); // e.g. checkbox, text, select etc.
        $jetengine_field_title = $column->get_field_title(); // e.g. My Field Title
        $jetengine_meta_key = $column->get_meta_key(); // e.g. my_jetengine_field

        // Change Jetengine column value here
        // $value = 'JetEngine: ' . $value;

        return $value;
    }

    // JetEngine Relational column
    if ($column instanceof ACA\JetEngine\Column\RelationContext) {
        $jetengine_relation_field = $column->get_relation();
        $jetengine_relation_field_name = $jetengine_relation_field->get_relation_name();
        $jetengine_relation_field_id = $jetengine_relation_field->get_id();

        // Change JetEngine Relation column value here
        // $value = 'JetEngine: ' . $value;

        return $value;
    }

    // MetaBox column
    if ($column instanceof ACA\MetaBox\Column\FieldContext) {
        $metabox_field_settings = $column->get_field_setttings(); // Array of all field options
        $metabox_field_setting = $column->get_field_setting('name'); // e.g. My Field Label
        $metabox_meta_key = $column->get_meta_key(); // e.g. my_metabox_field

        $metabox_field = $column->get_field(); // Object of the field 'ACA\MetaBox\Field\Field' class
        $metabox_field_id = $metabox_field->get_id(); // e.g. mb_checkbox
        $metabox_field_type = $metabox_field->get_type(); // e,.g. text, image, select etc.
        $metabox_field_name = $metabox_field->get_name(); // e.g. My Field Label

        // Change MetaBox column value here
        // $value = 'MetaBox: ' . $value;

        return $value;
    }

    // MetaBox Relational column
    if ($column instanceof ACA\MetaBox\Column\RelationContext) {
        $metabox_relation_field = $column->get_relation();
        $metabox_relation_id = $metabox_relation_field->get_id();
        $metabox_relation_type = $metabox_relation_field->get_type();
        $metabox_relation_title = $metabox_relation_field->get_title();
        $metabox_relation_meta_type = $metabox_relation_field->get_meta_type();
        $metabox_relation_related_meta_type = $metabox_relation_field->get_related_meta_type();
        $metabox_relation_related_settigs = $metabox_relation_field->get_related_field_settings();

        // Change MetaBox Relation column value here
        // $value = 'MetaBox: ' . $value;

        return $value;
    }

    // Toolset Types column
    if ($column instanceof ACA\Types\Column\FieldContext) {
        $types_field_settings = $column->get_field_settings(); // Array of all field options ['slug'=> 'types', ... ]
        $types_field_setting = $column->get_field_setting('id'); // e.g. types_field
        $types_meta_key = $column->get_meta_key(); // E.g. my_types_field

        $types_field = $column->get_field(); // Object of the field 'ACA\Typs\Field' class
        $types_field_type = $types_field->get_type(); // e.g. text, image, select etc.
        $types_field_label = $types_field->get_label(); // e.g. My Field Label
        $types_field_id = $types_field->get_id(); // e.g. types_field
        $types_meta_key = $types_field->is_repeatable(); // true of false

        // Change Toolset Types column value here
        // $value = 'Toolset Types: ' . $value;

        return $value;
    }

    // Toolset Types relational column
    if ($column instanceof ACA\Types\Column\RelationshipContext) {
        $types_relation_field = $column->get_relation(); // array of options e.g. [ 'type' => 'Relation-type' ]

        // Change Toolset Types Relational column value here
        // $value = 'Toolset Types: ' . $value;

        return $value;
    }

    // Pods column
    if ($column instanceof ACA\Pods\Column\FieldContext) {
        $pods_field = $column->get_field(); // @see Pods\Whatsit\Field class
        $pods_field_type = $pods_field->get_type();
        $pods_field_name = $pods_field->get_name();
        $pods_field_label = $pods_field->get_label();
        $pods_field_parent = $pods_field->get_parent();
        $pods_meta_key = $column->get_meta_key(); // e.g. my_pods_field

        // Change Pods column value here
        // $value = 'Pods: ' . $value;

        return $value;
    }

    return $value;
}, 10, 4);

/**
 * Example: how to target specific list tables
 */
add_filter('ac/column/render', function (string $value, AC\Column\Context $column, $id, AC\TableScreen $table) {
    // Target the "Page" list table
    if ($table instanceof AC\PostType && $table->get_post_type()->equals('page')) {
        // $value = 'Page: ' . $value;
        // $value = get_post_meta($id, '_wp_page_template', true);

        return $value;
    }

    // Target the "Post" list table
    if ($table instanceof AC\PostType && $table->get_post_type()->equals('post')) {
        // $value = 'Post: ' . $value;
        // $value = get_post_meta($id, '_thumbnail_id', true);

        return $value;
    }

    // Target the "Custom Post Type" list table
    if ($table instanceof AC\PostType && $table->get_post_type()->equals('my-custom-post-type-slug')) {
        // $value = 'My Custom Post Type: ' . $value;
        // $value = get_post_meta($id, 'my_meta_key', true);

        return $value;
    }

    // Target all custom post type list tables
    if ($table instanceof AC\PostType) {
        $post_type = (string)$table->get_post_type();

        // $value = 'Custom Post Type: ' . $post_type . ' ' . $value;
        // $value = get_post_meta($id, 'my_meta_key', true);

        return $value;
    }

    // Target the "User" list table
    if ($table instanceof AC\TableScreen\User) {
        // $value = 'User: ' . $value;
        // $value = get_user_meta($id, 'my_meta_key', true);

        return $value;
    }

    // Target the "Comment" list table
    if ($table instanceof AC\TableScreen\Comment) {
        // $value = 'Comment: ' . $value;
        // $value = get_comment_meta($id, 'my_meta_key', true);

        return $value;
    }

    // Target the "Category" taxonomy list table
    if ($table instanceof AC\Taxonomy && $table->get_taxonomy()->equals('category')) {
        // $value = 'Category: ' . $value;
        // $value = get_term_meta($id, 'my_meta_key', true);

        return $value;
    }

    // Target the "Media" list table
    if ($table instanceof AC\PostType && $table->get_post_type()->equals('attachment')) {
        // $value = 'Media: ' . $value;
        // $value = get_post_meta($id, '_wp_attached_file', true);

        return $value;
    }

    return $value;
}, 10, 4);