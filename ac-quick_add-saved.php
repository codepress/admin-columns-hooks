<?php
/**
 * The ac/quick_add/saved action fires after a new item is created using Quick Add.
 */

/**
 * @param int|string    $id
 * @param AC\ListScreen $list_screen
 *
 * @return void
 */
function ac_quick_add_saved($id, AC\ListScreen $list_screen): void
{
    // Place your code here
}

add_action('ac/quick_add/saved', 'ac_quick_add_saved');