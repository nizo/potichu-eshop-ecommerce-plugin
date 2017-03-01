<?php
/**
 * Customer money received email
 *
 * @author 		Nizo
 * @package 	WooCommerce/Templates/Emails
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php do_action( 'woocommerce_email_header', $email_heading ); ?>

<p>
<?php 

_e('Ďakujeme, práve sme prijali Vašu platbu za objednávku. O stave objednávky a expedovaní tovaru Vás budeme v priebehu najbližších dní informovať.', 'woocommerce');

?></p>

<?php do_action( 'woocommerce_email_footer' ); ?>