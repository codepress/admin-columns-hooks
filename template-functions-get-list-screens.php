<?php

/**
 * Fetch all list screens for a particular list table.
 */
function acp_loaded()
{
    /**
     * @see https://docs.admincolumns.com/article/66-how-to-find-the-list-screen-id
     * The "List Screen Key" can be found by opening the screen options in the top-right corner of the
     * admin columns settings page. Enable the "List screen Key" by clicking the checkbox next to it.
     * The list screen Key will now be visible in the right sidebar.
     */
    $list_screen_key = "<LIST SCREEN KEY GOES HERE>"; // e.g. page

    $list_screens = ac_get_list_screens($list_screen_key);
}

add_action('wp_loaded', 'acp_loaded');

/**
 * Example usage of ac_get_list_screens() function.
 */
function example_ac_get_list_screens()
{
    $list_screens = ac_get_list_screens('page');

    foreach ($list_screens as $list_screen) {
        /**
         * @var $list_screen AC\ListScreen
         */
        echo $list_screen->get_label(); // e.g. 'Posts', 'Users', 'Comments'
        echo $list_screen->get_meta_type(); // e.g. 'post', 'user' or 'comment

        $columns = $list_screen->get_columns(); // array of column objects

        foreach ($columns as $column) {
            echo $column->get_type(); // e.g. 'column-title', 'column-meta'
            echo $column->get_label(); // e.g. 'Title', 'Author', 'Date'
        }
    }
}

add_action('wp_loaded', 'example_ac_get_list_screens');