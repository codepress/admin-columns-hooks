<?php

/**
 * A full working example is provided in the 'ac-column-template' plugin.
 * @see https://github.com/codepress/ac-column-template/
 */
add_filter('ac/column/types', static function (array $factories, AC\TableScreen $table_screen): array {
    // Include file with the column class
    require_once __DIR__ . '/classes/MyExampleColumn.php';

    // Register for the page post type table
    if ('page' === (string)$table_screen->get_id()) {
        $factories[] = MyExampleColumn::class;
    }

    // Register for the User table
    if ($table_screen instanceof AC\TableScreen\User) {
        $factories[] = MyExampleColumn::class;
    }

    // Register for the Taxonomy table
    if (
        $table_screen instanceof ACP\TableScreen\Taxonomy &&
        'category' === (string)$table_screen->get_taxonomy()
    ) {
        $factories[] = MyExampleColumn::class;
    }

    return $factories;
}, 10, 2);