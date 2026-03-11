<?php

/**
 * Hook: ac/export/data
 *
 * Fires after the export data has been collected, before the CSV is generated.
 * Use this hook to add custom columns, modify cell values, or change column headers.
 *
 * @param ACP\Export\Exporter\TableData $data         The export data object. Use add_header() and add_cell() to modify the output.
 * @param AC\Type\ValueCollection       $rows         Collection of row identifiers (e.g. post IDs) included in the export.
 * @param AC\ColumnIterator             $columns      Iterator over the columns being exported.
 * @param AC\TableScreen                $table_screen The current table screen context (e.g. posts, users, media).
 */
add_action('ac/export/data', static function(ACP\Export\Exporter\TableData $data, AC\Type\ValueCollection $rows, AC\ColumnIterator $columns, AC\TableScreen $table_screen) {

}, 10, 4);


/**
 * Example: Add a custom column with values from post meta
 */
add_action('ac/export/data', static function(ACP\Export\Exporter\TableData $data, AC\Type\ValueCollection $rows, AC\ColumnIterator $columns, AC\TableScreen $table_screen) {

    // Add a custom column to the table and populate its values
    $column_id = 'custom_column';

    // Add the column header to the table
    $data->add_header($column_id, 'Custom column');

    foreach ($rows as $row) {
        $value = get_post_meta($row->get_id(), 'my_custom_field', true) ?: 'empty value';

        // Add the cell value to the table for the current row and column
        $data->add_cell( $row->get_id(), $column_id, $value);
    }
}, 10, 4);


/**
 * Example: Overwrite a column header label
 */
add_action('ac/export/data', static function(ACP\Export\Exporter\TableData $data, AC\Type\ValueCollection $rows, AC\ColumnIterator $columns, AC\TableScreen $table_screen) {

    // Overwrite the default headers with custom ones
    $data->add_header('2838234c19db22', 'My Column Label');
}, 10, 4);