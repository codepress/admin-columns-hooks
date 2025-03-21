<?php

/**
 * Fetch a single column object
 */
function acp_loaded()
{
    /**
     * The "Column Name" can be found by opening the screen options in the top-right corner of the
     * admin columns settings page. Enable the "Column Name" by clicking the checkbox next to it.
     * The Column Name will now be visible for each column.
     */
    $column_name = "<COLUMN NAME GOES HERE>"; // e.g. '5f2a7bb898468'

    /**
     * The "List Screen ID" can be found by opening the screen options in the top-right corner of the
     * admin columns settings page. Enable the "List screen ID" by clicking the checkbox next to it.
     * The list screen ID will now be visible in the right sidebar.
     */
    $list_screen_id = "<LIST SCREEN ID GOES HERE>"; // e.g. '5eeca96a61826'

    /**
     * @var AC\Column|null $column
     */
    $column = ac_get_column($column_name, $list_screen_id);
}

add_action('wp_loaded', 'acp_loaded');
