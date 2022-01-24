<?php

/**
 * This hooks allows you to change the used filename for the export feature
 */

/**
 * Usage of the export filename hook
 *
 * @param string        $fileName
 * @param AC\ListScreen $listScreen
 *
 * @return string
 */
function acp_export_filename_usage( $fileName, AC\ListScreen $listScreen ) {

	// Replace fileName or use ListScreen to be used in the hook

	return $fileName;
}

add_filter( 'acp/export/file_name', 'acp_export_filename_usage', 10, 2 );



/**
 * Example of a custom filename structure for every list screen
 *
 * @param string        $fileName
 * @param AC\ListScreen $listScreen
 *
 * @return string
 */
function acp_export_filename_custom_structure( $fileName, AC\ListScreen $listScreen ) {
	$fileName = $listScreen->get_id()->get_id() . $listScreen->get_key() . date('Y-m-d' );

	return $fileName;
}

add_filter( 'acp/export/file_name', 'acp_export_filename_custom_structure', 10, 2 );
