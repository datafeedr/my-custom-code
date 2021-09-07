<?php

add_filter( 'dfrcs_link', function ( string $url, array $p ) {
	return add_query_arg( [
		'url'    => urlencode( $url ),
		'action' => 'compset-redirect',
	], get_home_url() );
}, 10, 2 );

add_action( 'template_redirect', function () {

	if ( is_admin() ) {
		return;
	}

	$url    = isset( $_GET['url'] ) ? urldecode( trim( $_GET['url'] ) ) : false;
	$action = isset( $_GET['action'] ) ? trim( $_GET['action'] ) : false;

	if ( empty( $url ) ) {
		return;
	}

	if ( empty( $action ) ) {
		return;
	}

	if ( 'compset-redirect' !== $action ) {
		return;
	}

	wp_redirect( $url );
	exit;
} );

