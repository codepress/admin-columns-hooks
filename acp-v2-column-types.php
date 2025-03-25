<?php

/**
 * Register your custom column type in the 'acp/column_types' hook.
 */
add_filter('acp/v2/column_types', static function ($factories, AC\TableScreen $table_screen): array {
    // Register for the page post type table
    if ($table_screen->get_key()->equals(new AC\Type\ListKey('page'))) {
        $factories[] = MyExampleColumn::class;
    }

    // Register for the User table
    if ($table_screen instanceof AC\TableScreen\User) {
        $factories[] = MyExampleColumn::class;
    }

    // Register for the User table
    if (
        $table_screen instanceof ACP\TableScreen\Taxonomy &&
        $table_screen->get_taxonomy()->equals(
            new AC\Type\TaxonomySlug('category')
        )) {
        $factories[] = MyExampleColumn::class;
    }

    return $factories;
});

/**
 * Define your own custom column class
 * @see https://docs.admincolumns.com/article/21-how-to-create-my-own-column
 */
class MyExampleColumn extends ACP\Column\BaseFactory
{

    public function get_column_type(): string
    {
        return 'my_custom_column';
    }

    public function get_label(): string
    {
        return 'My Column Label';
    }
}