jQuery(document).ready(function ($) {

	// Start Single Shortcode Start
	(function () {
		tinymce.create('tinymce.plugins.wwvcscsingleshortcode', {
			init: function (ed, url) {
				ed.addButton('wwvcscsingleshortcode', {
					title: 'My Single Shortcode',
					image: url + '/images/ww-vcsc-single.png',
					onclick: function () {
						// Send single shortcode
						tinymce.get('content').execCommand('mceInsertContent', false, '[ww_vcsc_button][/ww_vcsc_button]');
					}
				});
			},
			createControl: function (n, cm) {
				return null;
			},
		});

		tinymce.PluginManager.add('wwvcscsingleshortcode', tinymce.plugins.wwvcscsingleshortcode);
	})();
	// End Single Shortcode

	// Start Shortcodes Click
	(function () {
		tinymce.create('tinymce.plugins.wwvcscshortcodes', {
			init: function (ed, url) {
				ed.addButton('wwvcscshortcodes', {
					title: 'My Shortcodes List',
					image: url + '/images/ww-vcsc.png',
					onclick: function () {
						$('.ww-vcsc-popup-overlay, .ww-vcsc-popup-content').fadeIn();
						$('#ww_vcsc_shortcode, #ww_vcsc_box_type_select, #ww_vcsc_box_content').val('');
						$('.ww-vcsc-shortcodes-options').hide();
					}
				});
			},
			createControl: function (n, cm) {
				return null;
			},
		});

		tinymce.PluginManager.add('wwvcscshortcodes', tinymce.plugins.wwvcscshortcodes);
	})();

	// Close Popup
	$(document).on('click', '.ww-vcsc-popup-close-button, .ww-vcsc-popup-overlay', function () {
		$('.ww-vcsc-popup-overlay, .ww-vcsc-popup-content').fadeOut();
	});

	// Insert Shortcode
	$(document).off('click', '#ww_vcsc_insert_shortcode').on('click', '#ww_vcsc_insert_shortcode', function () {
		var shortcode = $('#ww_vcsc_shortcode').val();
		var shortcodestr = '';

		if (shortcode === '') {
			$('.ww-vcsc-popup-error').fadeIn();
			return false;
		} else {
			$('.ww-vcsc-popup-error').hide();

			switch (shortcode) {
				case 'button':
					shortcodestr = '[ww_vcsc_button][/ww_vcsc_button]';
					break;
				case 'box':
					var content = $('#ww_vcsc_box_content').val();
					var boxtype = $('#ww_vcsc_box_type_select').val();
					shortcodestr = '[ww_vcsc_boxes boxtype="' + boxtype + '" showcontent="' + content + '"][/ww_vcsc_boxes]';
					break;
				default:
					break;
			}

			// Insert shortcode
			tinymce.get('content').execCommand('mceInsertContent', false, shortcodestr);
			$('.ww-vcsc-popup-overlay, .ww-vcsc-popup-content').fadeOut();
		}
	});

	// Show Options Based on Shortcode Selection
	$('#ww_vcsc_shortcode').change(function () {
		var shortcode = $(this).val();
		$('.ww-vcsc-shortcodes-options').hide();

		if (shortcode === 'box') {
			$('#ww_vcsc_box_type').show();
		}
	});

});
