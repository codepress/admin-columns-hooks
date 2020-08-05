<?php
/**
 * The filter allows you to disable ALL notices shown by Admin Columns
 * Such notices are 'Deleting a column set', 'Restoring settings' or 'Expiring License'.
 */
add_filter( 'ac/suppress_site_wide_notices', '__return_true' );