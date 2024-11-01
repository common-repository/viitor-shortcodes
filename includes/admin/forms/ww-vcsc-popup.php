<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcode UI
 *
 * This is the code for the pop up editor, which shows up when an user clicks
 * on the fb review engine icon within the WordPress editor.
 *
 * @package WP Shortcodes
 * @since 3.0.0
 */

?>

<div class="ww-vcsc-popup-content">

	<div class="ww-vcsc-header-popup">
		<div class="ww-vcsc-popup-header-title"><?php _e( 'Add a Shortcodes', 'wwvcsc' ); ?></div>
		<div class="ww-vcsc-popup-close"><a href="javascript:void(0);" class="ww-vcsc-popup-close-button"><img src="<?php echo WW_WPSC_IMG_URL; ?>/tb-close.png"></a></div>
	</div>
	<div class="ww-vcsc-popup-error"><?php _e( 'Select a Shortcode', 'wwvcsc' ); ?></div>
	<div class="ww-vcsc-popup-container">
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label><?php _e( 'Select a Shortcode', 'wwvcsc' ); ?></label>
					</th>
					<td>
						<select id="ww_vcsc_shortcode">
							<option value=""><?php _e( '--Select Shortcode--', 'wwvcsc' ); ?></option>
							<option value="button"><?php _e( 'Button', 'wwvcsc' ); ?></option>
							<option value="box"><?php _e( 'Box', 'wwvcsc' ); ?></option>
						</select>
					</td>
				</tr>
			</tbody>
		</table>

		<div id="ww_vcsc_box_type" class="ww-vcsc-shortcodes-options">
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row">
							<label for="ww_vcsc_box_type_select"><?php _e( 'Select a Box Type :', 'wwvcsc' ); ?></label>
						</th>
						<td>
							<select id="ww_vcsc_box_type_select">
								<option value=""><?php _e( '--Select Box Type--', 'wwvcsc' ); ?></option>
								<option value="boxstandard"><?php _e( 'Standard', 'wwvcsc' ); ?></option>
								<option value="boxinfo"><?php _e( 'Info', 'wwvcsc' ); ?></option>
								<option value="boxwarning"><?php _e( 'Warning', 'wwvcsc' ); ?></option>
								<option value="boxdownload"><?php _e( 'Download', 'wwvcsc' ); ?></option>
								<option value="boxerror"><?php _e( 'Error', 'wwvcsc' ); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="ww_vcsc_box_content"><?php _e( 'Enter Content :', 'wwvcsc' ); ?></label>
						</th>
						<td>
							<textarea id="ww_vcsc_box_content" rows="7" cols="40"></textarea>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!--.ww-vcsc-popup-box-type-->
		<div id="ww_vcsc_insert_container">
			<input type="button" class="button-secondary" id="ww_vcsc_insert_shortcode" value="<?php _e( 'Insert Shortcode', 'wwvcsc' ); ?>">
		</div>

	</div>

</div><!--.ww-vcsc-popup-content-->
<div class="ww-vcsc-popup-overlay"></div><!--.ww-vcsc-popup-overlay-->
