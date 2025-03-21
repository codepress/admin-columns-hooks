<?php
/**
 * This filter allows you to alter the duration of the cached result of the filtering drop-downs
 */

/**
 * Increase the cache duration of the filtering drop-downs. On large datasets, populating the drop-downs may take some time.
 * Please notice that when you increase the seconds, it may not display all the available options in the drop-down when you made changes to the items on your overview page
 */
function acp_filter_increase_cache_seconds(int $seconds): int
{
    return 600; // default is 300 seconds (5 minutes).
}

add_filter('acp/filtering/cache/seconds', 'acp_filter_increase_cache_seconds');