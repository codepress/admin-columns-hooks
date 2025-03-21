<?php
/**
 * Disable Bulk Edit on column level despite the column settings
 */

/**
 * Example that check a specific custom field column by its used key and disables bulk editing
 */
function acp_editing_bulk_editing_disable_for_custom_field_column(bool $is_active, AC\Column $column): bool
{
    if ($column instanceof ACP\Column\CustomField && 'optional_specific_field_check' === $column->get_meta_key()) {
        $is_active = false;
    }

    return $is_active;
}

add_filter('acp/editing/bulk/is_active', 'acp_editing_bulk_editing_disable_for_custom_field_column', 10, 2);

/**
 * Disable bulk editing for a specific column by targeting the column by its name
 * You can find the column name by hovering over the "Type" label in the column setting.
 */
function acp_editing_bulk_disable_for_column_by_name(bool $is_active, AC\Column $column): bool
{
    $column_name = '5d288ab7a019f';

    if ($column_name === $column->get_name()) {
        $is_active = false;
    }

    return $is_active;
}

add_filter('acp/editing/bulk/is_active', 'acp_editing_bulk_disable_for_column_by_name', 10, 2);

/**
 * Disable bulk editing for a specific column by targeting the column by its type
 * You can find the column name by hovering over the "Type" label in the column setting, or you can show this by enabling it in the screen options menu (top right overview)
 */
function acp_editing_bulk_disable_for_column_type(bool $is_active, AC\Column $column, AC\ListScreen $list_screen): bool
{
    if (
        'column-featured_image' === $column->get_type() &&
        'page' === $list_screen->get_post_type()
    ) {
        $is_active = false;
    }

    return $is_active;
}

add_filter('acp/editing/bulk/is_active', 'acp_editing_bulk_disable_for_column_type', 10, 2);