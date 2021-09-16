<?php

defined( 'ABSPATH' ) || exit;

add_action( 'restrict_manage_posts', function () {

	$taxonomy = 'pa_merchant'; // Change this value to reflect the attribute you want to filter on.

	global $typenow;

	if ( $typenow !== 'product' ) {
		return;
	}

	$selected      = $_GET[ $taxonomy ] ?? '';
	$info_taxonomy = get_taxonomy( $taxonomy );

	wp_dropdown_categories( array(
		'show_option_all' => __( "{$info_taxonomy->labels->singular_name} Filter" ),
		'taxonomy'        => $taxonomy,
		'name'            => $taxonomy,
		'orderby'         => 'name',
		'selected'        => $selected,
		'show_count'      => true,
		'hide_empty'      => true,
	) );

} );

add_action( 'parse_query', function ( $query ) {

	$taxonomy = 'pa_merchant'; // Change this value to reflect the attribute you want to filter on.

	global $pagenow;

	$post_type = $_GET['post_type'] ?? '';
	$term_id   = absint( $_GET[ $taxonomy ] ?? '0' );

	if ( ! is_admin() ) {
		return;
	}

	if ( $term_id === 0 ) {
		return;
	}

	if ( $post_type !== 'product' ) {
		return;
	}

	if ( $pagenow !== 'edit.php' ) {
		return;
	}

	$tax_query = (array) $query->get( 'tax_query' );

	$term = get_term_by( 'id', $term_id, $taxonomy );

	$tax_query[] = array(
		'taxonomy' => $taxonomy,
		'field'    => 'slug',
		'terms'    => array( $term->slug ),
		'operator' => 'AND'
	);

	$query->set( 'tax_query', $tax_query );
} );
