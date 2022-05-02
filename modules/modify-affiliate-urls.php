<?php

defined( 'ABSPATH' ) || exit;

add_filter( 'dfrapi_after_tracking_id_insertion', function ( $url ) {

	$replacements = [
		'http://partnerprogramma.bol.com' => 'https://partnerprogramma.bol.com',
	];

	return str_replace( array_keys( $replacements ), array_values( $replacements ), $url );
} );
