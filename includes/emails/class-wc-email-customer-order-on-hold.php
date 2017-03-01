<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'WC_Email_Customer_On_Hold' ) ) :

/**
 * Customer New Account
 *
 * An email sent to the customer when they create an account.
 *
 * @class 		WC_Email_Customer_On_Hold
 * @version		2.0.0
 * @package		WooCommerce/Classes/Emails
 * @author 		WooThemes
 * @extends 	WC_Email
 */
class WC_Email_Customer_On_Hold extends WC_Email {
	
	/**
	 * Constructor
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
 
		// set ID, this simply needs to be a unique name
		$this->id = 'wc_expedited_order';
	 
		// this is the title in WooCommerce Email settings
		$this->title = 'Expedited Order';
	 
		// this is the description in WooCommerce email settings
		$this->description = 'Expedited Order Notification emails are sent when a customer places an order with 3-day or next day shipping';
	 
		// these are the default heading and subject lines that can be overridden using the settings
		$this->heading = 'Expedited Shipping Order';
		$this->subject = 'Expedited Shipping Order';
	 
		// these define the locations of the templates that this email should use, we'll just use the new order template since this email is similar
		$this->template_html  = 'emails/admin-new-order.php';
		$this->template_plain = 'emails/plain/admin-new-order.php';
	 
		// Trigger on new paid orders
		add_action( 'woocommerce_order_status_pending_to_processing_notification', array( $this, 'trigger' ) );
		add_action( 'woocommerce_order_status_failed_to_processing_notification',  array( $this, 'trigger' ) );
	 
		// Call parent constructor to load any other defaults not explicity defined here
		parent::__construct();
	 
		// this sets the recipient to the settings defined below in init_form_fields()
		$this->recipient = $this->get_option( 'recipient' );
	 
		// if none was entered, just use the WP admin email as a fallback
		if ( ! $this->recipient )
			$this->recipient = get_option( 'admin_email' );
	}


	public function trigger( $order_id ) {
 
    // bail if no order ID is present
    if ( ! $order_id )
        return;
 
    // setup order object
    $this->object = new WC_Order( $order_id );
 
    // bail if shipping method is not expedited
    if ( ! in_array( $this->object->get_shipping_method(), array( 'Three Day Shipping', 'Next Day Shipping' ) ) )
        return;
 
    // replace variables in the subject/headings
    $this->find[] = '{order_date}';
    $this->replace[] = date_i18n( woocommerce_date_format(), strtotime( $this->object->order_date ) );
 
    $this->find[] = '{order_number}';
    $this->replace[] = $this->object->get_order_number();
 
    if ( ! $this->is_enabled() || ! $this->get_recipient() )
        return;
 
    // woohoo, send the email!
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
			'email_heading'      => $this->get_heading(),									
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
			'email_heading'      => $this->get_heading(),
			'user_login'         => $this->user_login,
			'user_email'         => $this->user_email,
			'user_pass'          => $this->user_pass,
			'blogname'           => $this->get_blogname(),
			'password_generated' => $this->password_generated,
			'sent_to_admin' => false,
			'plain_text'    => true
		) );
		return ob_get_clean();
	}
}

endif;

return new WC_Email_Customer_New_Account();
