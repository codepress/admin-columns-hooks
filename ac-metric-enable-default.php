<?php
/**
 * This hook allows you to change whether the Metric feature is enabled by default on a list table.
 *
 * The Metric feature is enabled by default. This filter only affects list tables that have no stored
 * "Metric" preference yet (i.e. where the setting was never toggled). List tables where the setting was
 * saved manually keep their stored value and are not affected by this filter.
 *
 * Use this to make Metrics opt-in while still letting users enable it per table from the settings.
 * To force Metrics on or off regardless of the per-table setting, use the 'ac/metric/enable' filter instead.
 */

/**
 * Usage Example: Short notation
 */
add_filter('ac/metric/enable/default', function (bool $enabled, AC\ListScreen $list_screen): bool {
    return $enabled;
}, 10, 2);

/**
 * Disable Metrics by default (opt-in). Tables where a user enabled Metrics manually keep it.
 */
add_filter('ac/metric/enable/default', '__return_false');

/**
 * Disable Metrics by default, except on a specific list table
 */
add_filter('ac/metric/enable/default', function (bool $enabled, AC\ListScreen $list_screen): bool {
    if ('wp-users' === $list_screen->get_key()) {
        return true;
    }

    return false;
}, 10, 2);
