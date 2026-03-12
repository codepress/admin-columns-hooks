<?php

/**
 * The `ac/editing/before_save` action fires just before a column value is written to the database,
 * for both inline editing and bulk editing. Use it to run validation, logging, or side effects
 * before the new value is persisted.
 * Note: because this is a `do_action` (not a filter), you cannot use it to prevent the save.
 * Use `ac/editing/view` to control whether editing is available in the first place.
 */

/**
 * @param AC\Column\Context $column    The column being edited.
 * @param int|string        $id        The row ID (post ID, user ID, term ID, etc.).
 * @param mixed             $form_data The raw, unprocessed form data from the edit request.
 */
function ac_editing_before_save_usage(AC\Column\Context $column, $id, $form_data): void
{
    // Place your code here
}

add_action('ac/editing/before_save', 'ac_editing_before_save_usage', 10, 3);

/**
 * Example: store the current custom field value as a backup before it is overwritten.
 * The backup is saved under the same meta key prefixed with "backup_".
 */
add_action(
    'ac/editing/before_save',
    static function (AC\Column\Context $column, $id, $form_data): void {
        if ($column instanceof AC\Column\CustomFieldContext) {
            $previous_value = get_post_meta($id, $column->get_meta_key(), true);

            update_post_meta($id, 'backup_' . $column->get_meta_key(), $previous_value);
        }
    },
    10,
    3
);
