<?php
/**
 * Customer processing order email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>


<?php 
if ($paymentType == 'bacs') {
	$email_heading = __('Ďakujeme za Vašu objednávku, čakáme na úhradu', 'woocommerce');
}
?>
<?php do_action('woocommerce_email_header', $email_heading); ?>

<?php do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text ); 

$paymentType = get_post_meta( $order->id, '_payment_method', true );
if ($paymentType == 'besteron') {
	_e('<p>Vašu objednávku <strong>začíname spracovávať</strong>, o jej skompletizovaní Vás </strong>budeme informovať ďalším emailom</strong>. V prípade akýchkoľvek otázok nás určite kontaktujte na <a target="_blank" href="http://www.potichu.sk/kontakt">www.potichu.sk/kontakt</a>.<p>','woocomemrce');
}
else if ($paymentType == 'bacs') {
	$bacs = new WC_Gateway_BACS();
	$bacs->thankyou_page( $order->id );
		
	// notify admin about new order
	$mailer = WC()->mailer();
	$mails = $mailer->get_emails();
	if ( ! empty( $mails ) ) {
		foreach ( $mails as $mail ) {
			if ( $mail->id == 'new_order' ) {
				$mail->trigger( $order->id );
				break;
			}
		}
	}
} /*else if ($paymentType == 'pis') {
	$pis = new WC_Gateway_PIS();
	$pis->thankyou_page( $order->id );
		
	// notify admin about new order
	$mailer = WC()->mailer();
	$mails = $mailer->get_emails();
	if ( ! empty( $mails ) ) {
		foreach ( $mails as $mail ) {
			if ( $mail->id == 'new_order' ) {
				$mail->trigger( $order->id );
				break;
			}
		}
	}
}*/

?>

<table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #eee;" border="1" bordercolor="#eee">
	<thead>
		<tr>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Product', 'woocommerce' ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Price', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php echo $order->email_order_items_table( $order->is_download_permitted(), true, $order->has_status( 'processing' ) ); ?>
	</tbody>
	<tfoot>
		<?php
			if ( $totals = $order->get_order_item_totals() ) {
				$i = 0;
				foreach ( $totals as $total ) {
					$i++;
					?><tr>
						<th scope="row" colspan="2" style="text-align:left; border: 1px solid #eee; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['label']; ?></th>
						<td style="text-align:left; border: 1px solid #eee; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['value']; ?></td>
					</tr><?php
				}
			}
		?>
	</tfoot>
</table>

<?php
global $woocommerce;

$cartWeight = potichu_get_order_total_weight($order);
$cartWeight = number_format((float)$cartWeight, 2, '.', '');
$cartDimension = potichu_get_order_dimensions($order);

?>

<br/><?php _e('Rozmer dodávky:', 'woocommerce'); ?> <?php echo $cartDimension; ?> m<sup>3</sup><br/><?php _e('Hmotnosť dodávky:', 'woocommerce'); ?> <?php echo $cartWeight; ?> kg<br/>

<?php do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text ); ?>

<?php do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text ); ?>

<?php wc_get_template( 'emails/email-addresses.php', array( 'order' => $order ) ); ?>

<?php do_action( 'woocommerce_email_footer' ); ?>