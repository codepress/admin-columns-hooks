<?php
/**
 * This hook makes it possible to add or remove certain keys from the custom field drop down in the Custom Field column
 */

/**
 * Usage example
 *
 * @param array                          $keys
 * @param AC\Settings\Column\CustomField $setting
 */
function ac_column_custom_field_keys_example( $keys, AC\Settings\Column\CustomField $setting ) {
	// optional check for specific post type or list screen
	// alter keys in array

	$column = $setting->get_column(); // AC\Column instance
	$column->get_list_screen(); // AC\ListScreen instance

	return $keys;
}

add_filter( 'ac/column/custom_field/meta_keys', 'ac_column_custom_field_keys_example', 10, 2 );

/**
 * Removes all hidden (prefixed with underscore) custom fields for the default post type
 *
 * @param array                          $keys
 * @param AC\Settings\Column\CustomField $setting
 */
function ac_column_custom_field_keys_hide_hidden( $keys, AC\Settings\Column\CustomField $setting ) {
	$column = $setting->get_column();

	if ( 'post' === $column->get_post_type() ) {
		foreach ( $keys as $index => $key ) {
			if ( 0 === strpos( $key, '_' ) ) {
				unset( $keys[ $index ] );
			}
		}
	}

	return $keys;
}

add_filter( 'ac/column/custom_field/meta_keys', 'ac_column_custom_field_keys_hide_hidden', 10, 2 );