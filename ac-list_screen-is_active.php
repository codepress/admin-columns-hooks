<?php

/**
 * This hooks allows you to disable admin columns support for a specific list table
 * This hook will not remove the support from the admin settings. You can use the hook 'ac/list_screen/key/is_active to remove the support on a more global level
 */

/**
 * Usage Example: Short notation
 */
add_filter('ac/list_screen/is_active', function (bool $active, WP_Screen $screen): bool {
    return $active;
}, 10, 2);

/**
 * Disable Admin Columns on the list table for the Song Custom Post Type
 */
add_filter('ac/list_screen/is_active', function ($active, WP_Screen $screen): bool {
    if ('song' === $screen->post_type) {
        return false;
    }

    return $active;
}, 10, 2);

/**
 * Disable Admin Columns for all Editors
 */
add_filter('ac/list_screen/key/is_active', function ($active, string $table_id): bool {
    if (current_user_can('editor')) {
        return false;
    }

    return $active;
}, 10, 2);