<?php
/**
 * This filter allows you to disable the default behavior of the sorting feature to store the latest sorted column as preference
 */

// Disable this feature globally
add_filter('acp/sorting/remember_last_sorting_preference', '__return_false');

// Disable this feature per list screen
add_filter('acp/sorting/remember_last_sorting_preference', function (bool $enabled, AC\ListScreen $list_screen): bool {
    if ('page' === $list_screen->get_post_type()) {
        return false;
    }

    if ('comment' === $list_screen->get_meta_type()) {
        return false;
    }

    if ('user' === $list_screen->get_meta_type()) {
        return false;
    }

    return $enabled;
}, 10, 2);