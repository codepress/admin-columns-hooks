<?php
/**
 * The ac/editing/saved action fires after the value of a column is stored when using Inline Edit.
 */

/**
 * Fires after a inline-edit saved a value
 */
function ac_editing_saved_usage(AC\Column\Context $context, $id, $value, AC\TableScreen $table_screen)
{
    // Place your code here
}

add_action('ac/editing/saved', 'ac_editing_saved_usage', 10, 4);

/**
 * In this example we will save the submitted value to second custom field.
 */
add_action(
    'ac/editing/saved',
    static function (AC\Column\Context $context, $id, $value, AC\TableScreen $table_screen) {
        if (
            $table_screen instanceof AC\PostType &&
            $context instanceof AC\Column\CustomFieldContext &&
            'my_custom_field' === $context->get_meta_key()

        ) {
            // Modify the value here
            // $value = $value * 2;

            update_post_meta($id, 'my_second_custom_field', $value);
        }
    },
    10,
    4
);

/**
 * By default, the post modified date is not always updated when using inline or bulk edit with Admin Column Pro.
 * For example, when updating metadata the `wp_update_post` is not called, which is the call that set then post's modified date.
 * In this example we will trigger this call manually.
 */
add_action(
    'ac/editing/saved',
    static function (AC\Column\Context $context, $id, $value, AC\TableScreen $table_screen) {
        if (
            $table_screen instanceof AC\PostType &&
            $table_screen->get_post_type()->equals('post')
        ) {
            // Update the `modified_date` after making any changes using inline or bulk editing
            wp_update_post(['ID' => $id]);
        }
    },
    10,
    4
);