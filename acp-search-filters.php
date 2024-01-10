<?php
/**
 * Hook to change the filter settings for a column
 */

/**
 * Unset Smart Filtering operators for a specific column
 * It is not possible to add new operators since the list of operators only contains items that are implemented
 *
 * @param array     $filter
 * @param AC\Column $column
 *
 * @return array
 */
function acp_search_filter_unset_operators_for_title_column($filter, AC\Column $column)
{
    if ($column instanceof ACP\Column\Post\Title) {
        // Unset Operators (only unset is possible, otherwise it will lead to fatal errors
        unset($filter['operators'][array_search('not_equal', $filter['operators'])]);
        unset($filter['operators'][array_search('begins_with', $filter['operators'])]);
    }

    return $filter;
}

add_filter('acp/search/filters', 'acp_search_filter_unset_operators_for_title_column', 10, 2);

/**
 * Example on how to modify the options for Smart Filtering for a specific column
 *
 * @param array     $filter
 * @param AC\Column $column
 *
 * @return array
 */
function acp_search_filters_overwrite_search_values_for_post_format_column($filter, AC\Column $column)
{
    if ($column instanceof ACP\Column\Post\Formats) {
        $filter['values'] = [
            'post-format-standard' => 'Standard',
            'post-format-aside'    => 'Aside',
        ];
    }

    return $filter;
}

add_filter('acp/search/filters', 'acp_search_filters_overwrite_search_values_for_post_format_column', 10, 2);