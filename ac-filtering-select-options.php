<?php

/**
 * The `ac/filtering/select/options` filter modifies the options shown in the filter bar
 * dropdown for a column. This applies to the persistent filter dropdowns above the list table,
 * as opposed to `ac/search/select/options` which applies to Smart Filtering.
 *
 * Each option in the array has the shape: ['id' => 'value', 'text' => 'Label']
 */

/**
 * @param array             $options     The current list of options. Each item: ['id' => string, 'text' => string]
 * @param AC\Column\Context $column      The column whose filter dropdown is being populated.
 * @param AC\ListScreen     $list_screen The list screen the filter belongs to.
 *
 * @return array
 */
add_filter(
    'ac/filtering/select/options',
    static function (array $options, AC\Column\Context $column, AC\ListScreen $list_screen): array {
        return $options;
    },
    10,
    3
);

/**
 * Example: rename or reformat option labels for a specific custom field filter dropdown.
 * Useful when the stored values are not human-readable (e.g. numeric IDs or slugs).
 */
add_filter(
    'ac/filtering/select/options',
    static function (array $options, AC\Column\Context $column): array {
        if ( ! $column instanceof AC\Column\CustomFieldContext) {
            return $options;
        }

        if ($column->get_meta_key() !== 'my_status_field') {
            return $options;
        }

        $labels = [
            'draft'     => 'In Progress',
            'review'    => 'Awaiting Review',
            'approved'  => 'Approved',
        ];

        foreach ($options as &$option) {
            if (isset($labels[$option['id']])) {
                $option['text'] = $labels[$option['id']];
            }
        }

        return $options;
    },
    10,
    2
);

/**
 * Example: prepend a custom "All" option to the filter dropdown so users can
 * explicitly reset the filter without having to clear it another way.
 */
add_filter(
    'ac/filtering/select/options',
    static function (array $options, AC\Column\Context $column): array {
        if ( ! $column instanceof AC\Column\CustomFieldContext) {
            return $options;
        }

        if ($column->get_meta_key() !== 'my_custom_field') {
            return $options;
        }

        array_unshift($options, ['id' => '', 'text' => '— All —']);

        return $options;
    },
    10,
    2
);
