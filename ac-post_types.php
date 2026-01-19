<?php

/**
 * This hooks allows you to disable admin columns support for certain post types. The post type will no longer show up
 * in the admin columns menu. The actual post type will keep working and will NOT be disabled.
 */

function ac_post_types(array $post_types): array
{
    // Modify $post_types [ $name => $label, ... ]

    return $post_types;
}

add_filter('ac/post_types', 'ac_post_types');

/**
 * Disable admin columns support for the 'page' custom post type
 */
function ac_disable_support_for_pages(array $post_types): array
{
    unset($post_types['page']);

    return $post_types;
}

add_filter('ac/post_types', 'ac_disable_support_for_pages');