<?php

defined( 'ABSPATH' ) || exit;

/**
 * Exclude specific merchants (by Merchant ID) from appearing in all Comparison Sets.
 *
 * You can find Merchant IDs here (in the MID column): https://datafeedr.me/networks
 */
add_filter( 'dfrcs_filter_products', function ( $filtered_products, $all_products ) {

	// Array of Merchant IDs of merchants to exclude from all Comparison Sets.
	$merchant_ids = [
		12345,
		67890,
	];

	foreach ( $filtered_products as $key => $product ) {
		if ( in_array( absint( $product['merchant_id'] ), $merchant_ids ) ) {
			unset( $filtered_products[ $key ] );
		}
	}

	return $filtered_products;

}, 10, 2 );
