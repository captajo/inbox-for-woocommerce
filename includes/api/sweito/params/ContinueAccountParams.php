<?php
/**
 * Continue Account Params account interface
 * 
 * @package Inbox-For-WooCommerce-LTE 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'WC_Inbox_Sweito_ContinueAccountParams' ) ) {
	class WC_Inbox_Sweito_ContinueAccountParams {

		/** Variable: string */
		public $emailAddress;

		/**
		 * Set Site
		 *
		 * @param string $emailAddress
		 * @return WC_Inbox_Sweito_ContinueAccountParams
		 */
		public function setEmailAddress( $emailAddress) {
			$this->emailAddress = $emailAddress;
			return $this;
		}
	}

}
