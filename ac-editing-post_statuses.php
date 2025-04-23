<?php

/**
 * Hook to set which post statuses which are returned in the dropdown lists
 */
add_filter('ac/editing/post_statuses', static function ($statuses, AC\Setting\Context $context, string $post_type) {
    return $statuses;
}, 10, 2);

/**
 * Disable ACF disabled post type
 */
add_filter('ac/editing/post_statuses', static function ($statuses, AC\Setting\Context $context, string $post_type) {
    if (isset($statuses['acf-disabled'])) {
        unset($statuses['acf-disabled']);
    }

    return $statuses;
}, 10, 2);