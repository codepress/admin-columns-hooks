<?php


add_action('ac/export/data', static function(ACP\Export\Exporter\TableData $data, AC\Type\ValueCollection $rows, AC\ColumnIterator $columns, AC\TableScreen $table_screen) {

}, 10, 4);


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


add_action('ac/export/data', static function(ACP\Export\Exporter\TableData $data, AC\Type\ValueCollection $rows, AC\ColumnIterator $columns, AC\TableScreen $table_screen) {

    // Overwrite the default headers with custom ones
    $data->add_header('2838234c19db22', 'My Column Label');
}, 10, 4);