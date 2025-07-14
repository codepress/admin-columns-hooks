<?php

/**
 * Fetch a single list screen by its ID
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
     * @var AC\ListScreen|null $list_screen
     * @see https://docs.admincolumns.com/article/54-class-ac-listscreen
     * The AC\ListScreen object contains all the configuration and settings for a particular admin list view. It
     * includes information about the columns to be displayed, their order, and any custom settings applied
     * to that specific screen.
     */
    $list_screen = ac_get_list_screen($list_screen_id);
}

add_action('wp_loaded', 'acp_loaded');

/**
 * Example usage of ac_get_list_screen() function.
 * @uses AC\Column
 * @uses AC\ListScreen
 */
function example_ac_get_list_screen()
{
    $list_screen = ac_get_list_screen(
        '5e84e8302794f' // Listscreen ID
    );

    if ($list_screen) {
        /**
         * @var AC\ListScreen $list_screen
         */
        echo $list_screen->get_label(); // e.g. 'Posts', 'Users', 'Comments'
        echo $list_screen->get_meta_type(); // e.g. 'post', 'user' or 'comment

        $columns = $list_screen->get_columns(); // array of column objects

        foreach ($columns as $column) {
            /**
             * @var AC\Column $column
             */
            echo $column->get_type(); // e.g. 'column-title', 'column-meta'
            echo $column->get_label(); // e.g. 'Title', 'Author', 'Date'
        }
    }
}

add_action('wp_loaded', 'example_ac_get_list_screen');