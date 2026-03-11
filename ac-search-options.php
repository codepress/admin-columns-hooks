<?php
/**
 * Hook to alter the options returned for the dropdown in Smart Filtering
 */

/**
 * Example usage options hook
 */
add_filter(
    'ac/search/select/options',
    static function (array $options, AC\Column\Context $column, AC\ListScreen $list_screen) {
        return $options;
    },
    10,
    3
);

/**
 * Example: Alter the label for the dropdown in the Smart Filtering select field
 */
add_filter('ac/search/select/options', static function (array $options, AC\Column\Context $column) {
    if ( ! $column instanceof AC\Column\CustomFieldContext) {
        return $options;
    }

    if ($column->get_meta_key() !== 'custom_text_field') {
        return $options;
    }

    foreach ($options as &$option) {
        if (is_numeric($option['text'])) {
            $option['text'] = 'User ID: ' . $option['text'];
        }
    }

    return $options;
}, 10, 2);
