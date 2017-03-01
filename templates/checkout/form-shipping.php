<?php
/**
 * Checkout shipping information form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="woocommerce-shipping-fields">
	<?php if ( WC()->cart->needs_shipping_address() === true ) : ?>

		<?php
			if ( empty( $_POST ) ) {

				$ship_to_different_address = get_option( 'woocommerce_ship_to_destination' ) === 'shipping' ? 1 : 0;
				$ship_to_different_address = apply_filters( 'woocommerce_ship_to_different_address_checked', $ship_to_different_address );

			} else {

				$ship_to_different_address = $checkout->get_value( 'ship_to_different_address' );

			}
		?>

		

		<div class="delivery-address-headline-block">
			<h3 style="padding-left: 0 !important;"><?php _e('Dodacia adresa', 'woocommerce'); ?></h3></br>
		</div>
		
		<input id="ship-to-different-address-checkbox-mockup" class="input-checkbox" <?php checked( $ship_to_different_address, 0 ); ?> type="checkbox" name="ship_to_different_address-mockup" value="1" />
		
		<h3 id="ship-to-different-address" style="line-height: 11px; margin-right: 3px; margin-bottom: 38px; display: inline-block;">
		
		
			<label for="ship-to-different-address-checkbox" class="checkbox"><?php _e( 'Ship to a different address?', 'woocommerce' ); ?></label>
			
			<input id="ship-to-different-address-checkbox" class="input-checkbox" <?php checked( $ship_to_different_address, 1 ); ?> type="checkbox" name="ship_to_different_address" value="1" style="display: none;"/>
		</h3>

		<div class="shipping_address">

			<?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>
				
			<?php

			foreach ( $checkout->checkout_fields['shipping'] as $key => $field ) :
			
				if ($key == 'shipping_region') {					
					woocommerce_form_field( $key, $field, potichu_get_user_region_ID(true));
				}
				else
					woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

			<?php endforeach; ?>

			<?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>

		</div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

	<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) ) : ?>

		<?php if ( ! WC()->cart->needs_shipping() || WC()->cart->ship_to_billing_address_only() ) : ?>

			<h3><?php _e( 'Additional Information', 'woocommerce' ); ?></h3>

		<?php endif; ?>

		<?php foreach ( $checkout->checkout_fields['order'] as $key => $field ) : ?>

			<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

		<?php endforeach; ?>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>
</div>
