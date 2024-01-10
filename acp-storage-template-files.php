<?php

/**
 * The filter allows you to new presets/templates to the stack.
 */

add_filter('acp/storage/template/files', function (array $files): array {
    return $files;
}, 5);


