<?php

/**
 * This filter will enable Local Storage.
 * Local storage is a feature that is introduced since Admin Columns Pro 5.1 that allows you to store column settings on the
 * file system in PHP files. This allows you to ship and migrate column settings easily between environments and even store
 * them in a version control system (VCS) to share with your fellow developers. This feature can be enabled by the usage of
 * custom hooks.
 * @link https://www.admincolumns.com/documentation/local-storage/
 */

/**
 * Set the storage directory to a folder on your file system.
 * Only a single folder can be active at the time by using this hook.
 *
 * @param string $path Directory path to write the storage files to
 *
 * @return string
 */
function acp_storage_file_directory($path)
{
    // Use a writable path
    $path = get_stylesheet_directory() . '/acp-settings';

    return $path;
}

add_filter('acp/storage/file/directory', 'acp_storage_file_directory');