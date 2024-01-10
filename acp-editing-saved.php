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
function acp_editing_saved_usage(AC\Column $column, $id, $value)
{
    // Place your code here
}

add_action('acp/editing/saved', 'acp_editing_saved_usage', 10, 3);

/**
 * In this example we will save the submitted value to second custom field.
 *
 * @param AC\Column $column
 * @param int       $id
 * @param string    $value
 */
function acp_editing_save_value_to_another_custom_field(AC\Column $column, $id, $value)
{
    if ($column instanceof AC\Column\CustomField && 'my_custom_field' === $column->get_meta_key(
        ) && 'post' === $column->get_meta_type()) {
        // Modify the value if necessairy
        // $value = $value * 2;

        update_post_meta($id, 'my_second_custom_field', $value);
    }
}

add_action('acp/editing/saved', 'acp_editing_save_value_to_another_custom_field', 10, 3);

/**
 * By default, the post modified date is not always updated when using inline or bulk edit with Admin Column Pro.
 * For example, when updating meta data the `wp_update_post` is not called, which is the call that set then post's modified date.
 * In this example we will trigger this call manually.
 *
 * @param AC\Column $column
 * @param int       $id
 */
function acp_editing_update_post_modified_date(AC\Column $column, $id)
{
    $meta_type = $column->get_list_screen()->get_meta_type();

    // Update the `modified_date` after making any changes using inline or bulk editing
    if (AC\MetaType::POST === $meta_type) {
        wp_update_post(['ID' => $id]);
    }

    // Update the `modified_date` after making changes to a specific custom field
    if (AC\MetaType::POST === $meta_type && $column instanceof AC\Column\Meta && 'my_custom_field' === $column->get_meta_key(
        )) {
        wp_update_post(['ID' => $id]);
    }
}

add_action('acp/editing/saved', 'acp_editing_update_post_modified_date', 10, 2);

/**
 * Update a WooCommerce product price based on a custom field
 *
 * @param AC\Column $column
 * @param int       $id
 * @param string    $value
 */
function acp_editing_saved_update_wc_price_on_base_price(AC\Column $column, $id, $value)
{
    if ($column instanceof AC\Column\CustomField && 'product' === $column->get_post_type(
        ) && 'base_price' === $column->get_meta_key()) {
        $price = (float)$value;

        // Modify price if neccessairy
        $price = $price * 1.2;

        $product = wc_get_product($id);
        $product->set_regular_price($price);
        $product->save();
    }
}

add_action('acp/editing/saved', 'acp_editing_saved_update_wc_price_on_base_price', 10, 3);

/**
 * Update a taxonomy term after using inline or bulk editing
 *
 * @param AC\Column $column
 * @param int       $id
 * @param string    $value
 */
function acp_editing_saved_update_taxonomy_term(AC\Column $column, $id, $value)
{
    if ('term' === $column->get_meta_type()) {
        // Modify term arguments
        $args = [
            'description' => 'My new value: ' . $value,
        ];

        wp_update_term($id, $column->get_taxonomy(), $args);
    }
}

add_action('acp/editing/saved', 'acp_editing_saved_update_taxonomy_term', 10, 3);