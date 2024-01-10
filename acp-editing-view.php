<?php
/**
 * Change the behavior of the editable for a specific column.
 */

/**
 * Usage
 *
 * @param ACP\Editing\View|false $view
 * @param AC\Column              $column
 * @param string                 $context "single" or "bulk"
 * @param ACP\Editing\Service    $service
 *
 * @return ACP\Editing\View|false
 */
function acp_editing_view_example_usage($view, AC\Column $column, $context, ACP\Editing\Service $service)
{
    return $view;
}

add_filter('acp/editing/view', 'acp_editing_view_example_usage', 10, 4);

// Or anonymous function

add_filter('acp/editing/view', function ($view, AC\Column $column, $context, ACP\Editing\Service $service) {
    return $view;
}, 10, 4);

/**
 * Example that enabled bulk editing for the Slug column that is disabled by default. It returns the view that is normally used for inline editing
 *
 * @param ACP\Editing\View|false $view
 * @param AC\Column              $column
 * @param string                 $context "single" or "bulk"
 * @param ACP\Editing\Service    $service
 *
 * @return ACP\Editing\View|false
 */
function acp_editing_view_enable_bulk_for_slug($view, AC\Column $column, $context, ACP\Editing\Service $service)
{
    if ($column instanceof AC\Column\Post\Slug && 'bulk' === $context) {
        $view = $service->get_view('single');
    }

    return $view;
}

add_filter('acp/editing/view', 'acp_editing_view_enable_bulk_for_slug', 10, 4);

function acp_editing_view_custom_select($view, AC\Column $column, $context, ACP\Editing\Service $service)
{
    if ($column instanceof AC\Column\CustomField && $column->get_meta_key() === 'your-meta-key') {
        $view = new ACP\Editing\View\Select([
            'value'  => 'Label',
            'value2' => 'Label 2',
        ]);
    }

    return $view;
}

add_filter('acp/editing/view', 'acp_editing_view_custom_select', 10, 4);

// Change the color palette for every color editable
add_filter('acp/editing/view', function ($view) {
    if ($view instanceof ACP\Editing\View\Color) {
        $view->set_palletes(['#fe3d6c', '#02abab', '#ffee85', '#242830', '#3D4350', '#CACED9']);
    }

    return $view;
});
