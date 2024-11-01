<?php
/**
 * Plugin Name: Viitor  Button Shortcodes
 * Plugin URI: https://viitorcloud.com/blog/
 * Description: Button shortcodes and shortcodes attributes.
 * Version: 3.0.0
 * Author: Viitorcloud
 * Author URI: https://viitorcloud.com/
 *
 * @package WP Shortcodes
 * @since 3.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wpdb;

if ( ! defined( 'WW_WPSC_DIR' ) ) {
	define( 'WW_WPSC_DIR', __DIR__ ); // plugin dir.
}
if ( ! defined( 'WW_WPSC_ADMIN' ) ) {
	define( 'WW_WPSC_ADMIN', WW_WPSC_DIR . '/includes/admin' ); // plugin admin dir.
}
if ( ! defined( 'WW_WPSC_URL' ) ) {
	define( 'WW_WPSC_URL', plugin_dir_url( __FILE__ ) ); // plugin url.
}
if ( ! defined( 'WW_WPSC_IMG_URL' ) ) {
	define( 'WW_WPSC_IMG_URL', WW_WPSC_URL . 'includes/images' ); // plugin images url.
}
if ( ! defined( 'WW_WPSC_TEXT_DOMAIN' ) ) {
	define( 'WW_WPSC_TEXT_DOMAIN', 'wwvcsc' ); // text domain for doing language translation.
}

/**
 * Load Text Domain
 *
 * This gets the plugin ready for translation.
 *
 * @package WP Shortcodes
 * @since 3.0.0
 */
load_plugin_textdomain( 'wwvcsc', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/**
 * Activation hook
 *
 * Register plugin activation hook.
 *
 * @package WP Shortcodes
 * @since 3.0.0
 */

register_activation_hook( __FILE__, 'ww_vcsc_install' );

/**
 * Deactivation hook
 *
 * Register plugin deactivation hook.
 *
 * @package WP Shortcodes
 * @since 3.0.0
 */

register_deactivation_hook( __FILE__, 'ww_vcsc_uninstall' );

/**
 * Plugin Setup Activation hook call back
 *
 * Initial setup of the plugin setting default options
 * and database tables creations.
 *
 * @package WP Shortcodes
 * @since 3.0.0
 */
function ww_vcsc_install() {

	global $wpdb;
}

/**
 * Plugin Setup (On Deactivation)
 *
 * Does the drop tables in the database and
 * delete  plugin options.
 *
 * @package WP Shortcodes
 * @since 3.0.0
 */
function ww_vcsc_uninstall() {

	global $wpdb;
}

/**
 * Initialize all global variables
 *
 * @package WP Shortcodes
 * @since 3.0.0
 */

global $ww_vcsc_scripts, $ww_vcsc_admin, $ww_vcsc_shortcodes;

/**
 * Includes
 *
 * Includes all the needed files for plugin
 *
 * @package WP Shortcodes
 * @since 1.0.0
 */
require_once WW_WPSC_DIR . '/includes/class-ww-vcsc-scripts.php';
$ww_vcsc_scripts = new Ww_Wpsc_Scripts();
$ww_vcsc_scripts->add_hooks();

// includes admin class file.
require_once WW_WPSC_ADMIN . '/class-ww-vcsc-admin.php';
$ww_vcsc_admin = new Ww_Wpsc_Admin();
$ww_vcsc_admin->add_hooks();

// includes shortcode class file.
require_once WW_WPSC_DIR . '/includes/class-ww-vcsc-shortcodes.php';
$ww_vcsc_shortcodes = new Ww_Wpsc_Shortcodes();
$ww_vcsc_shortcodes->add_hooks();

/**
 * Enqueue script for admin
 */
function enqueue_custom_tinymce_plugin() {
	wp_enqueue_script( 'custom-tinymce-plugin', plugin_dir_url( __FILE__ ) . 'includes/js/ww-vcsc-buttons.js', array( 'jquery' ), '1.0', true );
}
add_action( 'admin_enqueue_scripts', 'enqueue_custom_tinymce_plugin' );
