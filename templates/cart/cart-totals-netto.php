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
			
			
			<span class="amount">
				<?php wc_cart_totals_subtotal_html(); ?>
			</span>
			<?php echo WC()->countries->inc_tax_or_vat();?>
			
			<?php
				/*
				$discount = WC()->cart->get_total_discount(); 
				if ($discount != false) {
					echo '<div class="cart-discount-value">' . __('So zľavou:', 'woocommerce') . ' ' . $discount . '</div>';
				}				
				*/
			?>
			<!--
				wc_cart_totals_subtotal_html();
				echo ' ' . WC()->countries->inc_tax_or_vat();
			-->
		</div>
	</div>				
	<small class="cart-shipping-in-next-step">
	 <?php _e( 'Note: Shipping and taxes are estimated%s and will be updated during checkout based on your billing and shipping information.', 'woocommerce' ); ?>
	</small>				
</div>