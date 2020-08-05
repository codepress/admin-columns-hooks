<?php

/**
 * This hooks allows you to disable admin columns support for certain post types. The post type will mno longer show up
 * in the admin columns menu, The actual post type will keep working and will NOT be disabled.
 */

/**
 * @param array $post_types
 *
 * @return array
 */
function acp_post_types( array $post_types ) {

	// Disable a post type by unsetting them
	// unset( $post_types['page'] );

	return $post_types;
}

add_filter( 'ac/post_types', 'acp_post_types' );

/**
 * Disable admin columns support for the 'Page' custom post type
 *
 * @param array $post_types
 *
 * @return array
 */
function acp_disable_support_for_pages( array $post_types ) {

	unset( $post_types['page'] );

	return $post_types;
}

add_filter( 'ac/post_types', 'acp_disable_support_for_pages' );