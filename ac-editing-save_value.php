<?php

function my_acp_editable_ajax_column_save_value(
    $value,
    $id,
    AC\Setting\Context $context,
    AC\TableScreen $table_screen,
    AC\Type\ListScreenId $list_screen_id
) {
    // Possibly modify $value

    return $value;
}

add_filter('ac/editing/save_value', 'my_acp_editable_ajax_column_save_value', 10, 5);

/**
 * Change the value to a timestamp for a specific custom field
 */
add_filter('ac/editing/save_value', static function (
    $value,
    $id,
    AC\Setting\Context $context,
    AC\TableScreen $table_screen,
    AC\Type\ListScreenId $list_screen_id
) {
    if (
        $value &&
        $context instanceof AC\Setting\Context\CustomField &&
        'date' === $context->get_field_type()
    ) {
        // Convert submitted value to a unix timestamp
        $value = strtotime($value);
    }

    return $value;
}, 10, 5);