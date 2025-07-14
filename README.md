# Hooks and Filters for Admin Columns
Examples and usage for available Admin Columns hooks and filters

* Website: https://admincolumns.com
* Documentation: https://docs.admincolumns.com
* List of Hooks and Filters: https://docs.admincolumns.com/article/15-hooks-and-filters

## Column Value & Headings

- `ac/column/value` – Filter the display value of a column.
- `ac/headings/label` – Customize column header labels.
- `ac/column/custom_field/use_text_input` – Use a text input for custom field columns.
- `acp/custom_field/stored_date_format` – Customize stored date format for custom field columns.


## Sorting & Filtering Hooks

- `acp/sorting/default` – Modify default sorting behavior.
- `acp/sorting/custom_field/date_type` – Define date-type sorting for custom field columns.
- `acp/search/filters` – Add or modify search filters.
- `acp/filtering/cache-enable` & `acp/filtering/cache-seconds` – Enable and configure filter caching.


## Inline & Bulk Editing

- `acp/editing/bulk/is_active` – Enable or disable bulk editing.
- `acp/editing/bulk/updated_rows_per_iteration` – Control batch size in bulk edits.
- `acp/editing/bulk/show_confirmation` – Show/hide bulk confirmation.
- `acp/editing/persistent` – Keep inline edit form open after editing.
- `acp/editing/save_value` – Hook into the save process.
- `acp/editing/saved` – Action fired after saving.
- `acp/editing/view` & `acp/editing/view_settings` – Customize the editing UI.


## Export Hooks

- `ac/export/value` – Modify export column values.
- `ac/export/exportable_list_screen/num_items_per_iteration` – Set batch size for exports.
- `ac/export/exporter_csv/delimiter` – Change CSV delimiter.
- `acp/export/file_name` – Customize export filenames.
- `ac/export/value/escape` – Escape export values.
- `acp/export/is_active` – Enable or disable the export feature.


## Quick Add

- `acp/quick_add/enable` – Enable the “Quick Add” feature.
- `acp/quick_add/saved` – Run after Quick Add saves.


## Notices
- `ac/delete_confirmation` – Filter delete confirmation notices.
- `ac/suppress_site_wide_notices` – Hide site-wide notices.
- `acp/hide_renewal_notice` – Remove renewal notice in Pro.


## Local Storage

- `acp/storage/file/directory` – Customize storage directory.
- `acp/storage/file/directory/writable` – Validate writable directory.


## List Table & Column Configuration

- `ac/post_types` – Filter which post types show columns.
- `acp/column_types` – Adjust available column types.
- `acp/conditional_format/formats` – Add conditional formatting rules.
- `acp/horizontal_scrolling/enable` – Toggle horizontal scroll.
- `acp/resize_columns/active` – Enable column resizing.
- `acp/select/formatter/user_name` – Customize Select2 dropdown formatting for user columns.