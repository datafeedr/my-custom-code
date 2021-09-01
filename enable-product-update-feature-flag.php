<?php

defined( 'ABSPATH' ) || exit;

/**
 * Enable the new Product Update Feature Flag.
 *
 * @link https://github.com/datafeedr/wordpress-plugins/discussions/5
 */
add_filter( 'dfrpswc_enable_product_update_handler_feature_flag', '__return_true' );
