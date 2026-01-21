<?php

/**
 * This hooks allows you to alter the label just before they are rendered on the screen
 */

function ac_heading_label(string $label, AC\Column\Context $column): string
{
    // Change column label
    // $label = 'My Custom Label';

    return $label;
}

add_filter('ac/column/heading/label', 'ac_heading_label', 10, 2);

/**
 * Example on running each label through the string translation methods
 * translation must already be available in the language file, since no new strings are registered
 */
function ac_heading_label_translate(string $label, AC\Column\Context $column): string
{
    return __($label, 'custom-text-domain');
}

add_filter('ac/column/heading/label', 'ac_heading_label_translate', 10, 2);