<?php

/**
 * The `ac/list_screen/saved` action fires after a list screen (column set) is successfully saved
 * in the Admin Columns settings screen. Use it to clear caches, trigger sync, or audit changes.
 */

/**
 * @param AC\ListScreen $list_screen The list screen that was just saved.
 */
function ac_list_screen_saved_usage(AC\ListScreen $list_screen): void
{
    // Place your code here
}

add_action('ac/list_screen/saved', 'ac_list_screen_saved_usage');

/**
 * Example: clear a site transient whenever a column configuration is saved,
 * so cached rendered output is regenerated.
 */
add_action('ac/list_screen/saved', static function (AC\ListScreen $list_screen): void {
    delete_transient('my_plugin_columns_cache_' . $list_screen->get_key());
});
