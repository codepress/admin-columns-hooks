<?php

/**
 * This hooks allows you to disable the export functionality for specific list tables.
 */

/**
 * Disable the export functionality on the Uses list table. The `Export` button wil also be removed.
 *
 * @param bool          $is_active
 * @param AC\ListScreen $listScreen
 *
 * @return bool
 */
function acp_disable_export_for_users_list_table( $is_active, AC\ListScreen $listScreen ) {
	if ( $listScreen instanceof AC\ListScreen\User ) {
		$is_active = false;
	}

	return $is_active;
}

add_filter( 'acp/export/is_active', 'acp_disable_export_for_users_list_table', 10, 2 );

/**
 * Disable the export functionality for a specific `Post Type`, in this the `Page` list table.
 *
 * @param bool          $is_active
 * @param AC\ListScreen $listScreen
 *
 * @return bool
 */
function acp_disable_export_for_page_list_table( $is_active, AC\ListScreen $listScreen ) {
	if ( $listScreen instanceof AC\ListScreenPost && 'page' === $listScreen->get_post_type() ) {
		$is_active = false;
	}

	return $is_active;
}

add_filter( 'acp/export/is_active', 'acp_disable_export_for_page_list_table', 10, 2 );

/**
 * Disable the export functionality completely for all list tables
 */
add_filter( 'acp/export/is_active', '__return_false' );