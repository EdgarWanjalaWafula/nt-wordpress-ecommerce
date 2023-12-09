<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

echo apply_filters(
	'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
	sprintf(
		'<a href="%s" data-quantity="%s" class="d-flex align-items-center %s" %s>%s<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M252.309-100.001q-30.308 0-51.308-21t-21-51.308v-455.382q0-30.308 21-51.308t51.308-21h77.692v-10q0-62.154 43.923-106.077Q417.846-859.999 480-859.999q62.154 0 106.076 43.923 43.923 43.923 43.923 106.077v10h77.692q30.308 0 51.308 21t21 51.308v455.382q0 30.308-21 51.308t-51.308 21H252.309Zm0-59.999h455.382q4.616 0 8.463-3.846 3.846-3.847 3.846-8.463v-455.382q0-4.616-3.846-8.463-3.847-3.846-8.463-3.846h-77.692v90.001q0 12.769-8.615 21.384T600-520q-12.769 0-21.384-8.615t-8.615-21.384V-640H389.999v90.001q0 12.769-8.615 21.384T360-520q-12.769 0-21.384-8.615t-8.615-21.384V-640h-77.692q-4.616 0-8.463 3.846-3.846 3.847-3.846 8.463v455.382q0 4.616 3.846 8.463 3.847 3.846 8.463 3.846Zm137.69-539.999h180.002v-10q0-37.616-26.193-63.808Q517.616-800 480-800t-63.808 26.193q-26.193 26.192-26.193 63.808v10ZM240-160V-640-160Z"/></svg></a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() )
	),
	$product,
	$args
);