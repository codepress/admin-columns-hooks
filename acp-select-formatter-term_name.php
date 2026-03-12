<?php

/**
 * This filter modifies the term label shown in select2 dropdown menus when selecting a term.
 * For example, this select2 menu is used by inline editing and smart filtering for taxonomy
 * columns such as "Categories" or "Tags".
 * The default displayed value is the term name, prefixed with parent term names for hierarchical
 * taxonomies (e.g. "Parent » Child").
 */

/**
 * @param string  $label The formatted term label. Default is the term name (with parent hierarchy for nested terms).
 * @param WP_Term $term
 *
 * @return string
 */
function acp_select_formatter_term_name(string $label, WP_Term $term): string
{
    // Modify label
    // $label = $term->slug;

    return $label;
}

add_filter('acp/select/formatter/term_name', 'acp_select_formatter_term_name', 10, 2);

/**
 * Example: append the post count to each term label so editors can see
 * how many posts are assigned to each term.
 *
 * e.g. "News (14)"
 */
add_filter(
    'acp/select/formatter/term_name',
    static function (string $label, WP_Term $term): string {
        $label .= ' (' . $term->count . ')';

        return $label;
    },
    10,
    2
);

/**
 * Example: show only the term's own name, without the parent hierarchy prefix,
 * to keep the dropdown concise for deeply nested taxonomies.
 *
 * e.g. "Child" instead of "Parent » Child"
 */
add_filter(
    'acp/select/formatter/term_name',
    static function (string $label, WP_Term $term): string {
        return $term->name;
    },
    10,
    2
);
