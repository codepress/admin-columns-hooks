<?php
/**
 * The acp/quick_add/saved action fires after a new item is created using Quick Add.
 */

/**
 * @param int          $id
 * @param AC\ListScreen $list_screen
 *
 * @return void
 */
function acp_quick_add_saved( $id, AC\ListScreen $list_screen ) {
	// Place your code here
}
add_action( 'acp/quick_add/saved', 'acp_quick_add_saved' );


/**
 * Add the filtered term to the newly created post (with the use of quick add)
 */
add_action( 'acp/quick_add/saved', function ( $post_id, AC\ListScreen $list_screen ) {
	$event_post_type = 'my_post_type';
	$event_taxonomy = 'my_taxaonomy';

	if ( $event_post_type !== $list_screen->get_key() ) {
		return;
	}

	// Filter request variables
	$request = new AC\Request();
	$rules = $request->get_query()->get( 'ac-rules' );

	if ( ! $rules ) {
		return;
	}

	// Contains the applied smart filters and associated column
	$rules = json_decode( $rules )->rules;

	foreach ( $rules as $rule ) {
		// Get the associated column
		$column = $list_screen->get_column_by_name( $rule->id );

		// Check if the rule (with the use of the associated column) is a taxonomy
		if ( $column && $event_taxonomy === $column->get_taxonomy() ) {

			// Write filtered term to post
			wp_set_post_terms( $post_id, (int) $rule->value, $event_taxonomy, true );
		}
	}
}, 10, 2 );