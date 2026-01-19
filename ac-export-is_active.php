<?php

/**
 * This hooks allows you to disable the export functionality for specific list tables.
 */

/**
 * Disable the export functionality on the Users list table. The `Export` button wil also be removed.
 */
function ac_disable_export_for_users_list_table(bool $is_active, AC\ListScreen $list_screen): bool
{
    // Meta type is 'post', 'term', 'user' or 'comment'
    if ('user' === $list_screen->get_meta_type()) {
        return false;
    }

    return $is_active;
}

add_filter('ac/export/is_active', 'ac_disable_export_for_users_list_table', 10, 2);

/**
 * Disable the export functionality for a specific `Post Type`, in this the `Page` list table.
 */
function ac_disable_export_for_page_list_table(bool $is_active, AC\ListScreen $list_screen): bool
{
    if ('page' === $list_screen->get_post_type()) {
        return false;
    }

    return $is_active;
}

add_filter('ac/export/is_active', 'ac_disable_export_for_page_list_table', 10, 2);

/**
 * Disable the export functionality completely for all list tables
 */
add_filter('ac/export/is_active', '__return_false');