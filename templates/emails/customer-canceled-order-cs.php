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
Vaše objednávka <strong>byla zrušena</strong>. Zrušení mohlo nastat z uvedených důvodů:<br>
<ol>
<li>Neuhrazení platby objednávky do 10-ti pracovních dnů. Pokud jste platbu již v mezičase uhradili, obratem nás kontaktujte.</li>
<li>Zrušení objednávky na základě naší vzájemné dohody.</li>
</ol>
Věříme, že se na nás v budoucnu znovu obrátíte. V případě jakýchkoliv otázek nás kontaktujte na <a href="https://www.potichu.cz/kontakt" target="_blank">www.potichu.cz/kontakt</a>.

</p>

<?php do_action( 'woocommerce_email_footer' ); ?>