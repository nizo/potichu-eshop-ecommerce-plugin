<?php
/**
 * Customer new account email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>


<?php
do_action( 'woocommerce_email_header', $email_heading ); 
?>

<?php if ( get_option( 'woocommerce_registration_generate_password' ) == 'yes' && $password_generated ) {

	echo '<p>';
	
	if ($social_network_register)	
		printf( __("Vitajte na %s. Ďakujeme, že ste si u nás vytvorili účet.<br/><br/> Môžete sa naďalej prihlasovať pomocou sociálnych sietí (facebooku resp. googlu), alebo na prihlásenie využite nasledovné údaje:<br/><br/>Meno: <strong>%s</strong><br/>Heslo: <strong>%s</strong><br/>", 'woocommerce'), esc_html( $blogname ), esc_html($user_email), esc_html( $user_pass ) );
	else		
		printf( __("Vitajte na %s. Ďakujeme, že ste si u nás vytvorili účet. Vaše prihlasovacie údaje sú:<br/><br/>Meno: <strong>%s</strong><br/>Heslo: <strong>%s</strong><br/>", 'woocommerce'), esc_html( $blogname ), esc_html($user_email), esc_html( $user_pass ) );

	echo '</p>';
	
} else { ?>

<p><?php printf( __( "Thanks for creating an account on %s. Your username is <strong>%s</strong>.", 'woocommerce' ), esc_html( $blogname ), esc_html( $user_email) ); ?></p>

<?php } ?>

<p><?php
$permalink = get_permalink( wc_get_page_id( 'myaccount' ));
$hyperlink = '<a href="' . $permalink  .'" target="_blank">' . $permalink .'</a>';

printf( __( 'You can access your account area to view your orders and change your password here: %s.', 'woocommerce' ), $hyperlink ); ?></p>

<?php do_action( 'woocommerce_email_footer' ); ?>