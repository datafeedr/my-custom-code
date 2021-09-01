<?php

defined( 'ABSPATH' ) || exit;

/**
 * Set the Product Short Description equal to "shortdescription" and if that
 * doesn't exist then set it equal to "description" and if that doesn't exist, set it
 * to an empty string.
 */
add_filter( 'dfrpswc_filter_post_array', function ( $post, $product, $set, $action ) {
	$post['post_excerpt'] = $product['shortdescription'] ?? $product['description'] ?? '';

	return $post;
}, 10, 4 );
