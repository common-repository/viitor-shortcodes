<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Scripts Class
 *
 * Handles adding scripts functionality to the admin pages
 * as well as the front pages.
 *
 * @package WP Shortcodes
 * @since 3.0.0
 */
class Ww_Wpsc_Scripts {

	public function __construct() {
	}

	/**
	 * Enqueue Styles
	 *
	 * Enqueue Style Sheet for public
	 *
	 * @package WP Shortcodes
	 * @since 3.0.0
	 */
	public function ww_vcsc_public_styles() {

		wp_register_style( 'ww-vcsc-public-style', WW_WPSC_URL . 'includes/css/ww-vcsc-public.css' );
		wp_enqueue_style( 'ww-vcsc-public-style' );
	}

	/**
	 * Enqueuing Styles
	 *
	 * Loads the required stylesheets for displaying the theme settings page in the WordPress admin section.
	 *
	 * @package WP Shortcodes
	 * @since 3.0.0
	 */
	public function ww_vcsc_admin_styles( $hook_suffix ) {

		$pages_hook_suffix = array( 'post.php', 'post-new.php' );

		// Check pages when you needed.
		if ( in_array( $hook_suffix, $pages_hook_suffix ) ) {

			// loads the required styles for the plugin settings page.
			wp_register_style( 'ww-vcsc-admin', WW_WPSC_URL . 'includes/css/ww-vcsc-admin.css', array(), null );
			wp_enqueue_style( 'ww-vcsc-admin' );

		}
	}

	/**
	 * Adding Hooks
	 *
	 * Adding hooks for the styles and scripts.
	 *
	 * @package WP Shortcodes
	 * @since 3.0.0
	 */
	public function add_hooks() {

		// add style for front side.
		add_action( 'wp_enqueue_scripts', array( $this, 'ww_vcsc_public_styles' ) );

		// for shortcode popup.
		add_action( 'admin_enqueue_scripts', array( $this, 'ww_vcsc_admin_styles' ) );
	}
}
