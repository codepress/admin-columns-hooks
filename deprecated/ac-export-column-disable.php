<?php
/**
 * @removed   since 7.0
 */

/**
 * You can deactivate specific columns from exporting by using the `ac/export/column/disable` hook
 */

/**
 * Disable a specific column for export based on its name.
 * Custom columns have a random generated name, so be aware of that!
 */
function acp_export_disable_export_for_title_column(bool $is_disabled, AC\Column $column): bool
{
    if ($column->get_name() === 'title') {
        return true;
    }

    return $is_disabled;
}

add_filter('ac/export/column/disable', 'acp_export_disable_export_for_title_column', 10, 2);

/**
 * Example for disabling specific columns based on the class.
 * This Example also shows some additional conditionals that can be used for the Custom Field column
 */
function acp_export_disable_export_for_custom_field_column(bool $is_disabled, AC\Column $column): bool
{
    if ($column instanceof AC\Column\CustomField) {
        // Additionally check for meta key to enable / disable specific columns
        if ('your_custom_field_key' === $column->get_meta_key()) {
            return false;
        }

        if ('date' === $column->get_field_type()) {
            return false;
        }

        return true;
    }

    return $is_disabled;
}

add_filter('ac/export/column/disable', 'acp_export_disable_export_for_custom_field_column', 10, 2);