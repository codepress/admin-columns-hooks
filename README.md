# Hooks and Filters for Admin Columns

Examples and usage for available Admin Columns hooks and filters


> The hooks and filters are only supported from version 7. All hooks supported below version 7 are maintained in a separate branch (legacy). https://github.com/codepress/admin-columns-hooks/tree/legacy

* Website: https://admincolumns.com
* Documentation: https://docs.admincolumns.com
* List of Hooks and Filters: https://docs.admincolumns.com/article/15-hooks-and-filters

## Column Value & Headings

- `ac/column/render` – Filter the display value of a column.
- `ac/column/render/sanitize` – Sanitize the rendered column value.
- `ac/column/heading/label` – Customize column header labels.
- `ac/column/groups` – Modify column groups in the column picker.
- `ac/column/types` – Adjust available column types.
- `ac/column/custom_field/use_text_input` – Force text input for custom field columns.
- `ac/column/date/save_formats` – Customize date save formats.
- `ac/custom_field/stored_date_format` – Customize stored date format for custom field columns.

## Sorting & Filtering Hooks

- `ac/sorting/default` – Modify default sorting behavior.
- `ac/sorting/model` – Customize the sorting model for a column.
- `ac/sorting/custom_field/date_type` – Define date-type sorting for custom field columns.
- `ac/sorting/custom_field/numeric_type` – Define numeric-type sorting for custom field columns.
- `ac/sorting/remember_last_sorting_preference` – Enable or disable remembering the last sort preference.
- `ac/search/enable` – Enable or disable the search feature.
- `ac/search/filters` – Add or modify search filters.
- `ac/search/options` – Modify search filter dropdown options.
- `ac/filtering/cache/seconds` – Enable and configure filter caching.

## Inline & Bulk Editing

- `ac/editing/view` – Customize the editing UI.
- `ac/editing/value` – Filter the value shown in the editing field.
- `ac/editing/save_value` – Hook into the save process.
- `ac/editing/saved` – Action fired after saving.
- `ac/editing/persistent` – Keep inline edit form open after editing.
- `ac/editing/post_statuses` – Filter available post statuses for editing.
- `ac/editing/custom_field/post_types` – Filter post types for custom field editing.
- `ac/editing/bulk/updated_rows_per_iteration` – Control batch size in bulk edits.
- `ac/editing/bulk/show_confirmation` – Show/hide bulk confirmation.

## Delete

- `ac/delete/confirmation` – Filter delete confirmation notices.
- `ac/delete/reassign_user` – Set the reassign user when deleting users.
- `ac/delete/bulk/deleted_rows_per_iteration` – Control batch size in bulk deletes.

## Export Hooks

- `ac/export/data` – Modify full export data (add/remove columns, rows, format values).
- `ac/export/render` – Modify export column values.
- `ac/export/render/escape` – Escape export values.
- `ac/export/exporter_csv/delimiter` – Change CSV delimiter.
- `ac/export/file_name` – Customize export filenames.
- `ac/export/is_active` – Enable or disable the export feature.
- `ac/export/exportable_list_screen/num_items_per_iteration` – Control items per batch during export.

## Quick Add

- `ac/quick_add/enable` – Enable the "Quick Add" feature.
- `ac/quick_add/saved` – Run after Quick Add saves.

## List Screen

- `ac/list_screen/is_active` – Enable or disable Admin Columns for a list screen.
- `ac/list_screen/key/is_active` – Enable or disable Admin Columns for a specific list screen key.
- `ac/post_types` – Filter which post types show columns.
- `ac/resize_columns/active` – Enable column resizing.

## Notices

- `ac/suppress_site_wide_notices` – Hide site-wide notices.
- `acp/hide_renewal_notice` – Remove renewal notice in Pro.

## Conditional Formatting (Pro)

- `acp/conditional_format/formats` – Add conditional formatting rules.

## Select Formatting (Pro)

- `acp/select/formatter/user_name` – Customize user name display in select dropdowns.

## Addons (Pro)

- `acp/addon/active` – Enable or disable specific addon integrations.

## Local Storage (Pro)

- `acp/storage/file/directory` – Customize storage directory.
- `acp/storage/file/directory/writable` – Validate writable directory.
- `acp/storage/repositories/callback` – Load column configurations dynamically via callback.
- `acp/storage/template/files` – Register column template files.

## Template Functions

- `ac_get_column()` – Get a single column instance by name.
- `ac_get_columns()` – Get all columns for a list screen.
- `ac_get_list_screen()` – Get a list screen instance.
- `ac_get_list_screens()` – Get all registered list screens.