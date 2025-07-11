<?php

/**
 * Fetch all columns for a particular list table.
 */
function acp_loaded()
{
    /**
     * @see https://docs.admincolumns.com/article/66-how-to-find-the-list-screen-id
     * The "List Screen ID" can be found by opening the screen options in the top-right corner of the
     * admin columns settings page. Enable the "List screen ID" by clicking the checkbox next to it.
     * The list screen ID will now be visible in the right sidebar.
     */
    $list_screen_id = "<LIST SCREEN ID GOES HERE>"; // e.g. '5e84e8302794f'

    /**
     * @var AC\Column[] $columns
     */
    $columns = ac_get_columns($list_screen_id);
}

add_action('wp_loaded', 'acp_loaded');

/**
 * Example usage of ac_get_columns() function.
 */
function example_ac_get_columns()
{
    $columns = ac_get_columns(
        '5e84e8302794f' // List Screen ID
    );

    foreach ($columns as $column) {
        /**
         * @var AC\Column $column
         */
        echo $column->get_custom_label();   // Output: My Title Label
        echo $column->get_label();          // Output: Title
        echo $column->get_type();           // Output: column-title
        echo $column->get_post_type();      // Output: The name of the post type (e.g. page) if it's a post type column
        echo $column->get_value(1234);      // Output: The value that is displayed on the list table in the column cell
        echo $column->get_option('width');  // Output: Width of the column in pixels or percentage
        printf($column->get_options());     // Output: All stored options for the column (e.g. width, label, image_size)
    }
}

add_action('wp_loaded', 'example_ac_get_columns');
