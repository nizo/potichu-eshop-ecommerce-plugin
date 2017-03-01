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
$paymentMethod = $order->payment_method;
 
foreach ( $shipping_methods as $shipping ) {
	$shipping_method_id = ($shipping['item_meta']['method_id'][0]);		
}

if ($shipping_method_id != 'flat_rate_reg') {	
	if ($paymentMethod == 'pis') { ?>
	
		<p>Váš materiál je připraven k vyzvednutí.<br><br>
		
		Po uhradě materiálu HOTOVĚ v naší kanceláři, <b>Příčná 893, Kolín 28002 v době po-pá od 8.00 – 16.00 hod.</b> (platba kartou není možná), Vám bude materiál vydán v <a href="https://www.potichu.cz/kontakt/#warehouse-location" target="_blank">našem skladu v budově Toptrans (Kolín), ul. K Raškovci 851.</a>

		<br><br>
		<b>Pracovní doba skladu:</b>
		<ul>
			<li>Pondělí 8:00 - 18:00</li>
			<li>Úterý 8:00 - 18:00</li>
			<li>Středa 8:00 - 18:00</li>
			<li>Čtvrtek 8:00 - 18:00</li>
			<li>Pátek 8:00 - 18:00</li>
		</ul>		
		<br>	
				
		Prosíme o vyzvednutí materiálu do 10-ti pracovních dnů. Děkujeme Vám za projevenou důvěru a věříme, že se na nás v budoucnu opět obrátíte. V případě jakýchkoliv otázek nás kontaktujte na <a target="_blank" href="https://www.potichu.cz/kontakt">www.potichu.cz</a>.
		
		</p>
	
	<?php } else {

?>
	<p>
	Vaše objednávka je od následujícího pracovního dne připravena k osobnímu odběru v <a href="https://www.potichu.cz/kontakt/#warehouse-location" target="_blank">našem skladu v budově Toptrans (Kolín)</a> (kont. osoba p. Bylina)"<br><br>	

	<b>Telefonní  kontakt:</b><br> <a href="tel:+420 728 060 775">+420 728 060 775</a>

	<br><br>

	<b>Pracovní doba skladu:</b>
	<ul>
		<li>Pondělí 8:00 - 18:00</li>
		<li>Úterý 8:00 - 18:00</li>
		<li>Středa 8:00 - 18:00</li>
		<li>Čtvrtek 8:00 - 18:00</li>
		<li>Pátek 8:00 - 18:00</li>
	</ul>
	<br>
	
	Prosíme o vyzvednutí materiálu do 10-ti pracovních dnů. Děkujeme Vám za projevenou důvěru a věříme, že se na nás v budoucnu opět obrátíte. V případě jakýchkoliv otázek nás kontaktujte na <a target="_blank" href="http://www.potichu.cz/kontakt">www.potichu.cz</a>.
	</p>

<? } } else { ?>
	<p>		
	
	Vaše objednávka je zkompletovaná a připravená k expedici, doručení zásilky kurýrem (přepravní společností) očekávejte v průběhu následujících dvou až tří pracovních dnů.<br><br>	

<b>Jestliže jste zvolili platbu dobírkou, momentálně je možná pouze platba v hotovosti.</b><br><br>	
		
Děkujeme Vám za projevenou důvěru a věříme, že se na nás v budoucnu znovu obrátíte.

V případě jakýchkoliv otázek nás kontaktujte na <a target="_blank" href="https://www.potichu.cz/kontakt">www.potichu.cz</a>.
	</p>


<?php } ?>

<?php do_action( 'woocommerce_email_footer' ); ?>