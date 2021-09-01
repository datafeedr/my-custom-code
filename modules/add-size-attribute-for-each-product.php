<?php

defined( 'ABSPATH' ) || exit;

add_filter( 'dfrpswc_filter_attribute_value', function ( $value, $attribute, $post, $product, $set, $action ) {

	$product_field  = 'size';
	$attribute_slug = 'pa_size';

	if ( $attribute !== $attribute_slug ) {
		return $value;
	}

	if ( ! isset( $product[ $product_field ] ) ) {
		return $value;
	}

	return mycode_get_size( $product[ $product_field ], $product[ $product_field ] );

}, 20, 6 );

function mycode_get_size( $field, $default = '' ): string {

	$map   = [];
	$terms = [];

	// ++++++++++ Begin Editing Here ++++++++++

	$map['11']   = [ '11', '11 M', '11 W' ];
	$map['11.5'] = [ '11.5', '11.5 M', '11.5 W' ];
	$map['12']   = [ '12', '12 M', '12 W' ];

	// ++++++++++ Stop Editing Here ++++++++++

	foreach ( $map as $key => $keywords ) {
		if ( in_array( $field, $keywords, true ) ) {
			$terms[] = $key;
		}
	}

	if ( ! empty( $terms ) ) {
		return implode( WC_DELIMITER, array_unique( $terms ) );
	}

	return $default;
}
