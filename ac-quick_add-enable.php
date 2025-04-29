<?php
/**
 * This hooks allows you to enable Quick Add for a specific List Screen in the Hide on Screen Settings
 */

function ac_quick_add_enable(bool $enabled, AC\TableScreen $table_screen): bool
{
    return $enabled;
}

add_filter('ac/quick_add/enable', 'ac_quick_add_enable', 10, 2);

// Anonymous function
add_filter('ac/quick_add/enable', static function (bool $enabled, AC\TableScreen $table_screen): bool {
    return $enabled;
}, 10, 2);

/*
 * Example hook that enabled quick always for specific post types
 */
add_filter('ac/quick_add/enable', static function (bool $enabled, AC\TableScreen $table_screen): bool {
    $enabled_post_types = [
        'post',
        'page',
        'custom_post_type',
    ];

    if ($table_screen instanceof AC\PostType && in_array(
            (string)$table_screen->get_post_type(),
            $enabled_post_types,
            true
        )) {
        return true;
    }

    return $enabled;
}, 10, 2);