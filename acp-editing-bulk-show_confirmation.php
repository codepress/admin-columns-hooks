<?php

/**
 * Since Bulk Editing can be a sensitive operation, we show a confirmation before processing the records.
 * This can be disabled with the following hook
 */
add_filter('acp/editing/bulk/show_confirmation', '__return_false');