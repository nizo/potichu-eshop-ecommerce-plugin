﻿<?php
/**
 * Login Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.6
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="col2-set" id="customer_login">

	<div class="col-1">

<?php endif; ?>

		<h2><?php _e( 'Login', 'woocommerce' ); ?></h2>

		<form method="post" class="login">
			<?php do_action( 'woocommerce_login_form_start' ); ?> 

			<label >Prihlásiť sa cez sociálnu sieť</label>			
			
			<!--<a class="social" href="<?php echo home_url('/wp-login.php?loginFacebook=1&redirect=') . home_url(); ?>" onclick="window.location = '<?php echo home_url('/wp-login.php?loginFacebook=1&redirect='); ?>'+window.location.href; return false;">-->
			<a class="social" href="<?php echo home_url('/wp-login.php?loginSocial=facebook'); ?>" data-plugin="nsl" data-action="connect" data-redirect="<?php echo home_url(); ?>" data-provider="facebook" data-popupwidth="475" data-popupheight="175">
				<div class="facebook"></div>
			</a>				
			
			<!--<a class="social" href="<?php echo home_url('/wp-login.php?loginGoogle=1&redirect=') . home_url(); ?>" onclick="window.location = '<?php echo home_url('/wp-login.php?loginGoogle=1&redirect='); ?>'+window.location.href; return false;">-->
			<a class="social" href="<?php echo home_url('/wp-login.php?loginSocial=google'); ?>" data-plugin="nsl" data-action="connect" data-redirect="<?php echo home_url(); ?>" data-provider="google" data-popupwidth="600" data-popupheight="600">
				<div class="google"></div>
			</a>
			
			<p class="form-row form-row-wide">
				<label for="username"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="text" class="input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" autocomplete="username"/>
			</p>
			<p class="form-row form-row-wide">
				<label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input class="input-text" type="password" name="password" id="password" autocomplete="current-password"/>
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-login' ); ?>
				<input type="submit" class="button" name="login" value="<?php _e( 'Login', 'woocommerce' ); ?>" /> 
				<input type="hidden" name="redirect" value="<?php echo home_url(); ?>" />
				<!--
				<label for="rememberme" class="inline">
					<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
				</label>
				-->
			</p>
			<p class="lost_password">
				<a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

<?php if (get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	</div>

	<div class="col-2">

		<h2><?php _e( 'Register', 'woocommerce' ); ?></h2>

		<form method="post" class="register">

			<?php do_action( 'woocommerce_register_form_start' ); ?>
			
			
			<label >Registrovať sa cez sociálnu sieť</label>			
			
			<!--<a class="social" href="<?php echo home_url('/wp-login.php?loginFacebook=1&redirect=') . home_url(); ?>" onclick="window.location = '<?php echo home_url('/wp-login.php?loginFacebook=1&redirect='); ?>'+window.location.href; return false;">-->
			<a class="social" href="<?php echo home_url('/wp-login.php?loginSocial=facebook'); ?>" data-plugin="nsl" data-action="connect" data-redirect="<?php echo home_url(); ?>" data-provider="facebook" data-popupwidth="475" data-popupheight="175">
				<div class="facebook"></div>
			</a>				
			
			<!--<a class="social" href="<?php echo home_url('/wp-login.php?loginGoogle=1&redirect=') . home_url(); ?>" onclick="window.location = '<?php echo home_url('/wp-login.php?loginGoogle=1&redirect='); ?>'+window.location.href; return false;">-->
			<a class="social" href="<?php echo home_url('/wp-login.php?loginSocial=google'); ?>" data-plugin="nsl" data-action="connect" data-redirect="<?php echo home_url(); ?>" data-provider="google" data-popupwidth="600" data-popupheight="600">			
				<div class="google"></div>
			</a>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="form-row form-row-wide">
					<label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="input-text" name="username" id="reg_username" autocomplete="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
				</p>

			<?php endif; ?>
			
								

			<p class="form-row form-row-wide">
				<label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="email" class="input-text" name="email" id="reg_email" autocomplete="current-password" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
			</p>  

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
	
				<p class="form-row form-row-wide">
					<label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="password" class="input-text" name="password" id="reg_password" />
				</p>

			<?php endif; ?>

			<div style="margin: -7px 0 7px 0; display: block;" >Heslo Vám zašleme e-mailom, môžete si ho kedykoľvek zmeniť.</div>
			<!-- Spam Trap -->			
			<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>
			
			<?php do_action( 'woocommerce_register_form' ); ?>
			<?php do_action( 'register_form' ); ?>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-register' ); ?>
				<input type="submit" class="button" name="register" value="<?php _e( 'Register', 'woocommerce' ); ?>" />
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
