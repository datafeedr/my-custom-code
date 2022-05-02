<?php

defined( 'ABSPATH' ) || exit;

define( 'CUSTOM_URL_META_KEY', '_custom_product_url' );

// Add Custom URL input field.
add_action( 'woocommerce_product_options_general_product_data', function () {
	echo '<div class="options_group show_if_external">';
	woocommerce_wp_text_input( [
		'name'        => CUSTOM_URL_META_KEY,
		'id'          => CUSTOM_URL_META_KEY,
		'class'       => CUSTOM_URL_META_KEY,
		'placeholder' => 'https://',
		'label'       => __( 'Custom URL' ),
		'data_type'   => 'url',
		'type'        => 'text',
	] );
	echo '</div>';
} );

// Save Custom URL value.
add_action( 'woocommerce_process_product_meta', function ( $post_id ) {
	$meta_key = CUSTOM_URL_META_KEY;
	$override = trim( $_POST[ $meta_key ] ?? '' );
	update_post_meta( $post_id, $meta_key, $override );
} );

// Replace affiliate URL with custom URL (if it exists) but only on the frontend, not backend.
add_filter( 'dfrapi_after_tracking_id_insertion', function ( string $url, array $product, string $affiliate_id ) {

	// Don't replace anything in WordPress Admin Area.
	if ( is_admin() ) {
		return $url;
	}

	// Get Post array for the Datafeedr product.
	$post = dfrps_get_post_by_product_id( $product['_id'], 'product' );

	// If Post array does not exist, that means were not dealing with an WooCommerce Product imported by Datafeedr.
	if ( ! $post ) {
		return $url;
	}

	$custom_url = trim( get_post_meta( $post['ID'], CUSTOM_URL_META_KEY, true ) );

	return empty( $custom_url ) ? $url : $custom_url;

}, 10, 3 );