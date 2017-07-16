<?php
/**
 * Email Addresses
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<br><table cellspacing="0" cellpadding="0" style="width: 100%; vertical-align: top;" border="0">

	<tr>

		<td valign="top" width="50%">

			<h3><?php _e( 'Billing address', 'woocommerce' ); ?></h3>

			<p><?php echo $order->get_formatted_billing_address(); ?></p>

			<?php

			if (get_post_meta( $order->id, '_billing_firm_data_region', true ) == 1) {

				$companyName = get_post_meta( $order->id, '_billing_company_name', true );
				$companyIco = get_post_meta( $order->id, '_billing_ico', true );
				$companyDic = get_post_meta( $order->id, '_billing_dic', true );
				$companyIcDph = get_post_meta( $order->id, '_billing_ic_dph', true );

				if ($companyName != '')
					echo '<strong>Názov spoločnosti:</strong> ' . $companyName . '<br/>';
				if ($companyIco != '')
					echo '<strong>'.__('IČO').':</strong> ' . $companyIco . '<br/>';
				if ($companyDic != '')
					echo '<strong>'.__('DIČ').':</strong> ' . $companyDic . '<br/>';
				if ($companyIcDph != '')
					echo '<strong>'.__('ič DPH').':</strong> ' . $companyIcDph . '<br/>';
			}
			?>			

		</td>

		<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && ( $shipping = $order->get_formatted_shipping_address() ) ) : ?>

		<td valign="top" width="50%">

			<h3><?php _e( 'Shipping address', 'woocommerce' ); ?></h3>

			<p><?php echo $shipping; ?></p>

		</td>

		<?php endif; ?>

	</tr>

</table>
