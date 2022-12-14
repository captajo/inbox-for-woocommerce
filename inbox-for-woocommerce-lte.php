<?php
/**
 * Plugin Name: Inbox for WooCommerce
 * Plugin URI: http://woocommerce.com/products/inbox-for-woocommerce/
 * Description: [Light version] Allow customers send messages and inqiries about product/orders and also provides the shop owner with a helpdesk system for managing message correspondents. It also provides the option to use other helpdesks like Zendesk, Freshdesk, etc.
 * Version: 1.0.4
 * Author: Sweito
 * Author URI: http://sweito.com/
 * Developer: Sweito
 * Developer URI: http://sweito.com/
 * Text Domain: inbox-for-woocommerce
 * Domain Path: /languages
 *
 * WC requires at least: 3.0
 * WC tested up to: 7.1
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * 
 * @package Inbox-For-WooCommerce-LTE
 */

defined( 'ABSPATH' ) || die( 'Hey, stop right there!' );

$byPass = false;
if ( ! class_exists( 'WooCommerce' ) ) {
	// some code
	require_once plugin_dir_path( __FILE__ ) . 'templates/error/EssentialPluginMissing.php';
	$byPass = true;
}

// https://app.sweito.com/#/store/product/9af7ef7d-2455-4c48-929b-603835e6c7b2

require_once plugin_dir_path( __FILE__ ) . 'inbox-controller-lte.php';

if ( class_exists( 'InboxForWooCommerceLte' ) ) {

	define( 'WOOCOMMERCE_HELPDESK_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
	define( 'WOOCOMMERCE_HELPDESK_ASSETS_URL', plugins_url( '/assets', __FILE__ ) );
	define( 'WOOCOMMERCE_SWEITO_ASSETS_URL', WP_PLUGIN_DIR . '/inbox-for-woocommerce/assets') ;
	define( 'WOOCOMMERCE_SWEITO_TEMPLATES_URL', WP_PLUGIN_DIR . '/inbox-for-woocommerce/templates') ;
	define( 'WOOCOMMERCE_SWEITO_INCLUDES_URL', WP_PLUGIN_DIR . '/inbox-for-woocommerce/includes') ;
	define( 'WOOCOMMERCE_SWEITO_PRODUCT_URL', 'https://app.sweito.com/#/store/product/9af7ef7d-2455-4c48-929b-603835e6c7b2') ;

	$inboxForWooCommerceLte = new InboxForWooCommerceLte();
	$inboxForWooCommerceLte->register();

	// activation
	register_activation_hook( __FILE__, array( $inboxForWooCommerceLte, 'activate' ) );

	// deactivation
	require_once plugin_dir_path( __FILE__ ) . 'includes/DeactivateController.php';
	register_deactivation_hook( __FILE__, array( 'WC_Inbox_DeactivateController', 'deactivate' ) );
}
