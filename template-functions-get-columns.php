<?php

/**
 * Fetch all columns for a particular list table.
 */
function example_loaded_ac_get_columns()
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

add_action('wp_loaded', 'example_loaded_ac_get_columns');

/**
 * Example usage of ac_get_columns() function.
 * @uses AC\Column
 * @uses AC\ListScreen
 */
function example_ac_get_columns()
{
    $columns = ac_get_columns(
        '5e84e8302794f' // List Screen ID
    );

    /**
     * @var AC\Column         $column
     * @var AC\Column\Context $context
     */
    foreach ($columns as $column) {
        $context = $column->get_context();

        echo $context->get_label();         // Output: My Title Label
        echo $context->get_type_label();    // Output: Title
        echo $context->get_type();          // Output: column-title
        echo $context->get('width');        // Output: Width of the column in pixels or percentage

        $options = $context->all();         // Output: All stored options for the column (e.g. width, label, image_size)

        print_r($options);   // Output: All stored options for the column (e.g. width, label, image_size)
    }
}

add_action('wp_loaded', 'example_ac_get_columns');
