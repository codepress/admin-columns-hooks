<?php

/**
 * This filter allows you to set the data type of a custom `date` field. Not setting the correct
 * format can result in incorrect sorting results.
 */

/**
 * Usage of the hook
 *
 * @param string                $data_type 'string', 'numeric', 'date' or 'datetime'. Default is 'datetime'.
 * @param AC\Column\CustomField $column
 *
 * @return string
 */
function acp_sorting_custom_field_date_type( $data_type, AC\Column\CustomField $column ) {

	// Change the custom field type
	// $data_type = 'datetime';

	return $data_type;
}

add_filter( 'acp/sorting/custom_field/date_type', 'acp_sorting_custom_field_date_type', 10, 2 );

/**
 * Change date format for a specific meta key from a `datetime` to a `numeric` type.
 *
 * @param string                $data_type
 * @param AC\Column\CustomField $column
 *
 * @return string
 */
function acp_set_sorting_date_type_for_a_specific_meta_key( $data_type, AC\Column\CustomField $column ) {

	if ( 'my_custom_date_key' === $column->get_meta_key() ) {
		$data_type = ACP\Sorting\Type\DataType::NUMERIC; // 'numeric'
	}

	return $data_type;
}

add_filter( 'acp/sorting/custom_field/date_type', 'acp_set_sorting_date_type_for_a_specific_meta_key', 10, 2 );