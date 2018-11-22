<?php
/**
 * Customer money received email
 *
 * @author 		Nizo
 * @package 	WooCommerce/Templates/Emails
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php

$shipping_methods = $order->get_shipping_methods();

foreach ( $shipping_methods as $shipping ) {
	$shippingID = ($shipping['item_meta']['method_id'][0]);
}

$potichu_courier_chosen = (($shippingID == 'flat_rate_reg') || $shippingID == 'free_shipping');
$email_heading = ($potichu_courier_chosen ? 'Objednávka pripravená na odoslanie' : 'Objednávka pripravená od <strong>nasledujúceho dňa</strong> na vyzdvihnutie');

?>
<?php
//$email_heading = 'Objednávka pripravená na odoslanie';
?>
<?php do_action( 'woocommerce_email_header', $email_heading ); ?>


<?php

if (!$potichu_courier_chosen) { ?>
	<p>
	Vaša objednávka je od <strong>nasledujúceho pracovného dňa</strong> pripravená na osobný odber v&nbsp;<a href="http://www.potichu.sk/kontakt/#warehouse-location" target="_blank">našom sklade</a>. <br><br>

	<b>Telefónny kontakt na sklad:</b><br> <a href="tel:+421918720800">+421 918 720 800</a>

	<br><br>

	<b>Pracovná doba skladu:</b>
	<ul>
		<li>Pondelok 7:00 – 11:30 12:30 – 16:30</li>
		<li>Utorok 7:00 – 11:00 12:30 – 16:30</li>
		<li>Streda 7:00 – 11:30 12:30 – 16:30</li>
		<li>Štvrtok 7:00 – 11:30 12:30 – 16:30</li>
		<li>Piatok 7:00 – 11:30 12:30 – 16:00</li>
	</ul>
	<br>
	<strong>Prosíme o vyzdvihnutie tovaru do 10-tich pracovných dní.</strong>

	Ďakujeme Vám za prejavenú dôveru a veríme, že sa na nás v budúcnosti znovu obrátite.

	V prípade akýchkoľvek otázok nás kontaktujte na <a target="_blank" href="http://www.potichu.sk/kontakt">www.potichu.sk</a>.
	</p>

<? } else { ?>
	<p>
	Vaša objednávka je skompletizovaná a pripravená na expedíciu, <strong>očakávajte zásielku kuriérom v priebehu nasledujúcich dvoch až troch pracovných dní.</strong><br><br>
	Ak ste zvolili platbu dobierkou, momentálne je možná iba platba kuriérovi <strong>v&nbsp;hotovosti.</strong><br><br>

	Ďakujeme Vám za prejavenú dôveru a veríme, že sa na nás v budúcnosti znovu obrátite.

	V prípade akýchkoľvek otázok nás kontaktujte na <a target="_blank" href="http://www.potichu.sk/kontakt">www.potichu.sk</a>.
	</p>


<?php } ?>

<?php do_action( 'woocommerce_email_footer' ); ?>