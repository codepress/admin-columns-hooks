<?php

/**
 * Register your custom column type in the 'acp/column_types' hook.
 */
add_filter('ac/column/types/pro', static function (array $factories, AC\TableScreen $table_screen): array {
    // Include file with the column class
    require_once __DIR__ . '/classes/MyExampleColumn.php';

    // Register for the page post type table
    if ($table_screen->get_id()->equals(new AC\Type\TableId('page'))) {
        $factories[] = MyExampleColumn::class;
    }

    // Register for the User table
    if ($table_screen instanceof AC\TableScreen\User) {
        $factories[] = MyExampleColumn::class;
    }

    // Register for the Taxonomy table
    if (
        $table_screen instanceof ACP\TableScreen\Taxonomy &&
        $table_screen->get_taxonomy()->equals(
            new AC\Type\TaxonomySlug('category')
        )) {
        $factories[] = MyExampleColumn::class;
    }

    return $factories;
}, 10, 2);