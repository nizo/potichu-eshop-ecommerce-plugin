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
		<div class="price-title"><?php _e( 'Cart Value Totals', 'woocommerce' ); ?></div>
		<div class="price-subtotal">
<<<<<<< HEAD
			
			
			<span class="amount">
				<?php wc_cart_totals_subtotal_html(); ?>
			</span>
			<?php echo WC()->countries->inc_tax_or_vat();?>
			
=======

			<span class="amount">
				<?php
					wc_cart_totals_subtotal_html();
					//$cartTotal = WC()->cart->get_total();
					//echo $cartTotal;
				?>
			</span>

			<?php echo WC()->countries->inc_tax_or_vat(); ?>
>>>>>>> 64dce966ce9c0afcb090f2d8597c775f02aaa6eb
			<?php
				/*
				$discount = WC()->cart->get_total_discount();
				if ($discount != false) {
					echo '<div class="cart-discount-value">' . __('So zľavou:', 'woocommerce') . ' ' . $discount . '</div>';
				}
				*/
			?>
			<!--
				echo ' ' . WC()->countries->inc_tax_or_vat();
			-->
		</div>
	</div>
	<small class="cart-shipping-in-next-step">
	 <?php _e( 'Note: Shipping and taxes are estimated%s and will be updated during checkout based on your billing and shipping information.', 'woocommerce' ); ?>
	</small>
</div>