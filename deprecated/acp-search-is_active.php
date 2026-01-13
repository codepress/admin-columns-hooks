<?php
/**
 * @depecated since 7.0
 * Use `ac/search/enable` instead.
 */

/**
 * Hook to enable/disable smart filtering completely. Can easily be checked on specific list screen or other conditionals like User Roles
 */

/**
 * Enable Smart Filtering for all list screens
 */
add_filter('acp/search/is_active', '__return_true');

/**
 * Disable Smart Filtering for all list screens
 */
add_filter('acp/search/is_active', '__return_false');

/**
 * Disable Smart Filtering for the media list table
 */
function acp_search_disable_for_media(bool $is_active, AC\ListScreen $list_screen): bool
{
    if ('attachment' === $list_screen->get_post_type()) {
        $is_active = false;
    }

    return $is_active;
}

add_filter('acp/search/is_active', 'acp_search_disable_for_media', 10, 2);

/**
 * Disable Smart Filtering on a custom post type list table
 */
function acp_search_disable_for_custom_post_type(bool $is_active, AC\ListScreen $list_screen): bool
{
    if ('my_custom_post_type' === $list_screen->get_post_type()) {
        $is_active = false;
    }

    return $is_active;
}

add_filter('acp/search/is_active', 'acp_search_disable_for_custom_post_type', 10, 2);

/**
 * Disable Smart Filtering for specific user roles
 */
function acp_search_disable_for_authors(bool $is_active): bool
{
    $user = wp_get_current_user();

    // Disable smart filter for users with the role 'author'
    if (in_array('author', $user->roles, true)) {
        $is_active = false;
    }

    return $is_active;
}

add_filter('acp/search/is_active', 'acp_search_disable_for_authors');