<?php

/**
 * The filter `acp/delete/reassign_user` will assign allow you to reassign al posts for the deleted user to a different user.
 * When 'null' is returned, all post associated to that deleted user wll be deleted.
 * Code compatible with PHP 7.2 and up
 */

/**
 * @param null|int $reassign_id     Null will result in deleting all the users posts, or give a user_id to reassign the posts to that ID
 * @param int      $deleted_user_id The User ID that is deleted
 *
 * @return null|int
 */
function acp_delete_reassign_user_usage($reassign_id, int $deleted_user_id)
{
    return $reassign_id;
}

add_filter('acp/delete/reassign_user', 'acp_delete_reassign_user_usage', 10, 2);