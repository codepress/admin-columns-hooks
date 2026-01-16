<?php

declare(strict_types=1);

/**
 * Define your own custom column class
 * @see https://docs.admincolumns.com/article/21-how-to-create-my-own-column
 */
class MyExampleColumn extends ACP\Column\AdvancedColumnFactory
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