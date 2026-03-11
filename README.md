# Hooks and Filters for Admin Columns

Examples and usage for available Admin Columns hooks and filters


> The hooks and filters are only supported from version 7. All hooks supported below version 7 are maintained in a separate branch (legacy). https://github.com/codepress/admin-columns-hooks/tree/legacy

* Website: https://admincolumns.com
* Documentation: https://docs.admincolumns.com
* List of Hooks and Filters: https://docs.admincolumns.com/article/15-hooks-and-filters

## Column Value & Headings

- [`ac/column/render`](ac-column-render.php) – Filter the display value of a column.
- [`ac/column/render/sanitize`](ac-column-render-sanitize.php) – Sanitize the rendered column value.
- [`ac/column/heading/label`](ac-column-heading-label.php) – Customize column header labels.
- [`ac/column/groups`](ac-column-groups.php) – Modify column groups in the column picker.
- [`ac/column/types`](ac-column-types.php) – Adjust available column types.
- [`ac/column/custom_field/use_text_input`](ac-column-custom-field-use_text_input.php) – Force text input for custom field columns.
- [`ac/column/date/save_formats`](ac-column-date-save-formats.php) – Customize date save formats.
- [`ac/custom_field/stored_date_format`](ac-custom-field-stored_date_format.php) – Customize stored date format for custom field columns.

## Sorting & Filtering Hooks

- [`ac/sorting/default`](ac-sorting-default.php) – Modify default sorting behavior.
- [`ac/sorting/model`](ac-sorting-model.php) – Customize the sorting model for a column.
- [`ac/sorting/custom_field/date_type`](ac-sorting-custom_field-date_type.php) – Define date-type sorting for custom field columns.
- [`ac/sorting/custom_field/numeric_type`](ac-sorting-custom_field-numeric_type.php) – Define numeric-type sorting for custom field columns.
- [`ac/sorting/remember_last_sorting_preference`](ac-sorting-remember_last_sorting_preference.php) – Enable or disable remembering the last sort preference.
- [`ac/search/enable`](ac-search-enable.php) – Enable or disable the search feature.
- [`ac/search/filters`](ac-search-filters.php) – Add or modify search filters.
- [`ac/search/options`](ac-search-options.php) – Modify search filter dropdown options.
- [`ac/filtering/cache/seconds`](ac-filtering-cache-seconds.php) – Enable and configure filter caching.

## Inline & Bulk Editing

- [`ac/editing/view`](ac-editing-view.php) – Customize the editing UI.
- [`ac/editing/value`](ac-editing-value.php) – Filter the value shown in the editing field.
- [`ac/editing/save_value`](ac-editing-save_value.php) – Hook into the save process.
- [`ac/editing/saved`](ac-editing-saved.php) – Action fired after saving.
- [`ac/editing/persistent`](ac-editing-persistent.php) – Keep inline edit form open after editing.
- [`ac/editing/post_statuses`](ac-editing-post_statuses.php) – Filter available post statuses for editing.
- [`ac/editing/custom_field/post_types`](ac-editing-custom-field-post_types.php) – Filter post types for custom field editing.
- [`ac/editing/bulk/updated_rows_per_iteration`](ac-editing-bulk-updated_rows_per_iteration.php) – Control batch size in bulk edits.
- [`ac/editing/bulk/show_confirmation`](ac-editing-bulk-show_confirmation.php) – Show/hide bulk confirmation.

## Delete

- [`ac/delete/confirmation`](ac-delete-confirmation.php) – Filter delete confirmation notices.
- [`ac/delete/reassign_user`](ac-delete-reassign_user.php) – Set the reassign user when deleting users.
- [`ac/delete/bulk/deleted_rows_per_iteration`](ac-delete-bulk-deleted_rows_per_iteration.php) – Control batch size in bulk deletes.

## Export Hooks

- [`ac/export/data`](ac-export-data.php) – Modify full export data (add/remove columns, rows, format values).
- [`ac/export/render`](ac-export-render.php) – Modify export column values.
- [`ac/export/render/escape`](ac-export-render-escape.php) – Escape export values.
- [`ac/export/exporter_csv/delimiter`](ac-export-exporter_csv-delimiter.php) – Change CSV delimiter.
- [`ac/export/file_name`](ac-export-filename.php) – Customize export filenames.
- [`ac/export/is_active`](ac-export-is_active.php) – Enable or disable the export feature.
- [`ac/export/exportable_list_screen/num_items_per_iteration`](ac-export-exportable_list_screen-num_items_per_iteration.php) – Control items per batch during export.

## Quick Add

- [`ac/quick_add/enable`](ac-quick_add-enable.php) – Enable the "Quick Add" feature.
- [`ac/quick_add/saved`](ac-quick_add-saved.php) – Run after Quick Add saves.

## List Screen

- [`ac/list_screen/is_active`](ac-list_screen-is_active.php) – Enable or disable Admin Columns for a list screen.
- [`ac/list_screen/key/is_active`](ac-list_screen-key-is_active.php) – Enable or disable Admin Columns for a specific list screen key.
- [`ac/post_types`](ac-post_types.php) – Filter which post types show columns.
- [`ac/resize_columns/active`](ac-resize_columns-active.php) – Enable column resizing.

## Notices

- [`ac/suppress_site_wide_notices`](ac-suppress_site_wide_notices.php) – Hide site-wide notices.
- [`acp/hide_renewal_notice`](acp-hide_renewal_notice.php) – Remove renewal notice in Pro.

## Conditional Formatting

- [`acp/conditional_format/formats`](acp-conditional_format-formats.php) – Add conditional formatting rules.

## Select Formatting

- [`acp/select/formatter/user_name`](acp-select-formatter-user_name.php) – Customize user name display in select dropdowns.

## Addons

- [`acp/addon/active`](acp-addon-active.php) – Enable or disable specific addon integrations.

## Local Storage

- [`acp/storage/file/directory`](acp-storage-file-directory.php) – Customize storage directory.
- [`acp/storage/file/directory/writable`](acp-storage-file-directory-writable.php) – Validate writable directory.
- [`acp/storage/repositories/callback`](acp-storage-repositories-callback.php) – Load column configurations dynamically via callback.
- [`acp/storage/template/files`](acp-storage-template-files.php) – Register column template files.

## Template Functions

- [`ac_get_column()`](template-functions-get-column.php) – Get a single column instance by name.
- [`ac_get_columns()`](template-functions-get-columns.php) – Get all columns for a list screen.
- [`ac_get_list_screen()`](template-functions-get-list-screen.php) – Get a list screen instance.
- [`ac_get_list_screens()`](template-functions-get-list-screens.php) – Get all registered list screens.
