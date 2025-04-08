<?php

/**
 * This hook allows you to alter the exported value when generating a CSV file
 */

// This example disabled sanitation for all columns
add_filter('ac/export/value/escape', '__return_false');

// This example disabled sanitation for all Custom Field Columns
add_filter('ac/export/value/escape', static function ($enabled, AC\Setting\Context $context) {
    if ($context instanceof AC\Setting\Context\CustomField) {
        return false;
    }

    return $enabled;
}, 10, 2);

// This example disabled sanitation for all columns for specific tables
add_filter(
    'ac/export/value/escape',
    static function ($enabled, AC\Setting\Context $context, AC\TableScreen $table_screen) {
        // Check for Post table
        if ((string)$table_screen->get_key() === 'post') {
            return false;
        }

        // Check for Page table
        if ($table_screen instanceof AC\PostType && $table_screen->get_post_type()->equals('page')) {
            return false;
        }

        // Check for Users table
        if ($table_screen->get_key()->equals(new AC\Type\ListKey('wp-users'))) {
            return false;
        }

        return $enabled;
    },
    10,
    2
);