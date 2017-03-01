<?php
/**
 * Customer completed order email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php do_action( 'woocommerce_email_header', $email_heading ); ?>

<p>
<?php
_e( 'Vaša objednávka bola vyzdvihnutá v našom sklade alebo odovzdaná kuriérovi, týmto ju považujeme za vybavenú. Ďakujeme Vám za prejavenú dôveru a veríme, že sa na nás v budúcnosti znovu obrátite.<br><br>
V prípade akýchkoľvek otázok nás kontaktujte na <a href="http://www.potichu.sk/kontakt">www.potichu.sk/kontakt</a>.', 'woocommerce' );
?>
</p>

<?php do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text ); ?>

<?php do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text ); ?>

<?php do_action( 'woocommerce_email_footer' ); ?>