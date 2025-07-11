<?php

/**
 * Fetch a single column object
 */
function acp_loaded()
{
    /**
     * @see https://docs.admincolumns.com/article/65-how-to-find-the-column-id
     * The "Column Name" can be found by opening the screen options in the top-right corner of the
     * admin columns settings page. Enable the "Column Name" by clicking the checkbox next to it.
     * The Column Name will now be visible for each column.
     */
    $column_name = "<COLUMN NAME GOES HERE>"; // e.g. '5f2a7bb898468'

    /**
     * @see https://docs.admincolumns.com/article/66-how-to-find-the-list-screen-id
     * The "List Screen ID" can be found by opening the screen options in the top-right corner of the
     * admin columns settings page. Enable the "List screen ID" by clicking the checkbox next to it.
     * The list screen ID will now be visible in the right sidebar.
     */
    $list_screen_id = "<LIST SCREEN ID GOES HERE>"; // e.g. '5eeca96a61826'

    /**
     * @var AC\Column|null $column
     * @see https://docs.admincolumns.com/article/53-class-ac-column
     */
    $column = ac_get_column($column_name, $list_screen_id);
}

add_action('wp_loaded', 'acp_loaded');

/**
 * Example usage of ac_get_column() function.
 */
function example_get_column()
{
    $column = ac_get_column(
        '5f2a7bb898468',    // Column ID
        '5eeca96a61826'     // List screen ID
    );

    if ($column) {
        echo $column->get_custom_label();   // Output: My Title Label
        echo $column->get_label();          // Output: Title
        echo $column->get_type();           // Output: column-title
        echo $column->get_post_type();      // Output: The name of the post type (e.g. page) if it's a post type column
        echo $column->get_value(1234);      // Output: The value that is displayed on the list table in the column cell
        echo $column->get_option('width');  // Output: Width of the column in pixels or percentage
        printf($column->get_options());     // Output: All stored options for the column (e.g. width, label, image_size)
    } else {
        echo 'Column not found';
    }
}

add_action('wp_loaded', 'example_get_column');