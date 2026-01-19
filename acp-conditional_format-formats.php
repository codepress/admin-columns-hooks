<?php
/**
 * The filter allows you to modify the styles that are available in Conditional Formatting
 */

add_filter('acp/conditional_format/formats', function (array $formats): array {
    // Modify Styles array
    return $formats;
});

/**
 * Example that adds new colorblind patterns
 */
function ac_conditional_formatting_add_color_blind_patterns(array $formats): array
{
    $formats['success_pattern'] = [
        'background'       => 'repeating-linear-gradient(-45deg,rgba(255,255,255,.3),rgba(255,255,255,.3) 5px,transparent 5px,transparent 10px);',
        'background_color' => 'var(--ac-color-success)',
        'color'            => '#fff',
    ];
    $formats['warning_pattern'] = [
        'background'       => 'repeating-linear-gradient(90deg,rgba(255,255,255,.3),rgba(255,255,255,.3) 5px,transparent 5px,transparent 10px);',
        'background_color' => 'var(--ac-color-warning)',
        'color'            => '#fff',
    ];
    $formats['error_pattern'] = [
        'background'       => 'repeating-linear-gradient(45deg,rgba(255,255,255,.3),rgba(255,255,255,.3) 5px,transparent 5px,transparent 10px)',
        'background_color' => 'var(--ac-color-error)',
        'color'            => '#fff',
    ];
    $formats['info_pattern'] = [
        'background'       => 'linear-gradient(45deg, rgba(255,255,255,.4) 25%, transparent 25%) 0 0 / 20px 20px, linear-gradient(-45deg, rgba(255,255,255,.4) 25%, transparent 25%) 0 10px / 20px 20px, linear-gradient(45deg, transparent 75%, rgba(255,255,255,.4) 75%) 10px -10px / 20px 20px, linear-gradient(-45deg, transparent 75%, rgba(255,255,255,.4) 75%) -10px 0 / 20px 20px',
        'background_color' => 'var(--ac-primary-color)',
        'color'            => '#fff',
    ];

    return $formats;
}

add_filter('acp/conditional_format/formats', 'ac_conditional_formatting_add_color_blind_patterns');

/**
 * Example that adds some nice matching colors :)
 */
add_filter('acp/conditional_format/formats', function (array $formats): array {
    $formats['black_pink'] = [
        'color'            => 'pink',
        'background_color' => 'black',
    ];
    $formats['black_pink_invert'] = [
        'color'            => 'black',
        'background_color' => 'pink',
    ];
    $formats['blue_orange'] = [
        'color'            => '#EEA47F',
        'background_color' => '#00539C',
    ];
    $formats['blue_orange_invert'] = [
        'color'            => '#00539C',
        'background_color' => '#EEA47F',
    ];
    $formats['red_yellow'] = [
        'color'            => '#F96167',
        'background_color' => '#F9E795',
    ];
    $formats['red_yellow_invert'] = [
        'color'            => '#F9E795',
        'background_color' => '#F96167',
    ];
    $formats['lime_blue'] = [
        'color'            => '#CCF381',
        'background_color' => '#4831D4',
    ];
    $formats['lime_blue_invert'] = [
        'color'            => '#4831D4',
        'background_color' => '#CCF381',
    ];
    $formats['forest_green_moss'] = [
        'color'            => '#2C5F2D',
        'background_color' => '#97BC62',
    ];
    $formats['fuchsia_neon'] = [
        'color'            => '#99F443',
        'background_color' => '#EC449B',
    ];
    $formats['yellow_verdant'] = [
        'color'            => '#FFE77A',
        'background_color' => '#2C5F2D',
    ];
    $formats['cherry_bubblgum'] = [
        'color'            => '#CC313D',
        'background_color' => '#F7C5CC',
    ];

    return $formats;
});

/**
 * Example that removes all default colors
 */
add_filter('acp/conditional_format/formats', function (array $formats): array {
    unset($formats['success']);
    unset($formats['warning']);
    unset($formats['error']);
    unset($formats['info']);

    unset($formats['success-invert']);
    unset($formats['warning-invert']);
    unset($formats['error-invert']);
    unset($formats['info-invert']);

    return $formats;
});