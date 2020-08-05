<?php
/**
 * This hooks allows you to alter the label just before they are rendered on the screen
 */

/**
 * @param string    $label
 * @param AC\Column $column
 *
 * @return string
 */
function ac_heading_label( $label, AC\Column $column ) {
	// Insert code

	return $label;
}

add_filter( 'ac/headings/label', 'ac_heading_label', 10, 2 );

/**
 * Example on running each label through the string translation methods
 * translation must already be available in the language file, since no new strings are registered
 *
 * @param string    $label
 * @param AC\Column $column
 *
 * @return string
 */
function ac_heading_label_translate( $label, AC\Column $column ) {
	return __( $label, 'custom-text-domain' );
}

add_filter( 'ac/headings/label', 'ac_heading_label_translate', 10, 2 );