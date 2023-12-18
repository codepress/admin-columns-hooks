<?php

/**
 * The filter allows you to new presets/templates to the stack.
 */

add_filter('acp/storage/template/files', function ($files) {
    return $files;
}, 5);


