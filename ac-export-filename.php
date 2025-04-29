<?php

/**
 * This hooks allows you to change the used filename for the export feature
 */

/**
 * Usage of the export filename hook
 */
function ac_export_filename_usage(string $file_name, AC\ListScreen $list_screen): string
{
    // Replace $file_name or use $list_screen to be used in the hook

    return $file_name;
}

add_filter('ac/export/file_name', 'ac_export_filename_usage', 10, 2);

/**
 * Example of a custom filename structure for every list screen
 */
function ac_export_filename_custom_structure(string $file_name, AC\ListScreen $list_screen): string
{
    // Target a specific post type
    $table_screen = $list_screen->get_table_screen();
    $post_type = 'my_custom_post_type';

    if ($table_screen instanceof AC\PostType && $table_screen->get_post_type()->equals($post_type)) {
        // Replace the filename with a custom label
        // e.g. 'My Custom Label.csv'
        $file_name = 'My Custom Label';
    }

    return $file_name;
}

add_filter('ac/export/file_name', 'ac_export_filename_custom_structure', 10, 2);

/**
 * Example of a custom filename structure for every list screen
 */
function ac_export_filename_user_structure(string $file_name, AC\ListScreen $list_screen): string
{
    // Replace the filename with your username
    // e.g. 'Oliver-Hardy-Cars.csv'
    return sprintf(
        '%s-%s-%s',
        wp_get_current_user()->first_name,
        wp_get_current_user()->last_name,
        $list_screen->get_label()
    );
}

add_filter('ac/export/file_name', 'ac_export_filename_user_structure', 10, 2);

/**
 * Example of a custom filename structure for every list screen
 */
function ac_export_filename_date_structure(string $file_name, AC\ListScreen $list_screen): string
{
    // Replace the filename with a custom label and custom date including a timestamp
    // e.g. 'Pages on 2022 March 10th 17:16.csv'
    return sprintf(
        '%s on %s',
        $list_screen->get_label(),
        date_i18n("Y F jS H:i")
    );
}

add_filter('ac/export/file_name', 'ac_export_filename_date_structure', 10, 2);
