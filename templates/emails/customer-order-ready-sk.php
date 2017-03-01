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


<?php
$shipping_methods = $order->get_shipping_methods();
 
foreach ( $shipping_methods as $shipping ) {
	$shippingID = ($shipping['item_meta']['method_id'][0]);		
}

if ($shippingID != 'flat_rate_reg') { ?>
	<p>
	Vaša objednávka je od nasledujúceho pracovného dňa pripravená na osobný odber v&nbsp;<a href="http://www.potichu.sk/kontakt/#warehouse-location" target="_blank">našom sklade</a>. <br><br>

	<b>Telefónny kontakt na sklad:</b><br> <a href="tel:+421 907 720 886">+421 907 720 886</a>

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
	Prosíme o vyzdvihnutie tovaru do 10-tich pracovných dní.

	Ďakujeme Vám za prejavenú dôveru a veríme, že sa na nás v budúcnosti znovu obrátite.

	V prípade akýchkoľvek otázok nás kontaktujte na <a target="_blank" href="http://www.potichu.sk/kontakt">www.potichu.sk</a>.
	</p>

<? } else { ?>
	<p>	
	Vaša objednávka je skompletizovaná a pripravená na expedíciu, očakávajte zásielku kuriérom v priebehu nasledujúcich dvoch až troch pracovných dní.<br><br>	
	<b>Ak ste zvolili platbu dobierkou, momentálne je možná iba platba kuriérovi v&nbsp;hotovosti.</b><br><br>	
		
	Ďakujeme Vám za prejavenú dôveru a veríme, že sa na nás v budúcnosti znovu obrátite.

	V prípade akýchkoľvek otázok nás kontaktujte na <a target="_blank" href="http://www.potichu.sk/kontakt">www.potichu.sk</a>.	
	</p>


<?php } ?>

<?php do_action( 'woocommerce_email_footer' ); ?>