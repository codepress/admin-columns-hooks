<?php
/**
 * This filter allows you to alter the filtering drop down arguments
 */

/**
 * Usage of the hook
 *
 * @param array     $args
 * @param AC\Column $column
 *
 * @return array
 */
function acp_filtering_dropdown_args_usage( $args, AC\Column $column ) {

	// Example usage:

	// Set to `true` when the options must be sorted alphabetically
	// $args['order'] = true;

	// Use to modify the available filter options
	// $args['options'][ $key ] = $label;

	// Hide the `empty` and `non empty` options
	// $args['empty_option'] = false;

	// Limit the number of items in the dropdown
	// $args['limit'] = 1000;

	return $args;
}

add_filter( 'acp/filtering/dropdown_args', 'acp_filtering_dropdown_args_usage', 10, 2 );

/**
 * Remove the empty options for the Custom Field column
 *
 * @param array     $args
 * @param AC\Column $column
 *
 * @return array
 */
function acp_filtering_remove_empty_option_for_custom_field_column( $args, AC\Column $column ) {
	$column_type = 'column-meta'; // Custom Field Column type

	if ( $column_type === $column->get_type() ) {

		if ( isset( $args['empty_option'] ) ) {
			unset( $args['empty_option'] );
		}
	}

	return $args;
}

add_filter( 'acp/filtering/dropdown_args', 'acp_filtering_remove_empty_option_for_custom_field_column', 10, 2 );

/**
 * @param array     $args
 * @param AC\Column $column
 *
 * @return array
 */
function acp_filter_format_options_as_currency( $args ) {
	foreach ( $args['options'] as $value => $label ) {
		$args['options'][ $value ] = sprintf( '$ %s,00', $label );
	}

	return $args;
}

add_filter( 'acp/filtering/dropdown_args', 'acp_filter_format_options_as_currency', 10, 1 );

/**
 * @param array     $args
 * @param AC\Column $column
 *
 * @return array
 */
function acp_filter_format_unserialize_options( $args, AC\Column $column ) {
	if( $column instanceof AC\Column\CustomField && 'key_to_alter_options' === $column->get_meta_key() ){
		foreach ( $args['options'] as $value => $label ) {
			$args['options'][ $value ] = implode( ', ', unserialize( $label ) );
		}
	}

	return $args;
}

add_filter( 'acp/filtering/dropdown_args', 'acp_filter_format_unserialize_options', 10, 2 );