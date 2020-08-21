<?php
/**
 * This hook allows you to alter the exported value when generating a CSV file
 */

/**
 * Change the exported date format to 'Y-m-d' for a custom field.
 *
 * @param string    $value
 * @param AC\Column $column
 *
 * @return string
 */
function acp_export_change_export_date_format( $value, AC\Column $column ) {

	if ( $column instanceof AC\Column\CustomField && 'date' === $column->get_field_type() ) {

		$timestamp = ac_helper()->date->strtotime( $value );

		if ( $timestamp ) {
			$value = date( 'Y-m-d', $timestamp );
		}
	}

	return $value;
}

add_filter( 'ac/export/value', 'acp_export_change_export_date_format', 10, 2 );

/**
 * Alter the column value from a `Attachment ID` to an `Image URL` for an ACF field of the type `Image`.
 *
 * @param string    $value
 * @param AC\Column $column
 * @param int       $id
 *
 * @return string
 */
function acp_export_change_acf_image_export_value( $value, AC\Column $column, $id ) {

	if ( $column instanceof ACA\ACF\Column && 'image' === $column->get_acf_field_option( 'type' ) ) {

		// In this example `$value` is an attachment ID
		$attchment_id = (int) $value;

		$image_src = wp_get_attachment_image_src( $attchment_id );

		// Replace `$value` with the Image URL
		$value = $image_src[0];
	}

	return $value;
}

add_filter( 'ac/export/value', 'acp_export_change_acf_image_export_value', 10, 3 );