<?php
/**
 * This filter allows you to disable cache for the filtering feature
 */

/**
 * Disable caching for the filtering
 */
add_filter('acp/filtering/cache/enable', '__return_false');

/**
 * Disable caching for the custom field column
 */
function acp_filtering_disable_cache_for_custom_field_column(bool $enabled, AC\Column $column): bool
{
    return $column instanceof AC\Column\CustomField
        ? false
        : $enabled;
}

add_filter('acp/filtering/cache/enable', 'acp_filtering_disable_cache_for_custom_field_column', 10, 2);