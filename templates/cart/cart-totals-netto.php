<?php
/**
 * Cart totals
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div>	

	<div class="price-subtotal-section">
		<div class="price-title"><?php _e( 'Cart Totals', 'woocommerce' ); ?></div>	
		<div class="price-subtotal"><?php wc_cart_totals_subtotal_html(); ?></div>
	</div>				
	<small class="cart-shipping-in-next-step">
	 <?php _e( 'Note: Shipping and taxes are estimated%s and will be updated during checkout based on your billing and shipping information.', 'woocommerce' ); ?>
	</small>				
</div>