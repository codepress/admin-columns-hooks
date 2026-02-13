<?php

/**
 * Fetch a single list screen by its ID
 */
function example_loaded_ac_get_list_screen()
{
    /**
     * @see https://docs.admincolumns.com/article/66-how-to-find-the-list-screen-id
     * The "ID" can be found by opening the options in the top-right corner of the
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

add_action('wp_loaded', 'example_loaded_ac_get_list_screen');

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
        echo $list_screen->get_table_id(); // e.g. 'post', 'page', 'my-custom-post-type', 'wp-users', 'wp-comments'
        echo $list_screen->get_meta_type(); // e.g. 'post', 'user' or 'comment
        echo $list_screen->get_post_type(); // e.g. 'post', 'page' (if applicable)
        echo $list_screen->get_title(); // User defined label e.g. 'My list view', 'Another list view'

        $columns = $list_screen->get_columns(); // array of column objects

        foreach ($columns as $column) {
            /**
             * @var AC\Column $column
             */
            echo $column->get_type(); // e.g. 'column-title', 'column-meta'
            echo $column->get_label(); // Fixed label e.g. 'Title', 'Author', 'Date'

            /**
             * @var AC\Column\Context $context
             * @see https://docs.admincolumns.com/article/53-class-ac-column
             */
            $context = $column->get_context();

            echo $context->get_label(); // User defined label e.g. 'My Column Label'
            echo $context->all(); // All stored column settings. e.g. 'width', 'label', 'image_size' etc.
        }
    }
}

add_action('wp_loaded', 'example_ac_get_list_screen');