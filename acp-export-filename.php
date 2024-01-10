<?php

/**
 * This hooks allows you to change the used filename for the export feature
 */

/**
 * Usage of the export filename hook
 *
 * @param string        $file_name
 * @param AC\ListScreen $list_screen
 *
 * @return string
 */
function acp_export_filename_usage($file_name, AC\ListScreen $list_screen)
{
    // Replace $file_name or use $list_screen to be used in the hook

    return $file_name;
}

add_filter('acp/export/file_name', 'acp_export_filename_usage', 10, 2);

/**
 * Example of a custom filename structure for every list screen
 *
 * @param string        $file_name
 * @param AC\ListScreen $list_screen
 *
 * @return string
 */
function acp_export_filename_custom_structure($file_name, AC\ListScreen $list_screen)
{
    // Target a specific post type
    $post_type = 'my_custom_post_type';

    if ($list_screen instanceof AC\ListScreenPost && $post_type === $list_screen->get_post_type()) {
        // Replace the filename with a custom label
        // e.g. 'My Custom Label.csv'
        $file_name = 'My Custom Label';
    }

    return $file_name;
}

add_filter('acp/export/file_name', 'acp_export_filename_custom_structure', 10, 2);

/**
 * Example of a custom filename structure for every list screen
 *
 * @param string        $file_name
 * @param AC\ListScreen $list_screen
 *
 * @return string
 */
function acp_export_filename_user_structure($file_name, AC\ListScreen $list_screen)
{
    // Replace the filename with your username
    // e.g. 'Oliver-Hardy-Cars.csv'
    $file_name = sprintf(
        '%s-%s-%s',
        wp_get_current_user()->first_name,
        wp_get_current_user()->last_name,
        $list_screen->get_label()
    );

    return $file_name;
}

add_filter('acp/export/file_name', 'acp_export_filename_user_structure', 10, 2);

/**
 * Example of a custom filename structure for every list screen
 *
 * @param string        $file_name
 * @param AC\ListScreen $list_screen
 *
 * @return string
 */
function acp_export_filename_date_structure($file_name, AC\ListScreen $list_screen)
{
    // Replace the filename with a custom label and custom date including a timestamp
    // e.g. 'Pages on 2022 March 10th 17:16.csv'
    $file_name = sprintf(
        '%s on %s',
        $list_screen->get_label(),
        date_i18n("Y F jS H:i")
    );

    return $file_name;
}

add_filter('acp/export/file_name', 'acp_export_filename_date_structure', 10, 2);
