<?php
/**
 * Change the behavior of the editable for a specific column.
 */

/**
 * Usage
 *
 * @param ACP\Editing\View|null $view
 * @param AC\Column\Context     $context
 * @param string                $editing_context "single" or "bulk"
 * @param ACP\Editing\Service   $service
 * @param AC\TableScreen        $table_screen
 *
 * @return ACP\Editing\View|null
 */
function ac_editing_view_example_usage(
    ?ACP\Editing\View $view,
    AC\Column\Context $context,
    string $editing_context,
    ACP\Editing\Service $service,
    AC\TableScreen $table_screen
): ?ACP\Editing\View {
    return $view;
}

add_filter('ac/editing/view', 'ac_editing_view_example_usage', 10, 5);

// Or anonymous function

add_filter(
    'ac/editing/view',
    static function (
        $view,
        AC\Column\Context $context,
        string $edit_context,
        ACP\Editing\Service $service,
        AC\TableScreen $table_screen
    ) {
        return $view;
    },
    10,
    5
);

/**
 * Example that enabled bulk editing for the Slug column that is disabled by default. It returns the view that is normally used for inline editing
 */
function ac_editing_view_enable_bulk_for_slug(
    $view,
    AC\Column\Context $context,
    string $edit_context,
    ACP\Editing\Service $service
) {
    if ($context->get_type() === 'column-slug' && 'bulk' === $edit_context) {
        $view = $service->get_view('single');
    }

    return $view;
}

add_filter('ac/editing/view', 'ac_editing_view_enable_bulk_for_slug', 10, 4);

function ac_editing_view_custom_select(
    $view,
    AC\Column\Context $context,
    string $edit_context,
    ACP\Editing\Service $service
) {
    if ($context->get_type() === 'column-meta' && $context->get('field') === 'your-meta-key') {
        $view = new ACP\Editing\View\Select([
            'value'  => 'Label',
            'value2' => 'Label 2',
        ]);
    }

    return $view;
}

add_filter('ac/editing/view', 'ac_editing_view_custom_select', 10, 4);

