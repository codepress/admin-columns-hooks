<?php

/**
 * This filter modifies the user name that is shown when opening the select2 dropdown menu when selecting a user.
 * For example, this select2 menu is used by inline editing and smart filtering when selecting a user from the dropdown menu for the Author column.
 * The default displayed value is: <First Name> <Last Name> (<Email>) e.g. 'Tobias Schutter (info@admincolumns.com)
 */

/**
 * @param string  $label Default is <First Name> <Last Name> (<Email>) e.g. 'Tobias Schutter (info@admincolumns.com)
 * @param WP_User $user
 *
 * @return string
 */
function acp_select_formatter_user_name( $label, WP_User $user ) {

	// Modify label
	// $label = $user->user_login;

	return $label;
}

add_filter( 'acp/select/formatter/user_name', 'acp_select_formatter_user_name', 10, 2 );

/**
 * Display the user's fullname when using the select2 dropdown menu
 *
 * @param string  $label
 * @param WP_User $user
 *
 * @return string
 */
function acp_select_reformat_username_to_fullname( $label, WP_User $user ) {
	if ( $user->first_name || $user->last_name ) {
		$label = trim( $user->first_name . ' ' . $user->last_name );
	}

	return $label;
}

add_filter( 'acp/select/formatter/user_name', 'acp_select_reformat_username_to_fullname', 10, 2 );