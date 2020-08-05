<?php
/**
 * The filter allows you to disable the delete confirmation when clicking 'Restore columns' or clicking 'Delete' a column set.
 */
add_filter( 'ac/delete_confirmation', '__return_false' );
