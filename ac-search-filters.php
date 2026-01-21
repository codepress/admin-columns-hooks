<?php
/**
 * Hook to change the filter settings for a column
 */

/** Usage */

add_filter('ac/search/filters', static function (
    array $filter,
    AC\Column\Context $column,
    AC\TableScreen $table
): array {
    return $filter;
}, 10, 3);

/**
 * Unset Smart Filtering operators for a specific column
 * It is not possible to add new operators since the list of operators only contains items that are implemented
 */
function ac_search_filter_unset_operators_for_title_column(array $filter, AC\Column\Context $column): array
{
    if ($column->get('title')) {
        // Unset Operators (only unset is possible, otherwise it will lead to fatal errors
        unset($filter['operators'][array_search('not_equal', $filter['operators'])]);
        unset($filter['operators'][array_search('begins_with', $filter['operators'])]);
        $filter['operators'] = array_values($filter['operators']);
    }

    return $filter;
}

add_filter('ac/search/filters', 'ac_search_filter_unset_operators_for_title_column', 10, 2);

/**
 * Example on how to modify the options for Smart Filtering for a specific column
 */
function ac_search_filters_overwrite_search_values_for_post_format_column(
    array $filter,
    AC\Column\Context $column
): array {
    if ('column-post_formats' === $column->get_type()) {
        $filter['options'] = [
            ['id' => 'post-format-standard', 'text' => 'Standard'],
            ['id' => 'post-format-aside', 'text' => 'Aside'],
        ];
    }

    return $filter;
}

add_filter('ac/search/filters', 'ac_search_filters_overwrite_search_values_for_post_format_column', 10, 2);