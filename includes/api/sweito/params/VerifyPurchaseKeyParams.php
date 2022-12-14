<?php
/**
 * Verifying Purchase Key
 * 
 * @package Inbox-For-WooCommerce-LTE 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'WC_Inbox_Sweito_VerifyPurchaseKeyParams' ) ) {
	class WC_Inbox_Sweito_VerifyPurchaseKeyParams {
		
		/** Var string */
		public $purchaseKey;

		/** Var string */
		public $site;

		/**
		 * Set Site
		 *
		 * @param string $purchasekey
		 * @return WC_Inbox_Sweito_VerifyPurchaseKeyParams
		 */
		public function setPurchaseKey( $purchaseKey) {
			$this->purchaseKey = $purchaseKey;
			return $this;
		}

		/**
		 * Set Site
		 *
		 * @param string $site
		 * @return WC_Inbox_Sweito_VerifyPurchaseKeyParams
		 */
		public function setSite( $site) {
			$this->site = $site;
			return $this;
		}
	}

}
