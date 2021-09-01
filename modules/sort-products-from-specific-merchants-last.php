<?php

defined( 'ABSPATH' ) || exit;

/**
 * Force the Menu Order (order in which products are displayed) to something very high (999999)
 * for specific merchants (in this case merchants with the ID of 43248 and 9666.
 *
 * You can find Merchant IDs here: https://datafeedr.me/networks in the MID column.
 */
add_filter( 'dfrpswc_filter_post_array', function ( $post, $dfr_product, $product_set, $action, $updater ) {

	$merchant_ids = [ 43248, 9666 ];

	$merchant_id = absint( $dfr_product['merchant_id'] );

	if ( in_array( $merchant_id, $merchant_ids ) ) {
		$post['menu_order'] = 999999;
	}

	return $post;

}, 10, 5 );
