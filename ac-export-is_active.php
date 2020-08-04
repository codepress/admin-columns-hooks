<?php
/**
 * The hook 'acp/export/is_active' can be used to deactivate Export for specific overview pages
 * It's also possible to completely disable export for all users
 */

/*
 * Completely disable Export
 */
add_filter( 'acp/export/is_active', '__return_false' );

/**
 * Disable Export for a specific list screen
 *
 * @param bool          $is_active
 * @param AC\ListScreen $listScreen
 *
 * @return bool
 */
function acp_export_disable_export_for_specific_list_screen( $is_active, AC\ListScreen $listScreen ) {
	// Disable export for the user overview
	if ( $listScreen instanceof AC\ListScreen\User ) {
		return false;
	}

	// Disable export for a specific post type overview
	if ( $listScreen instanceof AC\ListScreen\Post && 'page' === $listScreen->get_post_type() ) {
		return false;
	}

	// Disable export for a specific List ID
	if ( '5eddfc994fe4b' === $listScreen->get_id()->get_id() ) {
		return false;
	}

	return $is_active;
}

add_filter( 'acp/export/is_active', 'acp_export_disable_export_for_specific_list_screen', 10, 2 );

/**
 * Disable Export for a specific role
 *
 * @param bool          $is_active
 * @param AC\ListScreen $listScreen
 *
 * @return bool
 */
function acp_export_disable_export_for_role( $is_active ) {
	$user = wp_get_current_user();

	if ( in_array( 'author', (array) $user->roles ) ) {
		$is_active = false;
	}

	return $is_active;
}

add_filter( 'acp/export/is_active', 'acp_export_disable_export_for_role', 10, 1 );

/**
 * The hook `hidden_columns` is a default WordPress hooks to set the hidden columns.
 * We use this hook also to determine if specific columns must be exported.
 * This hook can be used to export even hidden columns to CSV
 * Ignore hidden columns and export every available column
 *
 * @param $columns
 *
 * @return array
 */
function acp_export_hidden_columns( $columns ) {
	if ( filter_input( INPUT_GET, 'acp_export_action' ) ) {
		$columns = array();
	}

	return $columns;
}

add_filter( 'hidden_columns', 'acp_export_hidden_columns', 10, 1 );