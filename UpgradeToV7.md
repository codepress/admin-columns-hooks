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
| acp/sorting/post_status             |                      |

The following filters have been replaced to prevent errors due to unmatching params.

| Old hook                                     | Replacement                                                                                        |
|:---------------------------------------------|----------------------------------------------------------------------------------------------------|
| ac/column/value                              | [`ac/column/render`](./ac-column-render.php)                                                       |
| ac/column/value/sanitize                     | [`ac/v2/column/value/sanitize`](./ac-column-render-sanitize.php)                                   |
| ac/headings/label                            | [`ac/column/heading/label`](./ac-column-heading-label.php)                                         |
| ac/export/value                              | [`acp/v2/export/value`](./acp-v2-export-value.php)                                                 |
| ac/export/value/escape                       | [`acp/v2/export/value/escape`](./acp-v2-export-escape.php)                                         |
| acp/custom_field/stored_date_format          | [`ac/custom_field/stored_date_format`](ac-custom-field-stored_date_format.php)                     |
| acp/delete/bulk/deleted_rows_per_iteration   | [`ac/delete/bulk/deleted_rows_per_iteration`](ac-delete-bulk-deleted_rows_per_iteration.php)       |
| acp/editing/bulk/updated_rows_per_iteration  | [`acp/v2/editing/bulk/updated_rows_per_iteration`](ac-editing-bulk-updated_rows_per_iteration.php) |
| acp/editing/persistent                       | [`acp/v2/editing/persistent`](ac-editing-persistent.php)                                           |
| acp/editing/post_statuses                    | ac/editing/post_statuses                                                                           |
| acp/editing/save_value                       | [`acp/v2/editing/save_value`](ac-editing-save_value.php)                                           |
| acp/editing/settings/post_types              | acp/v2/editing/settings/post_types                                                                 |
| acp/editing/value                            | [`acp/v2/editing/value`](ac-editing-value.php)                                                     |
| acp/editing/view                             | [`acp/v2/editing/view`](ac-editing-view.php)                                                       |
| acp/export/is_active                         | acp/v2/export/is_active                                                                            |
| acp/horizontal_scrolling/enable              | acp/v2/horizontal_scrolling/enable                                                                 |
| acp/search/filters                           | acp/v2/search/filters                                                                              |
| acp/sorting/default                          | acp/v2/sorting/default                                                                             |
| acp/sorting/model                            | acp/v2/sorting/model                                                                               |
| acp/sorting/remember_last_sorting_preference | acp/v2/sorting/remember_last_sorting_preference                                                    |
| acp/wc/column/product/sales/statuses         | acp/v2/wc/column/product/sales/statuses                                                            |

## Actions ##

| Old hook                          | Notes |
|:----------------------------------|-------|
| ac/column/header                  |       |
| ac/column/settings                |       |
| ac/list_screen/column_created     |       |
| ac/list_screen_groups             |       |
| ac/settings/after_columns         |       |
| ac/settings/after_title           |       |
| ac/settings/before_columns        |       |
| ac/settings/sidebox               |       |
| acp/admin/settings/hide_on_screen |       |

| Old hook                         | Replacement                                        |
|----------------------------------|----------------------------------------------------|
| ac/column_types                  | ac/v2/column_types                                 |
| ac/columns_stored                | ac/v2/columns_stored                               |
| acp/acf/after_get_field_options  | acp/v2/acf/after_get_field_options                 |
| acp/acf/before_get_field_options | acp/v2/acf/before_get_field_options                |
| acp/column_types                 | [`acp/v2/column_types`](./acp-v2-column-types.php) |
| acp/editing/before_save          | acp/v2/editing/before_save                         |
| acp/editing/saved                | acp/v2/editing/saved                               |
| acp/list_screen/deleted          | acp/v2/list_screen/deleted                         |
| acp/quick_add/saved              | acp/v2/quick_add/saved                             |