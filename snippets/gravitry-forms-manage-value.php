<?php

/**
 * @param string $value    Display value
 * @param int    $form_id  Form ID (e.g. '1')
 * @param string $field_id Field ID (e.g. '4')
 * @param array  $entry    Entry Object
 *
 * @return string
 */
function ac_column_value_gravity_forms_entry($value, $form_id, $field_id, $entry)
{
    /////// Check for field ID here ///////
    if ('2' !== $field_id) {
        return $value;
    }

    /**
     * Field Object
     * @var GF_Field|false $field
     */
    $field = GFAPI::get_field($form_id, $field_id);

    // Submitted entry value
    $entry_value = $field->get_value_entry_detail($entry);

    /////// Modify display value here ///////
    $value = (string)$entry_value;

    return $value;
}

add_filter('gform_entries_field_value', 'ac_column_value_gravity_forms_entry', 11, 4);