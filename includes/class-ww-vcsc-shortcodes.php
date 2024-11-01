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
class Ww_Wpsc_Shortcodes {

	public function __construct() {
	}

	/**
	 * Replace Shortcode with Custom Content
	 *
	 * @param $atts this will handles to various attributes which are passed in shortcodes
	 * @param $content this will return the your replaced content
	 *
	 * @package WP Shortcodes
	 * @since 3.0.0
	 */
	public function ww_vcsc_boxes( $atts, $content ) {

		// content to replace with your content and with attributes.
		extract(
			shortcode_atts(
				array(
					'link'        => '#',
					'target'      => '',
					'boxtype'     => 'boxinfo',
					'showcontent' => '',
				),
				$atts
			)
		);

		// default value for box-type when nothing selected.
		if ( empty( $boxtype ) ) {
			$boxtype = 'boxinfo';
		}

		$content .= '<div class="ww-vcsc-' . $boxtype . '"><a class="button" href="' . $link . '" target="' . $target . '">' . do_shortcode( $showcontent ) . '</a></div>';

		return $content;
	}
	/**
	 * Replace Shortcode with Custom Content
	 *
	 * @package WP Shortcodes
	 * @since 3.0.0
	 */
	public function ww_vcsc_button( $atts, $content ) {

		// content to replace with your content.
		$content .= '<div class="ww-vcsc-button-container">
		<a href="' . $link . '" class="ww-vcsc-button orange large"><span>' . __( 'Button', 'wwvcsc' ) . '</span></a></div>';

		return $content;
	}

	/**
	 * Adding Hooks
	 *
	 * @package WP Shortcodes
	 * @since 3.0.0
	 */
	public function add_hooks() {

		// replace shortcodes with custom content or HTML.
		add_shortcode( 'ww_vcsc_boxes', array( $this, 'ww_vcsc_boxes' ) );
		add_shortcode( 'ww_vcsc_button', array( $this, 'ww_vcsc_button' ) );
	}
}
