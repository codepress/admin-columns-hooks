<?php
/**
 * This filter allows you to disable the default behavior of the sorting feature to store the latest sorted column as preference
 */

// Disable this feature globally
add_filter('acp/sorting/remember_last_sorting_preference', '__return_false');

// Disable this feature per list screen
add_filter('acp/sorting/remember_last_sorting_preference', function ($enabled, AC\ListScreen $list_screen) {
    if ($list_screen instanceof ACP\ListScreen\Post) {
        return false;
    }

    if ($list_screen instanceof ACP\ListScreen\Comment) {
        return false;
    }

    if ($list_screen instanceof ACP\ListScreen\User) {
        return false;
    }

    return $enabled;
}, 10, 2);