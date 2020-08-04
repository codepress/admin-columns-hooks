<?php
/**
 * This hooks allows you to alter the sorting behavior of Custom Fields with the field type set to date
 * By default sorting works on date time format (Y-m-d H:i:s) but you might change this for other stored formats in the database
 */

/**
 * @param string                $date_type
 * @param AC\Column\CustomField $column
 *
 * @return string
 */
function acp_sorting_custom_field_date_type_usage( $date_type, AC\Column\CustomField $column ) {
	// $date_type = 'datetime|date|numeric'

	return $date_type;
}

add_filter( 'acp/sorting/custom_field/date_type', 'acp_sorting_custom_field_date_type_usage', 10, 2 );

/**
 * @param string                $date_type
 * @param AC\Column\CustomField $column
 *
 * @return string
 */
function acp_sorting_custom_field_date_type( $date_type, AC\Column\CustomField $column ) {

	// This is the default settings for a custom field date type
	if ( 'my_datetime_field' === $column->get_meta_key() ) {
		$date_type = ACP\Sorting\Type\DataType::DATETIME; // 'datetime'
	}

	// Change to numeric when working with UNIX Timestamps
	if ( 'my_timestamp_field' === $column->get_meta_key() ) {
		$date_type = ACP\Sorting\Type\DataType::NUMERIC; // 'numeric'
	}

	// Change to date when working with dates without time notations
	if ( 'my_date_field' === $column->get_meta_key() ) {
		$date_type = ACP\Sorting\Type\DataType::DATE; // 'date'
	}

	return $date_type;
}

add_filter( 'acp/sorting/custom_field/date_type', 'acp_sorting_custom_field_date_type', 10, 2 );
