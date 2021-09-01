<?php

defined( 'ABSPATH' ) || exit;

/**
 * Limit the number of results returned by Comparison Set to 3.
 */
add_filter( 'dfrcs_filter_products', function ( array $filtered_products, array $all_products ) {
	$max_products = 3;

	return array_slice( $filtered_products, 0, $max_products );
}, 10, 2 );
