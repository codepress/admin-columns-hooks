<?php

/**
 * This hooks allows you to disable admin columns support for a specific list table based on the used key.
 * It is most likely that the hook `ac/list_screen/is_active` must also be used to disable the table view
 */

/**
 * Usage Example: Short notation
 */
add_filter('ac/list_screen/key/is_active', function (bool $active, string $key): bool {
    return $active;
}, 10, 2);

/**
 * Disable Admin Columns for the Media List Table
 */
add_filter('ac/list_screen/key/is_active', function (bool $active, string $key): bool {
    if ('wp-media' === $key) {
        return false;
    }

    return $active;
}, 10, 2);