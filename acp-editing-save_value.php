<?php

/**
 * Filter for changing the value before storing it to the DB
 *
 * @param mixed     $value  Value send from inline edit ajax callback
 * @param AC\Column $column Column object
 * @param int       $id     Post/User/Comment ID
 *
 * @return string
 */
function my_acp_editable_ajax_column_save_value( $value, AC\Column $column, $id ) {

	// Possibly modify $value

	return $value;
}

add_filter( 'acp/editing/save_value', 'my_acp_editable_ajax_column_save_value', 10, 3 );

/**
 * Change the value to a timestamp for a specific custom field
 *
 * @param string    $value
 * @param AC\Column $column
 *
 * @return string
 */
function acp_editing_change_date_format_for_custom_field( $value, AC\Column $column ) {

	if ( $column instanceof ACP\Column\CustomField && 'date' == $column->get_field_type() && 'my_date_field_key' === $column->get_meta_key() && $value ) {

		// Convert submitted value to a unix timestamp
		$value = strtotime( $value );
	}

	return $value;
}

add_filter( 'acp/editing/save_value', 'acp_editing_change_date_format_for_custom_field', 10, 2 );