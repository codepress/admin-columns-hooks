<?php

/**
 * Allow another role to manage columns.
 * By default, only administrator are allowed to manage columns.
 */
add_action('admin_init', function () {
    global $wp_roles;

    // Allow users with the role 'editor' to manage columns
    $wp_roles->add_cap('editor', AC\Capabilities::MANAGE);
}); 