<?php

/**
 * The available column groups e.g. 'Default', 'Custom Field', 'WooCommerce' etc.
 * This is used by AC\Column::get_group() to determine which group a column belongs to.
 */
add_action('ac/column/groups', static function (AC\Type\Groups $groups): void {
    $groups->add(
        new AC\Type\Group('my-custom-group', 'My Custom Group', 12)
    );
});