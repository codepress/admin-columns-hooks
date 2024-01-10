<?php
/**
 * This hooks allows you to enable or disable the Horizontal Scrolling feature per list screen
 */

/**
 * @param bool          $enabled
 * @param AC\ListScreen $list_screen
 *
 * @return bool
 */
function acp_horizontal_scrolling_enable($enabled, AC\ListScreen $list_screen)
{
    return $enabled;
}

add_filter('acp/horizontal_scrolling/enable', 'acp_horizontal_scrolling_enable', 10, 2);

// Anonymous function
add_filter('acp/horizontal_scrolling/enable', function ($enabled, AC\ListScreen $list_screen) {
    return $enabled;
}, 10, 2);

/**
 * Enabled horizontal scrolling for every admin for every list screen
 */
add_filter('acp/horizontal_scrolling/enable', function () {
    $user = wp_get_current_user();

    return $user && ! $user->has_cap('manage_admin_columns');
}, 10);

/**
 * Enabled horizontal scrolling for every list screen with more than 10 columns
 */
add_filter('acp/horizontal_scrolling/enable', function ($enabled, AC\ListScreen $list_screen) {
    if (count($list_screen->get_columns()) > 10) {
        $enabled = true;
    }

    return $enabled;
}, 10, 2);

/**
 * Set horizontal scrolling based on different ListScreen properties
 */
add_filter('acp/horizontal_scrolling/enable', function ($enabled, AC\ListScreen $list_screen) {
    // Check for specific post type
    if ($list_screen instanceof AC\ListScreen\Post && 'page' === $list_screen->get_post_type()) {
        $enabled = false;
    }

    // Check for specific ListScreen ID
    if ($list_screen->has_id() && $list_screen->get_id()->equals(new AC\Type\ListScreenId('620f70285d50d'))) {
        $enabled = false;
    }

    // The above check equals the following example
    if ('620f70285d50d' === $list_screen->get_layout_id()) {
        $enabled = false;
    }

    return $enabled;
}, 10, 2);