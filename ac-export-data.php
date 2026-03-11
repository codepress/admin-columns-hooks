<?php

/**
 * Hook: ac/export/data
 * Fires after the export data has been collected, before the CSV is generated.
 * Use this hook to add custom columns, modify cell values, or change column headers.
 *
 * @param ACP\Export\Exporter\TableData $data         The export data object. Use add_header() and add_cell() to modify the output.
 * @param AC\Type\ValueCollection       $rows         Collection of row identifiers (e.g. post IDs) included in the export.
 * @param AC\ColumnIterator             $columns      Iterator over the columns being exported.
 * @param AC\TableScreen                $table_screen The current table screen context (e.g. posts, users, media).
 */
add_action('ac/export/data', static function (ACP\Export\Exporter\TableData $data, AC\Type\ValueCollection $rows, AC\ColumnIterator $columns, AC\TableScreen $table_screen) {
    // Add your logic here
}, 10, 4);

/**
 * Example: Add a custom column with values from post meta
 */
add_action('ac/export/data', static function (ACP\Export\Exporter\TableData $data, AC\Type\ValueCollection $rows, AC\ColumnIterator $columns, AC\TableScreen $table_screen) {
    // Add a custom column to the table and populate its values
    $column_id = 'custom_column';

    // Add the column header to the table
    $data->add_header($column_id, 'Custom column');

    foreach ($rows as $row) {
        $value = get_post_meta($row->get_id(), 'my_custom_field', true) ?: 'empty value';

        // Add the cell value to the table for the current row and column
        $data->add_cell($row->get_id(), $column_id, $value);
    }
}, 10, 4);

/**
 * Example: Overwrite a column header label
 */
add_action('ac/export/data', static function (ACP\Export\Exporter\TableData $data, AC\Type\ValueCollection $rows, AC\ColumnIterator $columns, AC\TableScreen $table_screen) {
    // Overwrite a column label by its ID (replaces the existing label)
    $data->add_header('2838234c19db22', 'My Column Label');
}, 10, 4);

/**
 * Example: Remove a specific column from the export
 */
add_action('ac/export/data', static function (ACP\Export\Exporter\TableData $data, AC\Type\ValueCollection $rows, AC\ColumnIterator $columns, AC\TableScreen $table_screen) {
    // Remove a column by its ID (removes both the header and all cell values)
    $data->remove_column('2838234c19db22');
}, 10, 4);

/**
 * Example: Modify cell values in an existing column
 */
add_action('ac/export/data', static function (ACP\Export\Exporter\TableData $data, AC\Type\ValueCollection $rows, AC\ColumnIterator $columns, AC\TableScreen $table_screen) {
    $column_id = '2838234c19db22';

    if ( ! $data->has_column($column_id)) {
        return;
    }

    // Format all date values in a column to a different format
    foreach ($data->get_column($column_id) as $row_id => $value) {
        $timestamp = strtotime($value);

        if ($timestamp) {
            $data->add_cell((string)$row_id, $column_id, date('d/m/Y', $timestamp));
        }
    }
}, 10, 4);

/**
 * Example: Remove rows based on a condition
 */
add_action('ac/export/data', static function (ACP\Export\Exporter\TableData $data, AC\Type\ValueCollection $rows, AC\ColumnIterator $columns, AC\TableScreen $table_screen) {
    // Exclude draft posts from the export
    foreach ($rows as $row) {
        if (get_post_status($row->get_id()) === 'draft') {
            $data->remove_row($row->get_id());
        }
    }
}, 10, 4);

/**
 * Example: Only modify export data on a specific list table
 */
add_action('ac/export/data', static function (ACP\Export\Exporter\TableData $data, AC\Type\ValueCollection $rows, AC\ColumnIterator $columns, AC\TableScreen $table_screen) {
    // Only apply to the 'product' post type
    if ($table_screen->get_key() !== 'product') {
        return;
    }

    $data->add_header('sku', 'SKU');

    foreach ($rows as $row) {
        $product = wc_get_product($row->get_id());

        if ($product) {
            $data->add_cell($row->get_id(), 'sku', $product->get_sku());
        }
    }
}, 10, 4);

/**
 * Example: Combine two columns into one
 */
add_action('ac/export/data', static function (ACP\Export\Exporter\TableData $data, AC\Type\ValueCollection $rows, AC\ColumnIterator $columns, AC\TableScreen $table_screen) {
    $first_name_col = '1a2ef234b3c';
    $last_name_col = '4da3bc15e6f';

    if ( ! $data->has_column($first_name_col) || ! $data->has_column($last_name_col)) {
        return;
    }

    // Create a new "Full Name" column from first and last name
    $data->add_header('full_name', 'Full Name');

    foreach ($data->get_rows() as $row_id => $row) {
        $first = $data->get_cell((string)$row_id, $first_name_col) ?? '';
        $last = $data->get_cell((string)$row_id, $last_name_col) ?? '';

        $data->add_cell((string)$row_id, 'full_name', trim($first . ' ' . $last));
    }

    // Remove the original columns
    $data->remove_column($first_name_col);
    $data->remove_column($last_name_col);
}, 10, 4);