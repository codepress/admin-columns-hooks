<?php
/**
 * The filter `ac/column/value` allows you to alter the value of a column cell
 * You probably want to check for a specific column instance and check for extra conditionals related to the column in order to change the value for the correct column
 */

function ac_column_value_usage( $value, $id, AC\Column $column ) {
	return $value;
}

add_filter( 'ac/column/value', 'ac_column_value_usage', 10, 3 );

/**
 * Example on how to alter the value based on an ACF Column. It defines different variables that can be used to check for specific conditionals
 *
 * @param            $value
 * @param            $id
 * @param \AC\Column $column
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
 * @param            $value
 * @param            $id
 * @param \AC\Column $column
 *
 * @return string
 */
function ac_column_value_custom_field_example( $value, $id, AC\Column $column ) {
	if ( $column instanceof ACP\Column\CustomField ) {
		$meta_key = $column->get_meta_key();
		$type = $column->get_field_type(); // Gets the Custom Field Type key ( '' = default, 'text','textarea','color','date','numeric','image','link','checkmark', 'library_id', 'title_by_id', 'user_by_id'

		if ( 'my_hex_color' === $meta_key && 'color' !== $type ) {
			$value = sprintf( '<span style="color: %1$s">%1$s</span>', $value );
		}
	}

	return $value;
}

add_filter( 'ac/column/value', 'ac_column_value_custom_field_example', 10, 3 );

/**
 * Example to target the taxonomy column and prefix it with the taxonomy name
 *
 * @param            $value
 * @param            $id
 * @param \AC\Column $column
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
