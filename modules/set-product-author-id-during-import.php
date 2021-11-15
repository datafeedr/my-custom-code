<?php

defined( 'ABSPATH' ) || exit;

/**
 * Set the Product Author ID during import.
 */
add_filter( 'dfrpswc_filter_post_array', function ( $post, $product, $set, $action ) {
	$post['post_author'] = 1; // Set Author ID here.

	return $post;
}, 10, 4 );
