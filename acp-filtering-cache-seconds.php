<?php
/**
 * This filter allows you to alter the duration of the cached result of the filtering drop downs
 */

/**
 * Increase the cache duration of the filtering drop downs. On large datasets, populating the drop downs may take some time.
 * Please notice that when you increase the seconds, it may not display all the available options in the drop down when you made changes to the items on your overview page
 *
 * @param int $seconds
 *
 * @return int
 */
function acp_filter_increase_cache_seconds( $seconds ) {
	return 300;
}

add_filter( 'acp/filtering/cache/seconds', array( $this, 'increase_cache_duration' ), 10, 1 );