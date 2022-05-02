<?php

defined( 'ABSPATH' ) || exit;

add_action( 'dfrpswc_pre_save_product', function ( Dfrpswc_Product_Update_Handler $updater ) {
	if ( $updater->action === 'insert' ) {
		$updater->wc_product->set_menu_order( 99999 );
	}
} );
