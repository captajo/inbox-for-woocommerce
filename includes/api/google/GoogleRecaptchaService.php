<?php
/**
 * Manage google interaction with WP
 * 
 * @package Inbox-For-WooCommerce-LTE
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'WC_Inbox_GoogleRecaptchaService' ) ) {
	class WC_Inbox_GoogleRecaptchaService {
		const GOOGLE_API = 'https://google.com';

		/**
		 * Test Recaptcha Challenge
		 *
		 * @param string $token
		 * @return bool
		 */
		public static function checkRecaptchaToken( $token) {
			require_once(WOOCOMMERCE_SWEITO_INCLUDES_URL . '/SettingController.php');

			// set post fields
			$post = [
				'secret' => WC_Inbox_SettingController::defaultGoogleRecaptchaSecretKey(),
				'response' => $token,
			];

			$ch = curl_init(self::GOOGLE_API . '/recaptcha/api/siteverify');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

			// execute!
			$response = curl_exec($ch);

			// close the connection, release resources used
			curl_close($ch);

			$data = json_decode($response, true);

			if ( $data['success'] ) {
return true;
			}

			return false;
		}
	}

}
