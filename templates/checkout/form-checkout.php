<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
 
//r($checkout);
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );
//woocommerce_checkout_login_form();





// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>

<ul class="checkout-wizard">
	<li class="current" id="checkout-step-indicator-1">
		<a id="wizard-t-0" href="#wizard-h-0" >			
			<span class="number">1.</span>
			<div title="Fakturačná a dodacia adresa"><?php _e('Fakturačná a dodacia adresa', 'woocommerce'); ?></div>
		</a>
	</li>
	<li id="checkout-step-indicator-2">
		<a id="wizard-t-1" href="#wizard-h-1" >
			<span class="number">2.</span>
			<div title="Doručenie, spôsob platby a potvrdenie"><?php _e('Doručenie, spôsob platby a potvrdenie', 'woocommerce'); ?></div>
		</a>
	</li>
</ul>

<form name="checkout" method="post" class="checkout" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">	

	<span id="checkout-step-1">
		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">

			<div class="col-1">

				<?php do_action( 'woocommerce_checkout_billing' ); ?>

			</div>

			<div class="col-2">

				<?php do_action( 'woocommerce_checkout_shipping' ); ?>

			</div>

		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
		
		<!--<div class="user-notify"></div>-->
		<div class="checkout-next-step-button button" id="checkout-next-step-button"><?php _e('Ďalej', 'woocommerce'); ?> </div>
	</span>

	<span id="checkout-step-2" style="display: none;">
		<h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>	
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
		<div class="cart-meta-sumary"><?php _e('Rozmer dodávky:', 'woocommerce'); ?> <span><?php echo get_package_dimensions(WC()->cart->get_cart()); ?> m<sup>3</sup></span></br><?php _e('Hmotnosť dodávky:', 'woocommerce'); ?> <span><?php echo WC()->cart->cart_contents_weight; ?> kg</span></div>		
	</span>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>