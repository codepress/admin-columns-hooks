<?php
/**
 * The following filter allows you to enable or disable the text input for custom field keys.
 * By default this value is false which means that the default dropdown is shown
 * You might want to change this if you experiencing performance issue because of large datasets (lots of different meta keys)
 */

/**
 * This is an example for the default behavior. This should not be necessary
 */
add_filter( 'ac/column/custom_field/use_text_input', '__return_false' );

/**
 * This is an example on how to enable the text input instead of the ajax drop down
 * Use this hook if you experiencing performance issues on loading the available meta keys
 */
add_filter( 'ac/column/custom_field/use_text_input', '__return_true' );
