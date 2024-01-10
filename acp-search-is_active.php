<?php
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
 *
 * @param bool          $is_active
 * @param AC\ListScreen $list_screen
 *
 * @return bool
 */
function acp_search_disable_for_media($is_active, AC\ListScreen $list_screen)
{
    if ($list_screen instanceof ACP\ListScreen\Media) {
        $is_active = false;
    }

    return $is_active;
}

add_filter('acp/search/is_active', 'acp_search_disable_for_media', 10, 2);

/**
 * Disable Smart Filtering on a custom post type list table
 *
 * @param bool          $is_active
 * @param AC\ListScreen $list_screen
 *
 * @return bool
 */
function acp_search_disable_for_custom_post_type($is_active, AC\ListScreen $list_screen)
{
    // The following condition does the same: $list_screen->get_key() === 'my_custom_post_type'
    if ($list_screen instanceof AC\ListScreenPost && 'my_custom_post_type' === $list_screen->get_post_type()) {
        $is_active = false;
    }

    return $is_active;
}

add_filter('acp/search/is_active', 'acp_search_disable_for_custom_post_type', 10, 2);

/**
 * Disable Smart Filtering for specific user roles
 *
 * @param bool $is_active
 *
 * @return bool
 */
function acp_search_disable_for_authors($is_active)
{
    $user = wp_get_current_user();

    // Disable smart filter for users with the role 'author'
    if (in_array('author', (array)$user->roles)) {
        $is_active = false;
    }

    return $is_active;
}

add_filter('acp/search/is_active', 'acp_search_disable_for_authors');