<?php

/**
 * This hook allows you to alter the exported value when generating a CSV file
 */

add_filter(
    'acp/v2/export/value',
    function (
        string $value,
        AC\Setting\Context $column,
        $id,
        AC\TableScreen $table_screen,
        AC\Type\ListScreenId $list_id
    ): string {
        return $value;
    },
    10,
    5
);

/**
 * Change the exported date format to 'Y-m-d' for a custom field.
 */
add_filter(
    'acp/v2/export/value',
    function (string $value, AC\Setting\Context $context): string {
        if ($context->get_type() === 'column-meta' && $context->get('field_type') === 'date') {
            $timestamp = ac_helper()->date->strtotime($value);

            if ($timestamp) {
                $value = date('Y-m-d', $timestamp);
            }
        }

        return $value;
    },
    10,
    3
);

/**
 * Alter the column value from a `Attachment ID` to an `Image URL` for an ACF field of the type `Image`.
 */
add_filter(
    'acp/v2/export/value',
    function (string $value, AC\Setting\Context $context): string {
        if ($context instanceof ACA\ACF\Setting\Context\Field && 'image' === $context->get_field_type()) {
            // In this example `$value` is an attachment ID
            $attachment_id = (int)$value;
            $image_src = wp_get_attachment_image_src($attachment_id);
            $value = $image_src[0];
        }

        return $value;
    },
    10,
    2
);

/**
 * Example on how to strip HTML from the exported value for the Custom Field column
 */
add_filter(
    'acp/v2/export/value',
    function (string $value, AC\Setting\Context $context): string {
        if ($context->get_type() === 'column-meta') {
            $value = strip_tags($value);
        }

        return $value;
    },
    10,
    2
);