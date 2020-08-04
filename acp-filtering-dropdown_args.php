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

	// $args['order'] = boolean - set if the filter options must be sorted alphabetically
	// $args['options' ] = [] - key-value pair of the available options
	// $args['empty_option'] = boolean - Show 'empty' and 'not empty' options for the drop down
	// $args['limit'] = int - Max number of items that can be displayed in the drop down

	return $args;
}

add_filter( 'acp/filtering/dropdown_args', 'acp_filtering_dropdown_args_usage', 10, 2 );

$defaults = [
	'order'        => true,
	'options'      => [],
	'empty_option' => false,
	'label'        => $label, // backcompat
	'limit'        => 5000,
];

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