<?php

/**
 * The filter allows you to hide the renewal notice shown when a license key ia about to expire.
 */
add_filter('acp/hide_renewal_notice', '__return_true');