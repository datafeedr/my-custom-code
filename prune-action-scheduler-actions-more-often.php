<?php

defined( 'ABSPATH' ) || exit;

/**
 * Delete completed actions which are older than 1 day.
 */
add_filter( 'action_scheduler_retention_period', function () {
	return DAY_IN_SECONDS;
} );

/**
 * Delete 500 actions at a time.
 */
add_filter( 'action_scheduler_cleanup_batch_size', function () {
	return 500;
} );
