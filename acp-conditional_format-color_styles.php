<?php
/**
 * The filter allows you to modify the styles that are available in Conditional Formatting
 */

add_filter('acp/conditional_format/color_styles', function (array $styles) {
    // Modify Styles array
    return $styles;
});

/**
 * Example that adds two new styles for Conditional Formatting
 *
 * @param array $styles
 *
 * @return array
 */
function acp_conditional_formatting_add_new_styles(array $styles)
{
    $styles['black_pink'] = [
        'color'            => 'pink',
        'background_color' => 'black',
    ];
    $styles['black_pink_invert'] = [
        'color'            => 'black',
        'background_color' => 'pink',
    ];

    return $styles;
}

add_filter('acp/conditional_format/color_styles', 'acp_conditional_formatting_add_new_styles');
