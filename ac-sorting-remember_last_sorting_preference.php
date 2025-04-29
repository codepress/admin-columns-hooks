<?php
/**
 * This filter allows you to disable the default behavior of the sorting feature to store the latest sorted column as preference
 */

// Disable this feature globally
add_filter('ac/sorting/remember_last_sorting_preference', '__return_false');

// Disable this feature per list screen
add_filter('ac/sorting/remember_last_sorting_preference', function (bool $enabled, AC\TableScreen $table_screen): bool {
    if ($table_screen instanceof AC\PostType && $table_screen->get_post_type()->equals('page')) {
        return false;
    }

    if ($table_screen instanceof AC\TableScreen\Comment) {
        return false;
    }

    if ($table_screen instanceof AC\TableScreen\User) {
        return false;
    }

    return $enabled;
}, 10, 2);