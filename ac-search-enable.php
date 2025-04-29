<?php
/**
 * Hook to enable/disable smart filtering completely. Can easily be checked on specific list screen or other conditionals like User Roles
 */

/**
 * Enable Smart Filtering for all list screens
 */
add_filter('ac/search/enable', '__return_true');

/**
 * Disable Smart Filtering for all list screens
 */
add_filter('ac/search/enable', '__return_false');

/**
 * Disable Smart Filtering for the media list table
 */
function ac_search_disable_for_media(bool $is_active, AC\ListScreen $list_screen): bool
{
    if ($list_screen->get_table_screen() instanceof AC\TableScreen\Media) {
        $is_active = false;
    }

    return $is_active;
}

add_filter('ac/search/enable', 'ac_search_disable_for_media', 10, 2);

/**
 * Disable Smart Filtering on a custom post type list table
 */
function ac_search_disable_for_custom_post_type(bool $is_active, AC\ListScreen $list_screen): bool
{
    $table_screen = $list_screen->get_table_screen();

    if ($table_screen instanceof AC\PostType && $table_screen->get_post_type()->equals('my_custom_post_type')) {
        return false;
    }

    return $is_active;
}

add_filter('ac/search/enable', 'ac_search_disable_for_custom_post_type', 10, 2);

/**
 * Disable Smart Filtering for specific user roles
 */
function ac_search_disable_for_authors(bool $is_active): bool
{
    $user = wp_get_current_user();

    // Disable smart filter for users with the role 'author'
    if (in_array('author', $user->roles, true)) {
        $is_active = false;
    }

    return $is_active;
}

add_filter('ac/search/enable', 'ac_search_disable_for_authors');