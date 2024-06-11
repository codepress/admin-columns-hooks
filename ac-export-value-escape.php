<?php
/**
 * The following filter allows you to disable the default sanitazion of cell values.
 * Because of the sanitazion value started with =,-,+, and @ are prefixed with a quote to prevent cell execution
 */

// This example disabled sanitation for all columns
add_filter('ac/export/value/escape', '__return_false');

// This example disabled sanitation for all Custom Field Columns
add_filter('ac/export/value/escape', static function ($enabled, Ac\Column $column) {
    if ($column instanceof AC\Column\CustomField) {
        return false;
    }

    return $enabled;
}, 10, 2);