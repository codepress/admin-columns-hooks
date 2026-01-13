# Hooks and Filters for Admin Columns

Examples and usage for available Admin Columns hooks and filters


> The hooks and filters are only supported from version 7. All hooks support below versin 7 is maintained in a separate branch (legacy). https://github.com/codepress/admin-columns-hooks/tree/legacy

* Website: https://admincolumns.com
* Documentation: https://docs.admincolumns.com
* List of Hooks and Filters: https://docs.admincolumns.com/article/15-hooks-and-filters

## Column Value & Headings

- `ac/column/render` – Filter the display value of a column.
- `ac/column/heading/label` – Customize column header labels.
- `ac/custom_field/stored_date_format` – Customize stored date format for custom field columns.

## Sorting & Filtering Hooks

- `ac/sorting/default` – Modify default sorting behavior.
- `ac/sorting/custom_field/date_type` – Define date-type sorting for custom field columns.
- `ac/search/filters` – Add or modify search filters.
- `ac/filtering/cache/seconds` – Enable and configure filter caching.

## Inline & Bulk Editing

- `ac/editing/bulk/updated_rows_per_iteration` – Control batch size in bulk edits.
- `ac/editing/bulk/show_confirmation` – Show/hide bulk confirmation.
- `ac/editing/persistent` – Keep inline edit form open after editing.
- `ac/editing/save_value` – Hook into the save process.
- `ac/editing/saved` – Action fired after saving.
- `ac/editing/view` – Customize the editing UI.

## Export Hooks

- `ac/export/render` – Modify export column values.
- `ac/export/render/escape` – Escape export values.
- `ac/export/exporter_csv/delimiter` – Change CSV delimiter.
- `ac/export/file_name` – Customize export filenames.
- `ac/export/is_active` – Enable or disable the export feature.

## Quick Add

- `ac/quick_add/enable` – Enable the “Quick Add” feature.
- `ac/quick_add/saved` – Run after Quick Add saves.

## Notices

- `ac/delete_confirmation` – Filter delete confirmation notices.
- `ac/suppress_site_wide_notices` – Hide site-wide notices.
- `acp/hide_renewal_notice` – Remove renewal notice in Pro.

## Local Storage

- `acp/storage/file/directory` – Customize storage directory.
- `acp/storage/file/directory/writable` – Validate writable directory.

## List Table & Column Configuration

- `ac/post_types` – Filter which post types show columns.
- `ac/column/types` & `ac/column/types/pro` – Adjust available column types.
- `acp/conditional_format/formats` – Add conditional formatting rules.
- `ac/horizontal_scrolling/enable` – Toggle horizontal scroll.
- `ac/resize_columns/active` – Enable column resizing.