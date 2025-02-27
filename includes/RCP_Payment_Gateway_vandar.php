<?php
/**
 * Payment Gateway For Vandar
 */

class RCP_Payment_Gateway_vandar extends RCP_Payment_Gateway {

	/**
	 * @access public
	 * @return void
	 */
	public function init() {
		$this->supports[] = 'one-time';
	}

	/**
	 * @since 3.2
	 */
	public function process_ajax_signup() {
		rcp_vandar_create_payment($this->subscription_data);
	}

	/**
	 * @access public
	 * @return void
	 */
	public function process_signup() {
		rcp_vandar_create_payment($this->subscription_data);
	}

	/**
	 * @since 2.7
	 * @return bool True if the subscription is eligible for a trial, false if not.
	 */
	public function is_trial() {
		return false;
	}

	/**
	 * Creates a new subscription at the gateway for the supplied membership
	 *
	 * This operation does not happen during
	 * registration and the customer may not even be on-site, which is why no card details are supplied or available.
	 * This method should only be implemented if the gateway supports `off-site-subscription-creation`
	 *
	 * @param RCP_Membership $membership
	 *
	 * @since 3.4
	 * @return true|WP_Error True on success, WP_Error object on failure.
	 */
	public function create_off_site_subscription( $membership ) {
		return new WP_Error( 'not_supported', __( 'This feature is not supported by the chosen payment method.', 'rcp' ) );
	}

}
