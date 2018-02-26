<?php
/**
 * Checkout coupon form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! WC()->cart->coupons_enabled() ) {
	return;
}

$info_message = apply_filters( 'woocommerce_checkout_coupon_message', __( 'Have a coupon?', 'woocommerce' ) . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'woocommerce' ) . '</a>' );
//wc_print_notice( $info_message, 'notice' );
echo '<div class="enter-coupon-form">' . $info_message . '</div><div class="clear"></div>';
?>

<form class="checkout_coupon" method="post" style="display:none">
	<input type="text" name="coupon_code" class="input-text" placeholder="<?php _e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
	<input type="submit" class="button" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" />
	<div class="clear"></div>


	<?php
 
	global $woocommerce;	
	if ( ! empty( $woocommerce->cart->applied_coupons ) ) {
			$couponCodes = $woocommerce->cart->applied_coupons;

			foreach($couponCodes as $code){			
				$coupon = new WC_Coupon( $code );
				echo '</br>';
				_e('Použité kupóny:', 'woocommerce');

				if ( $post = get_post( $coupon->id ) ) {
					if ( !empty( $post->post_excerpt ) ) {
						echo '<div>';
						$redirectUrl = $woocommerce->cart->get_cart_url() . '?remove_coupon=' . $code;

						$removeCouponUrl = '<a href="' . $redirectUrl . '" class="woocommerce-remove-coupon">[' . __('Odstrániť', 'woocommerce'). ']</a>';
						echo "<span class='coupon-name'><b>".$coupon->code."</b> - " . $post->post_excerpt . " " . $removeCouponUrl . "</span>";
						echo '</div>';
					}
			}				
		}
	}

	?>

</form>

