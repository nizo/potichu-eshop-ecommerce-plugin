<?php
/**
 * Login form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( is_user_logged_in() ) 
	return;
?>
<form method="post" class="login" <?php if ( $hidden ) echo 'style="display:none;"'; ?>>

	<?php do_action( 'woocommerce_login_form_start' ); ?>

	<?php
		if ( $message ) {
			echo '<div style="margin: 12px 0 16px 0;">' . $message . '</div>'; 
		}
	?>

	<div class="login-checkout-1" id="checkoutLoginSection1">
		<label >Prihlásiť cez sociálnu sieť</label>	
			
		<!--<a class="social" href="<?php echo home_url('/wp-login.php?loginFacebook=1&redirect=') . home_url(); ?>" onclick="window.location = '<?php echo home_url('/wp-login.php?loginFacebook=1&redirect='); ?>'+window.location.href; return false;">-->
		<a class="social" href="<?php echo home_url('/wp-login.php?loginSocial=facebook'); ?>" data-plugin="nsl" data-action="connect" data-redirect="current" data-provider="facebook" data-popupwidth="475" data-popupheight="175">
			<div class="facebook"></div>
		</a>				
		
		<!--<a class="social" href="<?php echo home_url('/wp-login.php?loginSocial=google') . home_url(); ?>" onclick="window.location = '<?php echo home_url('/wp-login.php?loginGoogle=1&redirect='); ?>'+window.location.href; return false;">-->
		<a class="social" href="<?php echo home_url('/wp-login.php?loginSocial=google'); ?>" data-plugin="nsl" data-action="connect" data-redirect="current" data-provider="google" data-popupwidth="600" data-popupheight="600">
			<div class="google"></div>
		</a>				
	</div>
	
	<div class="login-checkout-2" id="checkoutLoginSection2">
		<p class="form-row form-row-first" style="width: 40%; display: inline-block; margin-right: 12px;">
			<label for="username"><?php _e( 'Username or email', 'woocommerce' ); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="username" id="username" />
		</p>
		<p class="form-row form-row-last" style="width: 40%;  display: inline-block; ">
			<label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
			<input class="input-text" type="password" name="password" id="password" />
		</p>
		<div class="clear"></div>

		<?php do_action( 'woocommerce_login_form' ); ?>

		<p class="form-row">
			<?php wp_nonce_field( 'woocommerce-login' ); ?>
			<input type="submit" class="button" name="login" value="<?php _e( 'Login', 'woocommerce' ); ?>" />
			<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
			<!--
			<label for="rememberme" class="inline" style="clear:both;">
				<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
			</label>
			-->
		</p>
		<p class="lost_password">
			<a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
		</p>
	</div>
	<div class="clear"></div>

	<?php do_action( 'woocommerce_login_form_end' ); ?>

</form>