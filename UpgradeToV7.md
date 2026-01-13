# Hooks and Filters update V7

## Filters

The following filters have been replaced to prevent errors due to unmatching params.

| Old hook                                      | Replacement                                                                            |
|:----------------------------------------------|----------------------------------------------------------------------------------------|
| ac/column/value                               | [`ac/column/render`](./ac-column-render.php)                                           |
| ac/column/value/sanitize                      | [`ac/column/render/sanitize`](./ac-column-render-sanitize.php)                         |
| ac/headings/label                             | [`ac/column/heading/label`](./ac-column-heading-label.php)                             |
| ac/export/value                               | [`ac/export/render`](./ac-export-render.php)                                           |
| ac/export/value/escape                        | [`ac/export/render/escape`](./ac-export-render-escape.php)                             |
| acp/custom_field/stored_date_format           | [`ac/custom_field/stored_date_format`](ac-custom-field-stored_date_format.php)         |
| acp/delete/bulk/deleted_rows_per_iteration    | [`ac/delete/bulk/deleted_rows_per_iteration`](ac-delete-bulk-deleted_rows_per_iteration.php) |
| acp/delete/reassign_user                      | [`ac/delete/reassign_user`](ac-delete-reassign_user.php)                               |
| acp/editing/bulk/show_confirmation            | [`ac/editing/bulk/show_confirmation`](ac-editing-bulk-show_confirmation.php)           |
| acp/editing/bulk/updated_rows_per_iteration   | [`ac/editing/bulk/updated_rows_per_iteration`](ac-editing-bulk-updated_rows_per_iteration.php) |
| acp/editing/persistent                        | [`ac/editing/persistent`](ac-editing-persistent.php)                                   |
| acp/editing/post_statuses                     | [`ac/editing/post_statuses`](ac-editing-post_statuses.php)                             |
| acp/editing/save_value                        | [`ac/editing/save_value`](ac-editing-save_value.php)                                   |
| acp/editing/settings/post_types               | [`ac/editing/custom_field/post_types`](./ac-editing-custom-field-post_types.php)       |
| acp/editing/value                             | [`ac/editing/value`](ac-editing-value.php)                                             |
| acp/editing/view                              | [`ac/editing/view`](ac-editing-view.php)                                               |
| acp/export/is_active                          | [`ac/export/is_active`](./ac-export-is_active.php)                                     |
| acp/export/file_name                          | [`ac/export/file_name`](./ac-export-filename.php)                                      |
| acp/filtering/cache/seconds                   | [`ac/filtering/cache/seconds`](./ac-filtering-cache-seconds.php)                       |
| acp/resize_columns/active                     | [`ac/resize_columns/active`](./ac-resize_columns-active.php)                           |
| acp/search/is_active                          | [`ac/search/enable`](./ac-search-enable.php)                                           |
| acp/search/filters                            | [`ac/search/filters`](./ac-search-filters.php)                                         |
| acp/sorting/default                           | [`ac/sorting/default`](./ac-sorting-default.php)                                       |
| acp/sorting/model                             | [`ac/sorting/model`](./ac-sorting-model.php)                                           |
| acp/sorting/remember_last_sorting_preference  | [`ac/sorting/remember_last_sorting_preference`](./ac-sorting-remember_last_sorting_preference.php) |
| acp/sorting/custom_field/date_type            | [`ac/sorting/custom_field/date_type`](./ac-sorting-custom_field-date_type.php)         |
| acp/sorting/custom_field/numeric_type         | [`ac/sorting/custom_field/numeric_type`](./ac-sorting-custom_field-numeric_type.php)   |
| acp/quick_add/enable                          | [`ac/quick_add/enable`](./ac-quick_add-enable.php)                                     |
| acp/wc/column/product/sales/statuses          | `ac/wc/column/product/sales/statuses`                                                  |

The following filters have been removed.

| Old hook                            | Notes                |
|:------------------------------------|----------------------|
| ac/admin/menu_group                 | *removed*            |
| ac/column/custom_field/field_types  | *removed*            |
| ac/column/separator                 | *removed*            |
| ac/column_group                     | *removed*            |
| ac/export/column/disable            | *removed*            |    
| ac/headings                         | *removed*            |
| ac/read_only_message                | *removed*            |
| ac/show_banner                      | *removed*            |
| acp/admin/enable_submenu            | *removed*            |
| acp/editing/inline/deprecated_style | *removed*            |
| acp/editing/value/column_type       | *removed*            |
| acp/editing/view_settings           | *removed*            |
| acp/editing/view_settings/$type     | *removed*            |
| acp/horizontal_scrolling/enable     | *removed*            |
| acp/sorting/post_status             | *removed*            |

## Actions ##

The following actions have been replaced

| Old hook                         | Replacement                              |
|----------------------------------|------------------------------------------|
| ac/column_types                  | ac/column/types                          |
| ac/columns_stored                | ac/columns/stored                        |
| acp/acf/after_get_field_options  | ac/acf/after_get_field_options           |
| acp/acf/before_get_field_options | ac/acf/before_get_field_options          |
| acp/column_types                 | [`ac/column/types/pro`](./ac-column-types-pro.php) |
| acp/editing/before_save          | ac/editing/before_save                   |
| acp/editing/saved                | [`ac/editing/saved`](./ac-editing-saved.php) |
| acp/list_screen/deleted          | `ac/list_screen/deleted`                 |
| acp/quick_add/saved              | [`ac/quick_add/saved`](./ac-quick_add-saved.php) |


The following actions have been removed

| Old hook                            | Notes                |
|:------------------------------------|----------------------|
| ac/admin/menu_group                 | *removed*            |
| ac/column/settings                  | *removed*            |
| ac/list_screen/column_created       | *removed*            |
| ac/list_screen_groups               | *removed*            |
| ac/settings/after_columns           | *removed*            |
| ac/settings/after_title             | *removed*            |
| ac/settings/before_columns          | *removed*            |
| ac/settings/sidebox                 | *removed*            |
| acp/admin/settings/hide_on_screen   | *removed*            |