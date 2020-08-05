<?php
/**
 * The filter `ac/column/value` allows you to alter the value of a column cell
 * You probably want to check for a specific column instance and check for extra conditionals related to the column in order to change the value for the correct column
 */

/**
 * @param string    $value
 * @param int       $id
 * @param AC\Column $column
 *
 * @return string
 */
function ac_column_value_usage( $value, $id, AC\Column $column ) {

	// Change the rendered column value
	// $value = 'new value';

	return $value;
}

add_filter( 'ac/column/value', 'ac_column_value_usage', 10, 3 );

/**
 * Example on how to alter the value based on an ACF Column. It defines different variables that can be used to check for specific conditionals
 *
 * @param string    $value
 * @param int       $id
 * @param AC\Column $column
 *
 * @return string
 */
function ac_column_value_acf_example( $value, $id, AC\Column $column ) {
	if ( $column instanceof ACA\ACF\Column ) {
		$acf_field = $column->get_acf_field(); // Print_r this var for all information
		$meta_key = $column->get_meta_key();
		$acf_field_key = $column->get_acf_field_option( 'key' );
		$acf_type = $column->get_acf_field_option( 'type' ); // Get the ACF field type

		if ( $acf_type === 'text' ) {
			$value .= ' (text)';
		}
	}

	return $value;
}

add_filter( 'ac/column/value', 'ac_column_value_acf_example', 10, 3 );

/**
 * Example on how to wrap the value of a specific Custom Field column of the type 'color' in markup to give it a background color
 *
 * @param string    $value
 * @param int       $id
 * @param AC\Column $column
 *
 * @return string
 */
function ac_column_value_custom_field_example( $value, $id, AC\Column $column ) {
	if ( $column instanceof ACP\Column\CustomField ) {

		// Custom Field Key
		$meta_key = $column->get_meta_key();

		// Custom Field Type can be 'text|textarea|color|date|numeric|image|link|checkmark|library_id|title_by_id|user_by_id'. The default is ''.
		$custom_field_type = $column->get_field_type();

		if ( 'my_hex_color' === $meta_key && 'color' !== $custom_field_type ) {
			$value = sprintf( '<span style="background-color: %1$s">%1$s</span>', $value );
		}
	}

	return $value;
}

add_filter( 'ac/column/value', 'ac_column_value_custom_field_example', 10, 3 );

/**
 * Example on how to add a `class` attribute to the rendered value that can be styled by CSS.
 *
 * @param string    $value
 * @param int       $id
 * @param AC\Column $column
 *
 * @return string
 */
function ac_column_value_add_class_attribute_based_on_value( $value, $id, AC\Column $column ) {
	if ( $column instanceof ACP\Column\CustomField ) {

		// Add a unqiue `class` attribute to the rendered value.

		if ( 'my_custom_field_key' === $column->get_meta_key() ) {
			$value = sprintf(
				'<span class="%s %s">%s</span>',
				esc_attr( 'column-' . $column->get_name() ), // Add the column name to the `class` attribute
				esc_attr( 'value-' . sanitize_key( $value ) ),  // Add a sanitized column value to the `class` attribute
				$value
			);
		}
	}

	return $value;
}

add_filter( 'ac/column/value', 'ac_column_value_add_class_attribute_based_on_value', 10, 3 );

/**
 * Example to target the taxonomy column and prefix it with the taxonomy name
 *
 * @param string    $value
 * @param int       $id
 * @param AC\Column $column
 *
 * @return string
 */
function ac_column_value_taxonomy_example( $value, $id, AC\Column $column ) {
	if ( $column instanceof ACP\Column\Post\Taxonomy ) {
		$value = $column->get_taxonomy() . ' > ' . $value;
	}

	return $value;
}

add_filter( 'ac/column/value', 'ac_column_value_taxonomy_example', 10, 3 );
