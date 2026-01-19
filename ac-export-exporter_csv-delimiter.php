<?php
/**
 * You can alter the delimiter with the hook `ac/export/exporter_csv/delimiter`
 * The default value is ','
 */

/**
 * Change the default export delimiter from a ',' to ';'
 */
function ac_export_change_export_delimiter(string $delimiter): string
{
    return ';';
}

add_filter('ac/export/exporter_csv/delimiter', 'ac_export_change_export_delimiter');