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
Vaša objednávka č. <?php echo $order->get_order_number(); ?> <b>bola zrušená</b>. Zrušenie mohlo nastať z uvedených dôvodov:<br>
<ol>
<li>Neuhradenie platby objednávky do 10 tich pracovných dní. Ak ste platbu už medzičasom uhradili, obratom nás kontaktujte.</li>
<li>Zrušenie objednávky na základe našej vzájomnej dohody.</li>
</ol>
Veríme,že sa na nás v budúcnosti znovu obrátite. V prípade akýchkoľvek otázok nás kontaktujte na <a href="http://www.potichu.sk/kontakt" target="_blank">www.potichu.sk/kontakt</a>.
</p>

<?php do_action( 'woocommerce_email_footer' ); ?>