# Hooks and Filters for Admin Columns

Examples and usage for available Admin Columns hooks and filters


> The hooks and filters are only supported from version 7. All hooks supported below version 7 are maintained in a separate branch (legacy). https://github.com/codepress/admin-columns-hooks/tree/legacy

* Website: https://admincolumns.com
* Documentation: https://docs.admincolumns.com
* List of Hooks and Filters: https://docs.admincolumns.com/article/15-hooks-and-filters

## Column Value & Headings

Control how column values are displayed, sanitized, and labeled in the list table. Includes hooks for modifying column groups, available types, and date/custom field formatting.

- [`ac/column/render`](ac-column-render.php) – Filter the display value of a column.
- [`ac/column/render/sanitize`](ac-column-render-sanitize.php) – Sanitize the rendered column value.
- [`ac/column/heading/label`](ac-column-heading-label.php) – Customize column header labels.
- [`ac/column/groups`](ac-column-groups.php) – Modify column groups in the column picker.
- [`ac/column/types`](ac-column-types.php) – Adjust available column types.
- [`ac/column/custom_field/use_text_input`](ac-column-custom-field-use_text_input.php) – Force text input for custom field columns.
- [`ac/column/date/save_formats`](ac-column-date-save-formats.php) – Customize date save formats.
- [`ac/custom_field/stored_date_format`](ac-custom-field-stored_date_format.php) – Customize stored date format for custom field columns.

## Sorting & Filtering Hooks

Control how columns are sorted and how filter dropdowns behave. Covers default sort order, custom sort models, type-specific sorting for dates and numbers, and search/filter configuration.

- [`ac/sorting/default`](ac-sorting-default.php) – Modify default sorting behavior.
- [`ac/sorting/model`](ac-sorting-model.php) – Customize the sorting model for a column.
- [`ac/sorting/custom_field/date_type`](ac-sorting-custom_field-date_type.php) – Define date-type sorting for custom field columns.
- [`ac/sorting/custom_field/numeric_type`](ac-sorting-custom_field-numeric_type.php) – Define numeric-type sorting for custom field columns.
- [`ac/sorting/remember_last_sorting_preference`](ac-sorting-remember_last_sorting_preference.php) – Enable or disable remembering the last sort preference.
- [`ac/search/enable`](ac-search-enable.php) – Enable or disable the search feature.
- [`ac/search/filters`](ac-search-filters.php) – Add or modify search filters.
- [`ac/search/options`](ac-search-options.php) – Modify search filter dropdown options.
- [`ac/filtering/cache/seconds`](ac-filtering-cache-seconds.php) – Enable and configure filter caching.
- [`ac/filtering/select/options`](ac-filtering-select-options.php) – Modify the options shown in filter bar dropdowns.

## Inline & Bulk Editing

Customize the inline and bulk editing experience. Hooks cover the editing UI, displayed and saved values, post status options, and batch size for bulk operations.

- [`ac/editing/view`](ac-editing-view.php) – Customize the editing UI.
- [`ac/editing/value`](ac-editing-value.php) – Filter the value shown in the editing field.
- [`ac/editing/save_value`](ac-editing-save_value.php) – Hook into the save process.
- [`ac/editing/saved`](ac-editing-saved.php) – Action fired after saving.
- [`ac/editing/before_save`](ac-editing-before_save.php) – Action fired before a value is saved (inline or bulk edit).
- [`ac/editing/persistent`](ac-editing-persistent.php) – Keep inline edit form open after editing.
- [`ac/editing/post_statuses`](ac-editing-post_statuses.php) – Filter available post statuses for editing.
- [`ac/editing/custom_field/post_types`](ac-editing-custom-field-post_types.php) – Filter post types for custom field editing.
- [`ac/editing/bulk/updated_rows_per_iteration`](ac-editing-bulk-updated_rows_per_iteration.php) – Control batch size in bulk edits.
- [`ac/editing/bulk/show_confirmation`](ac-editing-bulk-show_confirmation.php) – Show/hide bulk confirmation.

## Delete

Hooks for the bulk delete feature, including confirmation dialogs, user reassignment on deletion, and batch size control.

- [`ac/delete/confirmation`](ac-delete-confirmation.php) – Filter delete confirmation notices.
- [`ac/delete/reassign_user`](ac-delete-reassign_user.php) – Set the reassign user when deleting users.
- [`ac/delete/bulk/deleted_rows_per_iteration`](ac-delete-bulk-deleted_rows_per_iteration.php) – Control batch size in bulk deletes.

## Export Hooks

Customize the CSV export feature. Hooks allow you to modify export data, format values, escape output, change the delimiter, set filenames, toggle the feature, and control batch size during export.

- [`ac/export/data`](ac-export-data.php) – Modify full export data (add/remove columns, rows, format values).
- [`ac/export/render`](ac-export-render.php) – Modify export column values.
- [`ac/export/render/escape`](ac-export-render-escape.php) – Escape export values.
- [`ac/export/exporter_csv/delimiter`](ac-export-exporter_csv-delimiter.php) – Change CSV delimiter.
- [`ac/export/file_name`](ac-export-filename.php) – Customize export filenames.
- [`ac/export/is_active`](ac-export-is_active.php) – Enable or disable the export feature.
- [`ac/export/exportable_list_screen/num_items_per_iteration`](ac-export-exportable_list_screen-num_items_per_iteration.php) – Control items per batch during export.

## Quick Add

Hooks for the Quick Add feature, which allows creating new entries directly from the list table without leaving the screen.

- [`ac/quick_add/enable`](ac-quick_add-enable.php) – Enable the "Quick Add" feature.
- [`ac/quick_add/saved`](ac-quick_add-saved.php) – Run after Quick Add saves.

## List Screen

Control which list screens Admin Columns is active on, which post types show columns, and whether column resizing is enabled.

- [`ac/list_screen/is_active`](ac-list_screen-is_active.php) – Enable or disable Admin Columns for a list screen.
- [`ac/list_screen/key/is_active`](ac-list_screen-key-is_active.php) – Enable or disable Admin Columns for a specific list screen key.
- [`ac/post_types`](ac-post_types.php) – Filter which post types show columns.
- [`ac/list_screen/saved`](ac-list_screen-saved.php) – Action fired after a column configuration is saved.
- [`ac/resize_columns/active`](ac-resize_columns-active.php) – Enable column resizing.

## Notices

Suppress or hide admin notices shown by Admin Columns, including site-wide notices and the Pro license renewal reminder.

- [`ac/suppress_site_wide_notices`](ac-suppress_site_wide_notices.php) – Hide site-wide notices.
- [`acp/hide_renewal_notice`](acp-hide_renewal_notice.php) – Remove renewal notice in Pro.

## Conditional Formatting

Register custom conditional formatting rules that apply visual styles to column values based on defined conditions.
- [`acp/conditional_format/formats`](acp-conditional_format-formats.php) – Add conditional formatting rules.

## Select Formatting

Customize how values are displayed in select-type column dropdowns, such as overriding the format used for user names.
- [`acp/select/formatter/post_title`](acp-select-formatter-post_title.php) – Customize post title display in select dropdowns.
- [`acp/select/formatter/term_name`](acp-select-formatter-term_name.php) – Customize term name display in select dropdowns.
- [`acp/select/formatter/user_name`](acp-select-formatter-user_name.php) – Customize user name display in select dropdowns.

## Addons

Enable or disable specific third-party addon integrations (e.g., ACF, MetaBox, JetEngine, Pods) provided by Admin Columns Pro.

- [`acp/addon/active`](acp-addon-active.php) – Enable or disable specific addon integrations.

## Local Storage

Configure how Admin Columns Pro stores column configurations. Hooks cover the storage directory, write permissions, dynamic configuration loading via callbacks, and registering template files.

- [`acp/storage/file/directory`](acp-storage-file-directory.php) – Customize storage directory.
- [`acp/storage/file/directory/writable`](acp-storage-file-directory-writable.php) – Validate writable directory.
- [`acp/storage/repositories/callback`](acp-storage-repositories-callback.php) – Load column configurations dynamically via callback.
- [`acp/storage/template/files`](acp-storage-template-files.php) – Register column template files.

## Template Functions

PHP functions for retrieving column and list screen objects programmatically, useful for theme templates and custom integrations.

- [`ac_get_column()`](template-functions-get-column.php) – Get a single column instance by name.
- [`ac_get_columns()`](template-functions-get-columns.php) – Get all columns for a list screen.
- [`ac_get_list_screen()`](template-functions-get-list-screen.php) – Get a list screen instance.
- [`ac_get_list_screens()`](template-functions-get-list-screens.php) – Get all registered list screens.

## Miscellaneous

Hooks available in the source that do not yet have a dedicated example file.

**Plugin lifecycle**
- `ac/ready` – Fires when Admin Columns is fully initialized.
- `acp/ready` – Fires when Admin Columns Pro is fully initialized.
- `acp/init` – Fires during Admin Columns Pro plugin initialization.
- `acp/api` – Provides access to the Admin Columns Pro API object.

**Table & screen**
- `ac/table` – Fires when the Admin Columns table is set up.
- `ac/table/request` – Fires when the table request is processed.
- `ac/table/screen` – Fires when the table screen is initialized.
- `ac/table/list_screen` – Fires when a list screen is applied to the table.
- `ac/table/body_class` – Filter CSS classes on the table wrapper element.
- `ac/table/admin_footer` – Fires in the admin footer for the table screen.
- `ac/table_scripts` – Fires when Admin Columns table scripts are enqueued.
- `ac/admin_head` – Fires in the admin head for the table screen.
- `ac/screen` – Fires for each Admin Columns screen load.

**List screen events**
- `ac/list_screen/before_create` – Fires before a new list screen is created.
- `ac/list_screen/created` – Fires after a list screen is created.
- `ac/list_screen/before_save` – Fires before a list screen is saved.
- `ac/list_screen/deleted` – Fires when a list screen is deleted.

**Editing**
- `ac/editing/bulk/active` – Enable or disable bulk editing per column.
- `ac/editing/role_group` – Customize role group labels in column permissions.
- `acp/editing/inline/button_default_state` – Set the default state of the inline edit toggle button.
- `acp/editing/rows_per_iteration` – Control rows processed per bulk edit iteration.

**UI features**
- `ac/sticky_column/enable` – Enable or disable the sticky first column feature.
- `ac/sticky_header/enable` – Enable or disable the sticky table header.
- `ac/horizontal_scrolling/enable` – Enable or disable horizontal table scrolling.
- `acp/horizontal_scrolling/show_indicator` – Show or hide the horizontal scroll indicator.
- `acp/table/views/active` – Enable or disable the table views feature.

**Search & filtering**
- `acp/filtering/terms_args` – Customize term query arguments for taxonomy filters.

**Export**
- `ac/export/row_headers` – Customize the CSV export header row.
- `acp/export/before_batch` – Fires before each export batch is processed.

**Column types**
- `ac/column/images/content` – Filter post content used to extract images for the Images column.
- `ac/column/linkcount/domains` – Filter the domains counted by the Link Count column.
- `ac/select/query/limit` – Limit the number of items returned in select queries.

**Integrations & addons**
- `ac/integration/active` – Enable or disable a specific third-party integration programmatically.
- `acp/taxonomies` – Filter the list of taxonomies available in Admin Columns Pro.

**Storage**
- `acp/storage/file/enable_for_multisite` – Enable file-based column storage on multisite.
- `acp/storage/file/directory/migrate` – Trigger a storage directory migration.

**Admin**
- `ac/admin/menu_list` – Customize the Admin Columns admin menu items.
- `ac/admin/settings/table_elements` – Add or modify elements on the settings table.
- `ac/admin/page/menu` – Customize the Admin Columns page menu.
- `acp/admin/page/menu` – Customize the Admin Columns Pro page menu.
- `ac/display_licence` – Control whether the license section is shown in the admin.
- `ac/capabilities/init` – Fires when Admin Columns capabilities are initialized.
- `ac/settings/restore` – Fires when Admin Columns settings are restored.
