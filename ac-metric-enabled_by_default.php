<?php
/**
 * This hook allows you to change whether the Metric feature is enabled by default on a list table.
 *
 * The Metric feature is enabled by default. This filter only affects list tables that have no stored
 * "Metric" preference yet (i.e. where the setting was never explicitly toggled). List tables where the
 * setting was saved manually keep their stored value and are not affected by this filter.
 */

/**
 * Usage Example: Short notation
 */
add_filter('ac/metric/enabled_by_default', function (bool $enabled, AC\ListScreen $list_screen): bool {
    return $enabled;
}, 10, 2);

/**
 * Disable Metrics by default on every list table
 */
add_filter('ac/metric/enabled_by_default', '__return_false');

/**
 * Disable Metrics by default, but keep it enabled for a specific list table
 */
add_filter('ac/metric/enabled_by_default', function (bool $enabled, AC\ListScreen $list_screen): bool {
    if ('wp-users' === $list_screen->get_key()) {
        return true;
    }

    return false;
}, 10, 2);