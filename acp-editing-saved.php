<?php
/**
 * The acp/editing/saved action fires after the value of a column is stored when using Inline Edit.
 */

/**
 * Fires after a inline-edit saved a value
 *
 * @param AC\Column $column
 * @param int       $id
 * @param string    $value
 */
function acp_editing_saved_usage( AC\Column $column, $id, $value ) {
	// Place your code here
}

add_action( 'acp/editing/saved', 'acp_editing_saved_usage', 10, 3 );

/**
 * By default, the post modified date is not updated when using inline edit with Admin Column Pro.
 * This example shows how you can change the modified date of a post when using inline edit.
 *
 * @param AC\Column $column
 * @param int       $id
 */
function acp_editing_saved_update_post( AC\Column $column, $id ) {
	if ( 'post' === $column->get_list_screen()->get_meta_type() ) {
		wp_update_post( [ 'ID' => $id ] );
	}
}

add_action( 'acp/editing/saved', 'acp_editing_saved_update_post', 10, 2 );

/**
 * Trigger a post update when a specific custom field is saved
 *
 * @param AC\Column $column
 * @param int       $id
 */
function acp_editing_saved_trigger_update_for_custom_field( AC\Column $column, $id ) {
	if ( $column instanceof AC\Column\CustomField && 'my_key' === $column->get_meta_key() ) {
		wp_update_post( [ 'ID' => $id ] );
	}
}

add_action( 'acp/editing/saved', 'acp_editing_saved_trigger_update_for_custom_field', 10, 2 );

/**
 * Update a WooCommerce product price based on a custom field
 *
 * @param AC\Column $column
 * @param int       $id
 */
function acp_editing_saved_update_wc_price_on_base_price( AC\Column $column, $id ) {
	if ( $column instanceof AC\Column\CustomField && 'base_price' === $column->get_meta_key() ) {
		$product = wc_get_product( $id );

		if ( $product ) {

			$factor = 1.21;
			$new_price = (float) get_post_meta( $id, 'base_price', true ) * $factor;

			$product->set_regular_price( $new_price );
			$product->save();
		}
	}
}

add_action( 'acp/editing/saved', 'acp_editing_saved_update_wc_price_on_base_price', 10, 2 );