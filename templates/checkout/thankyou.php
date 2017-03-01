<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( $order ) : ?>

	<?php if ( $order->has_status( 'failed' ) ) : ?>

		<p><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'woocommerce' ); ?></p>

		<p><?php
			if ( is_user_logged_in() )
				_e( 'Please attempt your purchase again or go to your account page.', 'woocommerce' );
			else
				_e( 'Please attempt your purchase again.', 'woocommerce' );
		?></p>

		<p>
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
			<?php if ( is_user_logged_in() ) : ?>
			<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>" class="button pay"><?php _e( 'My Account', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</p>
		<div style="padding-bottom: 1px; clear: both; margin-bottom: 40px;"></div>

	<?php else : ?>

		<p class="succesfully-ordered" style="margin-bottom: 0;"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?></p>
	

	<?php 
		$paymentType = get_post_meta( $order->id, '_payment_method', true );
		if ($paymentType == 'besteron') {
			_e('<p>Vašu objednávku začíname spracovávať, o jej skompletizovaní Vás budeme informovať emailom. V prípade akýchkoľvek otázok nás určite kontaktujte na <a href="http://www.potichu.sk/kontakt">www.potichu.sk/kontakt</a>.<p>','woocomemrce');
		}
		
		endif; ?>

	<span style="font-size: 14px; line-height: 22px;"><?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?></span>
	<br>
	<?php do_action( 'woocommerce_thankyou', $order->id ); ?>
	
	<!--
	https://docs.google.com/forms/d/1U_fUBZSR_PwgT_mapi9Q-P-3bxKMoe2c8msGa2QQ6gE/viewform?usp=send_form
	-->
	<!--
	<iframe src="https://docs.google.com/forms/d/1U_fUBZSR_PwgT_mapi9Q-P-3bxKMoe2c8msGa2QQ6gE/viewform?embedded=true" width="500" height="330" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
	-->
	

<?php else : ?>

	<p><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

<?php endif; ?>