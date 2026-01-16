<?php

/** Default: 250 */
add_filter('ac/delete/bulk/deleted_rows_per_iteration', static function ($number, AC\ListScreen $list_screen) {
    return $number;
}, 10, 2);