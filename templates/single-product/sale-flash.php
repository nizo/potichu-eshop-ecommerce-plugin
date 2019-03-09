<?php
/**
 * Single Product Sale Flash
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;

if (!$product->is_visible()) return;
if ( $product->is_on_sale() ) :

	$price = $product->get_price_including_tax( 1, $product->get_regular_price());
	$discountPrice = $product->get_price_including_tax(1, null);
	$discountInPercent = 100 - round(($discountPrice / $price) * 100);

	echo apply_filters( 'woocommerce_sale_flash', '<span class="sale-label">' . __( 'Sale!', 'woocommerce' ) . ' ' . $discountInPercent . ' %</span>', $post, $product );

endif; ?>