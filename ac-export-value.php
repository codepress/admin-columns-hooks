<?php
/**
 * This hook allows you to alter the value of the exported column / post.
 */

/**
 * Change the date format for a value based on a Custom Field column with field type set to 'date'
 *
 * @param string    $value
 * @param AC\Column $column
 *
 * @return false|string
 */
function acp_export_change_export_date_format( $value, AC\Column $column ) {

	if ( $column instanceof AC\Column\CustomField && 'date' === $column->get_field_type() ) {
		if ( $timestamp = ac_helper()->date->strtotime( $value ) ) {
			$value = date( 'Y-m-d', $timestamp );
		}
	}

	return $value;
}

add_filter( 'ac/export/value', 'acp_export_change_export_date_format', 10, 2 );

/**
 * Alter the value from Post ID to image URL for the ACF column
 *
 * @param string    $value
 * @param AC\Column $column
 * @param int       $id
 *
 * @return false|string
 */
function acp_export_change_acf_image_export_value( $value, AC\Column $column, $id ) {

	if ( $column instanceof ACA\ACF\Column && 'image' === $column->get_acf_field_option( 'type' ) && $column->get_raw_value( $id ) ) {
		$image_id = $column->get_raw_value( $id );
		$image_src = wp_get_attachment_image_src( $image_id );

		$value = $image_src[0];
	}

	return $value;
}

add_filter( 'ac/export/value', 'acp_export_change_acf_image_export_value', 10, 3 );