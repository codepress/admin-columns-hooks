<?php

/**
 * Fetch all list screens for a particular list table.
 */
function acp_loaded()
{
    /**
     * The "List Screen Key" can be found by opening the screen options in the top-right corner of the
     * admin columns settings page. Enable the "List screen Key" by clicking the checkbox next to it.
     * The list screen Key will now be visible in the right sidebar.
     */
    $list_screen_key = "<LIST SCREEN KEY GOES HERE>"; // e.g. page

    $list_screens = ac_get_list_screens($list_screen_key);
}

add_action('wp_loaded', 'acp_loaded');
