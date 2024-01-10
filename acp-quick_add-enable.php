<?php
/**
 * This hooks allows you to enable Quick Add for a specific List Screen in the Hide on Screen Settings
 */

function acp_quick_add_enable(bool $enabled, AC\ListScreen $list_screen): bool
{
    return $enabled;
}

add_filter('acp/quick_add/enable', 'acp_quick_add_enable', 10, 2);

// Anonymous function
add_filter('acp/quick_add/enable', function (bool $enabled, AC\ListScreen $list_screen): bool {
    return $enabled;
}, 10, 2);

/*
 * Example hook that enabled quick always for specific post types
 */
add_filter('acp/quick_add/enable', function (bool $enabled, AC\ListScreen $list_screen): bool {
    $enabled_post_types = [
        'post',
        'page',
        'custom_post_type',
    ];

    if (in_array($list_screen->get_post_type(), $enabled_post_types, true)) {
        return true;
    }

    return $enabled;
}, 10, 2);