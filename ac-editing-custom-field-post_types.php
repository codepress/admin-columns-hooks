<?php
/**
 * The filter `ac/editing/custom_field/post_types` allows you to set which post types are available in the editing dropdown in the custom field
 * By default the array is empty, which means all post types are available.
 */

function ac_set_post_types_for_editing(
    array $post_types,
    AC\Config $config,
    AC\Type\TableScreenContext $table_screen_context
): array {
    // Change the rendered column value
    // $value = 'new value';

    return $post_types;
}

add_filter('ac/editing/custom_field/post_types', 'ac_set_post_types_for_editing', 10, 3);

/**
 * Shorter notation
 */
add_filter(
    'ac/editing/custom_field/post_types',
    static function (
        array $post_types,
        AC\Setting\Config $config,
        AC\Type\TableScreenContext $table_screen_context
    ): array {
        return $post_types;
    },
    10,
    3
);

/**
 * Set post types based on a custom field column
 */
add_filter(
    'ac/editing/custom_field/post_types',
    static function (
        array $post_types,
        AC\Setting\Config $config,
        AC\Type\TableScreenContext $table_screen_context
    ): array {
        // Check the custom field for a specific meta_key
        if ('custom_meta_key' === $config->get('field', '')) {
            $post_types = ['post', 'page']; // Only show post and page types
        }

        return $post_types;
    },
    10,
    3
);