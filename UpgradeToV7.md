# Hooks and Filters update V7

## Filters

The following filters have been removed.

| Old hook                            | Notes                |
|:------------------------------------|----------------------|
| ac/admin/menu_group                 |                      |
| ac/column/custom_field/field_types  |                      |
| ac/column/separator                 |                      |
| ac/column_group                     |                      |
| ac/export/column/disable            |                      |    
| ac/headings                         |                      |
| ac/read_only_message                |                      |
| ac/show_banner                      |                      |
| acp/admin/enable_submenu            |                      |
| acp/editing/inline/deprecated_style |                      |
| acp/editing/value/column_type       |                      |
| acp/editing/view_settings           | Deprecated since 5.7 |
| acp/editing/view_settings/$type     | Deprecated since 5.7 |
| acp/horizontal_scrolling/enable     |                      |
| acp/sorting/post_status             |                      |

The following filters have been replaced to prevent errors due to unmatching params.

| Old hook                                     | Replacement                                                                                        |
|:---------------------------------------------|----------------------------------------------------------------------------------------------------|
| ac/column/value                              | [`ac/column/render`](./ac-column-render.php)                                                       |
| ac/column/value/sanitize                     | [`ac/v2/column/value/sanitize`](./ac-column-render-sanitize.php)                                   |
| ac/headings/label                            | [`ac/column/heading/label`](./ac-column-heading-label.php)                                         |
| ac/export/value                              | [`ac/export/render`](./ac-export-render.php)                                                       |
| ac/export/value/escape                       | [`ac/export/render/escape`](./ac-export-render-escape.php)                                         |
| acp/custom_field/stored_date_format          | [`ac/custom_field/stored_date_format`](ac-custom-field-stored_date_format.php)                     |
| acp/delete/bulk/deleted_rows_per_iteration   | [`ac/delete/bulk/deleted_rows_per_iteration`](ac-delete-bulk-deleted_rows_per_iteration.php)       |
| acp/delete/reassign_user                     | [`ac/delete/reassign_user`](ac-delete-reassign_user.php)                                           |
| acp/editing/bulk/show_confirmation           | [`ac/editing/bulk/show_confirmation`](ac-editing-bulk-show_confirmation.php)                       |
| acp/editing/bulk/updated_rows_per_iteration  | [`ac/editing/bulk/updated_rows_per_iteration`](ac-editing-bulk-updated_rows_per_iteration.php)     |
| acp/editing/persistent                       | [`ac/editing/persistent`](ac-editing-persistent.php)                                               |
| acp/editing/post_statuses                    | [`ac/editing/post_statuses`](ac-editing-post_statuses.php)                                         |
| acp/editing/save_value                       | [`acp/v2/editing/save_value`](ac-editing-save_value.php)                                           |
| acp/editing/settings/post_types              | [`ac/editing/custom_field/post_types`](./ac-editing-custom-field-post_types.php)                   |
| acp/editing/value                            | [`acp/v2/editing/value`](ac-editing-value.php)                                                     |
| acp/editing/view                             | [`acp/v2/editing/view`](ac-editing-view.php)                                                       |
| acp/export/is_active                         | [`ac/export/is_active`](./ac-export-is_active.php)                                                 |
| acp/export/file_name                         | [`ac/export/file_name`](./ac-export-filename.php)                                                  |
| acp/filtering/cache/seconds                    | [`ac/filtering/cache/seconds`](./ac-filtering-cache-seconds.php)              |
| acp/resize_columns/active                    | [`ac/resize_columns/active`](./ac-resize_columns-active.php)                                       |
| acp/search/is_active                         | [`ac/search/enable`](./ac-search-enable.php)                                                       |
| acp/search/filters                           | [`ac/search/filters`](./ac-search-filters.php)                                                     |
| acp/sorting/default                          | [`ac/sorting/default`](./ac-sorting-default.php)                                                   |
| acp/sorting/model                            | [`ac/sorting/model`](./ac-sorting-model.php)                                                       |
| acp/sorting/remember_last_sorting_preference | [`ac/sorting/remember_last_sorting_preference`](./ac-sorting-remember_last_sorting_preference.php) |
| acp/sorting/custom_field/date_type           | [`ac/sorting/custom_field/date_type`](./ac-sorting-custom_field-date_type.php)                     |
| acp/sorting/custom_field/numeric_type        | [`ac/sorting/custom_field/numeric_type`](./ac-sorting-custom_field-numeric_type.php)               |
| acp/quick_add/enable                         | [`ac/quick_add/enable`](./ac-quick_add-enable.php)                                                 |
| acp/wc/column/product/sales/statuses         | `ac/wc/column/product/sales/statuses`                                                              |

## Actions ##

The following actions have been removed
| Old hook | Notes |
|:----------------------------------|-------|
| ac/column/header | |
| ac/column/settings | |
| ac/list_screen/column_created | |
| ac/list_screen_groups | |
| ac/settings/after_columns | |
| ac/settings/after_title | |
| ac/settings/before_columns | |
| ac/settings/sidebox | |
| acp/admin/settings/hide_on_screen | |

The following actions have been replaced

| Old hook                         | Replacement                                        |
|----------------------------------|----------------------------------------------------|
| ac/column_types                  | ac/column/types                                    |
| ac/columns_stored                | ac/columns/stored                                  |
| acp/acf/after_get_field_options  | acp/v2/acf/after_get_field_options                 |
| acp/acf/before_get_field_options | acp/v2/acf/before_get_field_options                |
| acp/column_types                 | [`ac/column/types/pro`](./ac-column-types-pro.php) |
| acp/editing/before_save          | acp/v2/editing/before_save                         |
| acp/editing/saved                | [`acp/v2/editing/saved`](./ac-editing-saved.php)   |
| acp/list_screen/deleted          | `ac/list_screen/deleted`                           |
| acp/quick_add/saved              | [`ac/quick_add/saved`](./ac-quick_add-saved.php)   |