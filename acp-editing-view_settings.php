<?php
/**
 * Change the behavior of the editable for a specific column.
 * Mostly use to alter the behavior of Custom Field columns
 */

/**
 * Example code that explains what can be done with this hook
 *
 * @param            $data
 * @param \AC\Column $column
 *
 * @return mixed
 */
function acp_editing_view_settings_usage_example( $data, AC\Column $column ) {
	// First Check for a specific column
	// if( $column instanceof \AC\Column\Meta ){}
	// if( $column->get_type() === 'column-ancestors'
	// if( $column->get_name() === 'generated_name'

	// Now alter Data
	$data['type'] = 'select'; // text|select|textarea|media|email|select2_dropdown
	$data['options'] = array(); // works in combination with select type
	$data['multiple'] = true; // works in combination with select type

	return $data;
}

add_filter( 'acp/editing/view_settings', 'acp_editing_view_settings_usage_example', 10, 2 );

/**
 * Change the editing settings for a specific Custom Field
 * Set the edit type to a drop down box with defined options
 *
 * @param            $data
 * @param \AC\Column $column
 *
 * @return mixed
 */
function acp_editing_view_settings_change_select_options_example( $data, AC\Column $column ) {
	if ( $column instanceof AC\Column\Meta && 'my_fruit_custom_field_key' === $column->get_meta_key() ) {
		$data['type'] = 'select';
		$data['options'] = array(
			'apple'  => 'Apple',
			'orange' => 'Orange',
			'banana' => 'Banana',
			'pear'   => 'Pear',
		);
	}

	return $data;
}

add_filter( 'acp/editing/view_settings', 'acp_editing_view_settings_change_select_options_example', 10, 2 );