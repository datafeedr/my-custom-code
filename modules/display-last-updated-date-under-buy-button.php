<?php

defined( 'ABSPATH' ) || exit;

/**
 * Display the date and time this product was last updated underneath the
 * Buy button on WooCommerce Single Product pages.
 */
add_action( 'woocommerce_after_add_to_cart_button', function () {
	global $product;

	$html = '<div><small>As of %s</small></div>';
	$date = esc_html( date_i18n( 'F j, Y g:ia', $product->get_date_modified() ) );

	printf( $html, $date );
} );
