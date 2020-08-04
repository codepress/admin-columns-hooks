<?php
/**
 * You can deactivate specific columns from exporting by using the `ac/export/column/disable` hook
 */

/**
 * Disable a specific column for export based on it's name.
 * Custom columns have a random generated name, so be aware of that!
 *
 * @param bool      $is_disabled
 * @param AC\Column $column
 *
 * @return bool
 */
function acp_export_disable_export_for_title_column( $is_disabled, AC\Column $column ) {
	if ( $column->get_name() === 'title' ) {
		return true;
	}

	return $is_disabled;
}

add_filter( 'ac/export/column/disable', 'acp_export_disable_export_for_title_column', 10, 2 );

/**
 * Example for disabling specific columns based on the class.
 * This Example also shows some additional conditionals that can be used for the Custom Field column
 *
 * @param bool      $is_disabled
 * @param AC\Column $column
 *
 * @return bool
 */
function acp_export_disable_export_for_custom_field_column( $is_disabled, AC\Column $column ) {
	if ( $column instanceof AC\Column\CustomField ) {
		// Additionally check for meta key to enable / disable specific columns
		if ( 'your_custom_field_key' === $column->get_meta_key() ) {
			return false;
		}

		if ( 'date' === $column->get_field_type() ) {
			return false;
		}

		return true;
	}

	return $is_disabled;
}

add_filter( 'ac/export/column/disable', 'acp_export_disable_export_for_custom_field_column', 10, 2 );