<?php
/**
 * This hooks allows you to set the availability of the Width Resizer feature per list screen
 */

/**
 * @param bool          $is_active
 * @param AC\ListScreen $list_screen
 *
 * @return bool
 */
function acp_resize_columns_active($is_active, AC\ListScreen $list_screen)
{
    return $is_active;
}

add_filter('acp/resize_columns/active', 'acp_resize_columns_active', 10, 2);

// Anonymous function
add_filter('acp/resize_columns/active', function ($is_active, AC\ListScreen $list_screen) {
    return $is_active;
}, 10, 2);

/**
 * Disable Column Resizer for a specific List Screen (meta type)
 */
add_filter('acp/resize_columns/active', function ($is_active, AC\ListScreen $list_screen) {
    switch (true) {
        case $list_screen instanceof AC\ListScreen\Post:
            return true;
        case $list_screen instanceof AC\ListScreen\User:
            return false;
        case $list_screen instanceof AC\ListScreen\Media:
            return false;
        case $list_screen instanceof ACP\ListScreen\Taxonomy:
            return true;
        default:
            return $is_active;
    }
}, 10, 2);

/**
 * Only enable the column resizer for Admin Columns Pro managers (administrators)
 */
add_filter('acp/resize_columns/active', function () {
    $user = wp_get_current_user();

    return $user && ! $user->has_cap('manage_admin_columns');
}, 10);