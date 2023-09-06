<?php
/**
 * This hooks allows you to disable admin columns integrations
 */

add_filter('acp/addon/acf/active', '__return_false');
add_filter('acp/addon/bbpress/active', '__return_false');
add_filter('acp/addon/beaver-builder/active', '__return_false');
add_filter('acp/addon/buddypress/active', '__return_false');
add_filter('acp/addon/events-calendar/active', '__return_false');
add_filter('acp/addon/gravityforms/active', '__return_false');
add_filter('acp/addon/jetengine/active', '__return_false');
add_filter('acp/addon/media-library-assistant/active', '__return_false');
add_filter('acp/addon/metabox/active', '__return_false');
add_filter('acp/addon/pods/active', '__return_false');
add_filter('acp/addon/polylang/active', '__return_false');
add_filter('acp/addon/types/active', '__return_false');
add_filter('acp/addon/woocommerce/active', '__return_false');