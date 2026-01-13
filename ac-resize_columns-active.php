<?php
/**
 * This hooks allows you to set the availability of the Width Resizer feature per list screen
 */

function ac_resize_columns_active(bool $is_active, AC\ListScreen $list_screen): bool
{
    return $is_active;
}

add_filter('ac/resize_columns/active', 'ac_resize_columns_active', 10, 2);

// Anonymous function
add_filter('ac/resize_columns/active', static function (bool $is_active, AC\ListScreen $list_screen): bool {
    return $is_active;
}, 10, 2);

/**
 * Disable for every table
 */
add_filter('ac/resize_columns/active', '__return_false');

/**
 * Disable for every table
 */
add_filter('ac/resize_columns/active', '__return_true');

/**
 * Disable Column Resizer for a specific List Screen (meta type)
 */
add_filter('ac/resize_columns/active', static function (bool $is_active, AC\ListScreen $list_screen): bool {
    $table_screen = $list_screen->get_table_screen();

    // Based on post type e.g. 'post', 'attachment', 'page', 'custom_post_type' etc.
    if ($table_screen instanceof AC\PostType && $table_screen->get_post_type()->equals('post')) {
        return false;
    }
    if ($table_screen instanceof AC\TableScreen\Media) {
        return false;
    }

    // Based on meta type e.g. 'user', 'term', 'comment' or 'post'
    if ($table_screen instanceof AC\TableScreen\User) {
        return false;
    }
    if ($table_screen instanceof ACP\TableScreen\Taxonomy) {
        return false;
    }

    return $is_active;
}, 10, 2);

/**
 * Only enable the column resizer for Admin Columns Pro managers (administrators)
 */
add_filter('ac/resize_columns/active', static function (): bool {
    $user = wp_get_current_user();

    return $user && ! $user->has_cap('manage_admin_columns');
});