<?php

/**
 * Normalize merchant attribute names.
 */
add_filter( 'dfrpswc_filter_attribute_value', function ( $value, $attribute, $post, $product, $set, $action ) {

	$ai = new Dfrpswc_Attribute_Importer( 'merchant', $value, $attribute, $product );

	$ai->add_field( [ 'merchant' ], 'merchant' );

	// Change "Black Diamond Equipment" to "Black Diamond"
	$ai->add_term( 'Black Diamond', [ 'Black Diamond Equipment' ] );

	// Change "North Face" to "The North Face"
	$ai->add_term( 'The North Face', [ 'North Face' ] );

	// Change "Petzl Inc" to "Petzl"
	$ai->add_term( 'Petzl', [ 'Petzl Inc' ] );

	return $ai->result();
}, 20, 6 );