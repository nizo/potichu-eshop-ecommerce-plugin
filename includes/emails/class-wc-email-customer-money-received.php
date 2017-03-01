<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'WC_Email_Customer_Money_Received' ) ) :

/**
 * Customer Processing Order Email
 *
 * An email sent to the admin when a new order is received/paid for.
 *
 * @class 		WC_Email_Customer_Money_Received
 * @version		2.0.0
 * @package		WooCommerce/Classes/Emails
 * @author 		WooThemes
 * @extends 	WC_Email
 */
class WC_Email_Customer_Money_Received extends WC_Email {

	/**
	 * Constructor
	 */
	function __construct() {
		
		$this->id 				= 'customer_money_received';
		$this->title 			= __( 'Platba prijatá', 'woocommerce' );
		$this->description		= __( 'This is an order notification sent to the customer payment has been received.', 'woocommerce' );

		$this->heading 			= __( 'Vaša platba bola prijatá', 'woocommerce' );
		$this->subject      	= __( 'Prijali sme platbu za Vašu objednávku z {order_date}', 'woocommerce' );

		$this->template_html 	= 'emails/customer-money-received.php';
		$this->template_plain 	= 'emails/plain/customer-money-received.php';

		// Triggers for this email				
		add_action( 'woocommerce_order_status_pending_to_money-received_notification', array( $this, 'trigger' ) );		

		// Call parent constructor
		parent::__construct();
	}

	/**
	 * trigger function.
	 *
	 * @access public
	 * @return void
	 */
	function trigger( $order_id ) {
		
		if ( $order_id ) {
			$this->object 		= wc_get_order( $order_id );
			$this->recipient	= $this->object->billing_email;

			$this->find['order-date']      = '{order_date}';
			$this->find['order-number']    = '{order_number}';

			$this->replace['order-date']   = date_i18n( wc_date_format(), strtotime( $this->object->order_date ) );
			$this->replace['order-number'] = $this->object->get_order_number();
		}
	
		
		if ( ! $this->is_enabled() || ! $this->get_recipient() ) {
			return;
		}

		$this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
	}

	/**
	 * get_content_html function.
	 *
	 * @access public
	 * @return string
	 */
	function get_content_html() {
		ob_start();
		wc_get_template( $this->template_html, array(
			'order' 		=> $this->object,
			'email_heading' => $this->get_heading(),
			'sent_to_admin' => false,
			'plain_text'    => false
		) );
		return ob_get_clean();
	}

	/**
	 * get_content_plain function.
	 *
	 * @access public
	 * @return string
	 */
	function get_content_plain() {
		ob_start();
		wc_get_template( $this->template_plain, array(
			'order'         => $this->object,
			'email_heading' => $this->get_heading(),
			'sent_to_admin' => false,
			'plain_text'    => true
		) );
		return ob_get_clean();
	}
}

endif;

return new WC_Email_Customer_Money_Received();
