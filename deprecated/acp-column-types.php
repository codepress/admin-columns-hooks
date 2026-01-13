<?php
/**
 * @depecated since 7.0
 *            Use `acp/v2/column_types` instead.
 */

/**
 * Register your custom column type in the 'ac/column_types' hook. Use the ListScreen object to target specific
 * list tables. In this example we add our custom column to the 'page' list table, but you can pick
 * any custom post type or other list table, such as user, comment and taxonomies.
 */
add_action('acp/column_types', static function (AC\ListScreen $list_screen): void {
    if ('page' !== $list_screen->get_post_type()) {
        return;
    }

    $list_screen->register_column_type(
        new MyExampleColumn()
    );
});

/**
 * Define your own custom column class
 * @see https://docs.admincolumns.com/article/21-how-to-create-my-own-column
 */
class MyExampleColumn extends AC\Column
{

    public function __construct()
    {
        $this->set_type('my_custom_column')
             ->set_label('My Column Label');
    }

    public function get_value($post_id): string
    {
        return 'My Column Output: ' . get_the_title($post_id);
    }

}