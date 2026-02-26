<?php

add_filter('ac/column/date_save_format/options', static function (array $options): array {
    // add a custom date format option here
    return $options;
});

/**
 * Adds a custom date format to the available options for the date column's save format.
 */
add_filter('ac/column/date_save_format/options', static function (array $options): array {
    $options['Y/m/d'] = sprintf(
        '%s (%s)',
        __('Custom Date', 'codepress-admin-columns'),
        'Y/m/d'
    );

    return $options;
});