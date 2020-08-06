<?php
/**
 * This filter can only be used with Local Storage enabled. Use the 'acp/storage/file/directory' to enable Local Storage.
 * @link https://www.admincolumns.com/documentation/local-storage/
 */

/**
 * When moving to a live-environment, you probably want your local file settings to be loaded as read-only and make the
 * database the default storage engine again. The following hook allows you to easily switch between read-only storage or
 * writable storage.
 * @return bool
 */
add_filter( 'acp/storage/file/directory/writable', '__return_false' );