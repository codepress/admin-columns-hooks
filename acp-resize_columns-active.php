<?php
/**
 * This hooks allows you to set the availability of the Width Resizer feature per list screen
 */

function acp_resize_columns_active(bool $is_active, AC\ListScreen $list_screen): bool
{
    return $is_active;
}

add_filter('acp/resize_columns/active', 'acp_resize_columns_active', 10, 2);

// Anonymous function
add_filter('acp/resize_columns/active', function (bool $is_active, AC\ListScreen $list_screen): bool {
    return $is_active;
}, 10, 2);

/**
 * Disable Column Resizer for a specific List Screen (meta type)
 */
add_filter('acp/resize_columns/active', function (bool $is_active, AC\ListScreen $list_screen): bool {
    // Based on post type e.g. 'post', 'attachment', 'page', 'custom_post_type' etc.
    if ('post' === $list_screen->get_post_type()) {
        return false;
    }
    if ('attachment' === $list_screen->get_meta_type()) {
        return false;
    }

    // Based on meta type e.g. 'user', 'term', 'comment' or 'post'
    if ('user' === $list_screen->get_meta_type()) {
        return false;
    }
    if ('term' === $list_screen->get_meta_type()) {
        return false;
    }

    return $is_active;
}, 10, 2);

/**
 * Only enable the column resizer for Admin Columns Pro managers (administrators)
 */
add_filter('acp/resize_columns/active', function (): bool {
    $user = wp_get_current_user();

    return $user && ! $user->has_cap('manage_admin_columns');
});