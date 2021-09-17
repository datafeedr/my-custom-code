<?php

defined( 'ABSPATH' ) || exit;

add_filter( 'dfrpswc_process_stranded_product', function () {
	return 'mycode_handle_unavailable_product';
} );

function mycode_handle_unavailable_product( $post_id ) {

	if ( ! $product = wc_get_product( $post_id ) ) {
		return;
	}

	$product->set_catalog_visibility( 'hidden' );
	$product->save();
}

add_action( 'dfrpswc_post_save_product', function ( Dfrpswc_Product_Update_Handler $updater ) {
	$updater->wc_product->set_catalog_visibility( 'visible' );
	$updater->wc_product->save();
} );
