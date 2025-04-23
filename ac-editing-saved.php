<?php
/**
 * The ac/editing/saved action fires after the value of a column is stored when using Inline Edit.
 */

/**
 * Fires after a inline-edit saved a value
 */
function acp_editing_saved_usage(AC\Setting\Context $context, $id, $value, AC\TableScreen $table_screen)
{
    // Place your code here
}

add_action('acp/editing/saved', 'acp_editing_saved_usage', 10, 4);