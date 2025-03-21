<?php
/**
 * This hooks allows you to enable or disable the Horizontal Scrolling feature per list screen
 */

function acp_horizontal_scrolling_enable(bool $enabled, AC\ListScreen $list_screen): bool
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
});

/**
 * Enabled horizontal scrolling for every list screen with more than 10 columns
 */
add_filter('acp/horizontal_scrolling/enable', function (bool $enabled, AC\ListScreen $list_screen): bool {
    if ($list_screen->get_columns()->count() > 10) {
        return true;
    }

    return $enabled;
}, 10, 2);

/**
 * Set horizontal scrolling based on different ListScreen properties
 */
add_filter('acp/horizontal_scrolling/enable', function (bool $enabled, AC\ListScreen $list_screen): bool {
    // Check for specific post type
    if ('page' === $list_screen->get_post_type()) {
        $enabled = false;
    }

    $list_id = $list_screen->get_id();

    // Check for specific ListScreen ID
    if ($list_id->equals(new AC\Type\ListScreenId('620f70285d50d'))) {
        $enabled = false;
    }

    // The above check equals the following example
    if ('620f70285d50d' === (string)$list_id) {
        $enabled = false;
    }

    return $enabled;
}, 10, 2);