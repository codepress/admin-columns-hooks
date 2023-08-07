<?php

/**
 * The filter allows you to add column settings to specific list tables dynamically
 * This might be usefull if you want ot add a column set to every post type for example.
 * One thing to keep in mind is that every key must be unique.
 */

add_filter('acp/storage/repositories/callback', function (array $callbacks) {
    $callbacks['example_callback'] = 'acpUsageExampleCallback';
    $callbacks['dummy_callback'] = 'acpExampleStorageCallback';

    return $callbacks;
});

function acpUsageExampleCallback(): array
{
    /*
     * Expected callback function should return an array of list_screen settings ad that should be used by Local Storage or Export settings
     * An example of the expected result of the callback can be found further down this file (acpExampleStorageCallback)
     */

    $data = [];
    $data[] = [
        'version'     => '6.3',
        'list_screen' => [], // Settings are used in Local Settings and/or export
    ];

    return $data;
}

/**
 * Example callback that adds a column set for two default post types
 */
function acpExampleStorageCallback(): array
{
    $data = [];

    foreach (['post', 'page'] as $post_type) {
        $data[] = [
            'version'     => '6.3',
            'list_screen' => [
                'title'    => 'Dynamic columns for ' . $post_type,
                'type'     => $post_type,
                'id'       => md5('custom' . $post_type),
                'updated'  => time(),
                'columns'  => [
                    'title' =>
                        [
                            'type'       => 'title',
                            'label'      => 'Dynamically loaded for ' . $post_type,
                            'width'      => '',
                            'width_unit' => '%',
                            'export'     => 'on',
                            'sort'       => 'on',
                            'edit'       => 'on',
                            'bulk_edit'  => 'on',
                            'search'     => 'on',
                            'name'       => 'title',
                        ],
                ],
                'settings' =>
                    [
                        'hide_inline_edit'        => 'off',
                        'hide_bulk_edit'          => 'off',
                        'hide_filters'            => 'off',
                        'hide_filter_post_date'   => 'off',
                        'hide_filter_category'    => 'off',
                        'hide_filter_post_format' => 'off',
                        'hide_smart_filters'      => 'off',
                        'hijgfjfde_segments'      => 'off',
                        'hide_export'             => 'off',
                        'hide_new_inline'         => 'off',
                        'hide_submenu'            => 'off',
                        'hide_search'             => 'off',
                        'hide_bulk_actions'       => 'off',
                        'resize_columns'          => 'off',
                        'horizontal_scrolling'    => 'on',
                        'sorting'                 => '0',
                        'sorting_order'           => 'asc',
                        'filter_segment'          => 'filter_segment',
                    ],
            ],
        ];
    }

    return $data;
}