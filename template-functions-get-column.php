<?php

/**
 * Fetch a single column object
 */
function example_loaded_get_column()
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
     * The AC\Column object encapsulates all the information and functionality related to a single column in an
     * admin list view. It defines how the column should be displayed, what data it should contain, and
     * how it should behave.
     */
    $column = ac_get_column($column_name, $list_screen_id);
}

add_action('wp_loaded', 'example_loaded_get_column');

/**
 * Example usage of ac_get_column() function.
 * @uses AC\Column
 * @uses AC\ListScreen
 * @uses AC\Column\Context
 */
function example_get_column()
{
    $column = ac_get_column(
        '5f2a7bb898468',    // Column ID
        '5eeca96a61826'     // List screen ID
    );

    if ($column) {
        /**
         * @var AC\Column\Context $context
         */
        $context = $column->get_context();

        echo $context->get_label();         // Output: My Title Label
        echo $context->get_type_label();    // Output: Title
        echo $context->get_type();          // Output: column-title
        echo $context->get('width');        // Output: Width of the column in pixels or percentage

        $options = $context->all();         // Output: All stored options for the column (e.g. width, label, image_size)
        print_r($options);
    }
}

add_action('wp_loaded', 'example_get_column');