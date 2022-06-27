<?php

defined( 'ABSPATH' ) || exit;

/**
 * This runs on every page load and deletes any $hook with a specific $status.
 *
 * $hooks, $limit and $status are configurable.
 *
 * Works great so far!
 */
add_action( 'init', function () {

	global $wpdb;

	// Name of hook(s) to delete all records for.
	$hooks = [
		'dfrapi_as_dfrps_import_product_image',
		'wp_mail_smtp_admin_notifications_update',
		'woocommerce_run_product_attribute_lookup_update_callback',
		'woocommerce_cleanup_draft_orders',
		'wc-admin_import_customers',
	];

	// The status(es) of the actions to delete. Options: complete, pending and failed
	$status = [
		'complete',
//		'pending',
// 		'failed',
	];

	// Number of actions to delete at a time.
	$limit = 5000;

	/** STOP EDITING HERE */

	/**
	 * Action Schedule Table Names
	 */
	$actions_table = $wpdb->actionscheduler_actions;
	$logs_table    = $wpdb->actionscheduler_logs;

	/**
	 * Build query to get action IDs which match above parameters.
	 */
	$sql = sprintf(
		"SELECT action_id FROM %s WHERE hook IN('%s') AND status IN('%s') ORDER BY action_id ASC LIMIT %d",
		$actions_table,
		implode( "','", $hooks ),
		implode( "','", $status ),
		absint( $limit )
	);

	/**
	 * Run the query.
	 */
	$action_ids = $wpdb->get_col( $sql );

	/**
	 * Parse results.
	 */
	$action_ids = array_filter( array_map( 'absint', $action_ids ) );

	/**
	 * If there are no action IDs, return.
	 */
	if ( empty( $action_ids ) ) {
		return;
	}

	/**
	 * Format action IDs for DELETE queries.
	 */
	$action_ids = implode( ',', $action_ids );

	/**
	 * Delete rows  from "actions" and "logs" tables by their "action_id".
	 */
	$wpdb->query( "DELETE FROM $actions_table WHERE action_id IN($action_ids)" );
	$wpdb->query( "DELETE FROM $logs_table WHERE action_id IN($action_ids)" );
} );
