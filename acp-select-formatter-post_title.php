<?php

/**
 * This filter modifies the post label shown in select2 dropdown menus when selecting a post.
 * For example, this select2 menu is used by inline editing and smart filtering for relational
 * columns such as "Parent Page" or custom post-relationship fields.
 * The default displayed value is the post title.
 */

/**
 * @param string  $label The formatted post label. Default is the post title.
 * @param WP_Post $post
 *
 * @return string
 */
function acp_select_formatter_post_title(string $label, WP_Post $post): string
{
    // Modify label
    // $label = $post->post_name;

    return $label;
}

add_filter('acp/select/formatter/post_title', 'acp_select_formatter_post_title', 10, 2);

/**
 * Example: append the post status to the label so editors can distinguish
 * draft and published posts in the dropdown.
 *
 * e.g. "My Page [draft]"
 */
add_filter(
    'acp/select/formatter/post_title',
    static function (string $label, WP_Post $post): string {
        if ($post->post_status !== 'publish') {
            $label .= ' [' . $post->post_status . ']';
        }

        return $label;
    },
    10,
    2
);

/**
 * Example: prefix the post type label for sites where multiple post types
 * appear in the same dropdown.
 *
 * e.g. "Product: Blue T-Shirt"
 */
add_filter(
    'acp/select/formatter/post_title',
    static function (string $label, WP_Post $post): string {
        $post_type_object = get_post_type_object($post->post_type);

        if ($post_type_object && $post_type_object->name !== 'post') {
            $label = $post_type_object->labels->singular_name . ': ' . $label;
        }

        return $label;
    },
    10,
    2
);
