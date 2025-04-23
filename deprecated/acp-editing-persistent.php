<?php
/**
 * @depecated since 7.0
 *            Use `ac/editing/persistent` instead.
 */

/**
 * Permanently enables inline edit on all list tables
 * This means you don't need to toggle it on the overview
 */
add_filter('acp/editing/persistent', '__return_true');