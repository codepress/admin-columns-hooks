<?php
/**
 * This hook allows you to enable or disable the Metric feature for a list table.
 *
 * The Metric feature is enabled by default. Returning false disables it, overriding the per-list-table
 * "Metric" setting. The second argument is the list screen, so you can toggle it per table.
 *
 * To only change the default (opt-in) while still letting users toggle Metrics per table from the
 * settings, use the 'ac/metric/enable/default' filter instead.
 */

/**
 * Usage Example: Short notation
 */
add_filter('ac/metric/enable', function (bool $enabled, AC\ListScreen $list_screen): bool {
    return $enabled;
}, 10, 2);

/**
 * Disable Metrics on every list table
 */
add_filter('ac/metric/enable', '__return_false');

/**
 * Disable Metrics everywhere, but keep it enabled for a specific list table
 */
add_filter('ac/metric/enable', function (bool $enabled, AC\ListScreen $list_screen): bool {
    if ('wp-users' === $list_screen->get_key()) {
        return true;
    }

    return false;
}, 10, 2);
