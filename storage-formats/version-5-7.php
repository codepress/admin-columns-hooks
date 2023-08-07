<?php

return [
    'version'  => '5.7',
    'title'    => 'Column settings for 5.7 and up',
    'type'     => 'post',
    'id'       => '60ffbef37b309',
    'updated'  => 1627884655,
    'columns'  =>
        [
            'title'  =>
                [
                    'type'       => 'title',
                    'label'      => 'Title',
                    'width'      => '',
                    'width_unit' => '%',
                    'export'     => 'on',
                    'sort'       => 'on',
                    'edit'       => 'on',
                    'bulk_edit'  => 'on',
                    'search'     => 'on',
                    'name'       => 'title',
                ],
            'author' =>
                [
                    'type'       => 'author',
                    'label'      => 'Author',
                    'width'      => '10',
                    'width_unit' => '%',
                    'export'     => 'on',
                    'sort'       => 'on',
                    'edit'       => 'on',
                    'bulk_edit'  => 'on',
                    'search'     => 'on',
                    'name'       => 'author',
                ],
        ],
    'settings' =>
        [
            'hide_inline_edit'                    => 'off',
            'hide_bulk_edit'                      => 'off',
            'hide_filters'                        => 'off',
            'hide_filter_product_category'        => 'off',
            'hide_filter_product_type'            => 'off',
            'hide_filter_product_stock_status'    => 'off',
            'hide_filter_yoast_readability_score' => 'off',
            'hide_filter_yoast_seo_scores'        => 'off',
            'hide_smart_filters'                  => 'off',
            'hide_segments'                       => 'off',
            'hide_export'                         => 'off',
            'hide_submenu'                        => 'off',
            'hide_search'                         => 'off',
            'hide_bulk_actions'                   => 'off',
            'horizontal_scrolling'                => 'on',
            'sorting'                             => '0',
            'sorting_order'                       => 'asc',
        ],
];