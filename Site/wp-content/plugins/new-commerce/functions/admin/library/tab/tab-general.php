<?php
	/* TAB - GENERAL */

	// adds all the controls for the General tab
	function ncm_tab_general_add_settings() {
		add_settings_section("ncm_section_tab_general_1", "", "ncm_tab_general_section_1_text", "ncm-page-custom-settings");
		add_settings_section("ncm_section_tab_general_2", "", "ncm_tab_general_section_2_text", "ncm-page-custom-settings");
		add_settings_section("ncm_section_tab_general_3", "", "ncm_tab_general_section_3_text", "ncm-page-custom-settings");
		add_settings_section("ncm_section_tab_general_4", "", "ncm_tab_general_section_4_text", "ncm-page-custom-settings");
		add_settings_section("ncm_section_tab_general_5", "", "ncm_tab_general_section_5_text", "ncm-page-custom-settings");
		$sizeText = 50;
		
		// SECTION 1
		// ----------------------------------------------
		// -- Follow Profile
		// ----------------------------------------------
		// Text Facebook
		$args = array (
			"handle" 	=> "ncm_profile_facebook"
		,	"type"		=> "text"
		,	"index"		=> "profile_facebook"
		,	"size"		=> $sizeText
		,	"label_for"	=> "ncm_profile_facebook"
		);
		add_settings_field($args["handle"], sprintf(__("%s Profile", NCM_I18N_DOMAIN), "Facebook"), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_general_1", $args);
		
		// Text Twitter
		$args = array (
			"handle" 	=> "ncm_profile_twitter"
		,	"type"		=> "text"
		,	"index"		=> "profile_twitter"
		,	"size"		=> $sizeText
		,	"label_for"	=> "ncm_profile_twitter"
		);
		add_settings_field($args["handle"], sprintf(__("%s Profile", NCM_I18N_DOMAIN), "Twitter"), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_general_1", $args);
		
		// Text Google+
		$args = array (
			"handle" 	=> "ncm_profile_google_plus"
		,	"type"		=> "text"
		,	"index"		=> "profile_google_plus"
		,	"size"		=> $sizeText
		,	"label_for"	=> "ncm_profile_google_plus"
		);
		add_settings_field($args["handle"], sprintf(__("%s Profile", NCM_I18N_DOMAIN), "Google+"), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_general_1", $args);
		
		// Text LinkedIn
		$args = array (
			"handle" 	=> "ncm_profile_linkedin"
		,	"type"		=> "text"
		,	"index"		=> "profile_linkedin"
		,	"size"		=> $sizeText
		,	"label_for"	=> "ncm_profile_linkedin"
		);
		add_settings_field($args["handle"], sprintf(__("%s Profile", NCM_I18N_DOMAIN), "LinkedIn"), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_general_1", $args);
		
		// Text Instagram
		$args = array (
			"handle" 	=> "ncm_profile_instagram"
		,	"type"		=> "text"
		,	"index"		=> "profile_instagram"
		,	"size"		=> $sizeText
		,	"label_for"	=> "ncm_profile_instagram"
		);
		add_settings_field($args["handle"], sprintf(__("%s Profile", NCM_I18N_DOMAIN), "Instagram"), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_general_1", $args);
		
		// Text Pinterest
		$args = array (
			"handle" 	=> "ncm_profile_pinterest"
		,	"type"		=> "text"
		,	"index"		=> "profile_pinterest"
		,	"size"		=> $sizeText
		,	"label_for"	=> "ncm_profile_pinterest"
		);
		add_settings_field($args["handle"], sprintf(__("%s Profile", NCM_I18N_DOMAIN), "Pinterest"), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_general_1", $args);
		
		// Text RSS
		$rssHandle = "ncm_profile_rss";
		$rssDefault = get_bloginfo_rss("rss2_url");
		$args = array (
			"handle" 			=> $rssHandle
		,	"type"				=> "text"
		,	"index"				=> "profile_rss"
		,	"size"				=> $sizeText
		,	"label_for"			=> $rssHandle
		,	"second_td_output"	=> ("<input type='button' id='" . $rssHandle . "_default' value='" . __("Default", NCM_I18N_DOMAIN) . "' class='button-secondary' />")
		,	"js"				=>
			"jQuery(document).ready(function($) {
				$('#" . $rssHandle . "_default').click(function() {
					$('#$rssHandle').val('$rssDefault');
				});
			});"
		);
		add_settings_field($args["handle"], "RSS", "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_general_1", $args);
		
		// SECTION 2
		// ----------------------------------------------
		// -- Uploads
		// ----------------------------------------------
		// Favicon
		$args = array (
			"handle" 			=> "ncm_favicon"
		,	"type"				=> "upload"
		,	"index"				=> "favicon"
		,	"label_for"			=> "ncm_favicon"
		,	"second_td_output"	=> ("<p><em>" . __("Upload an image to serve as a Favicon for your blog.", NCM_I18N_DOMAIN) . "</em></p>")
		);
		add_settings_field($args["handle"], (__("Favicon", NCM_I18N_DOMAIN) . "<p><small><em>" . __("If you don't upload a favicon, a default one will be used instead", NCM_I18N_DOMAIN) . ".</em></small></p>"), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_general_2", $args);
			
		// Favicon preview
		$args = array (
			"handle" 		=> "ncm_favicon_preview"
		,	"type"			=> "upload_preview"
		,	"index"			=> "favicon"
		,	"default"		=> NCM_FAVICON_URL
		,	"label_for"		=> "ncm_favicon_preview"
		);
		add_settings_field($args["handle"], __("Favicon preview", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_general_2", $args);
		
		// Custom Logo Link
		$args = array (
			"type"			=> "hyperlink"
		,	"hyp_href"		=> "?page=custom-header"
		,	"hyp_text"		=> __("Upload a custom Logo", NCM_I18N_DOMAIN)
		);
		add_settings_field("ncm_custom_header_link", (__("Logo", NCM_I18N_DOMAIN) . "<p><small><em>" . __("Upload a custom image to your header logo area", NCM_I18N_DOMAIN) . ".</em></small></p>"), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_general_2", $args);
		
		// Custom Background Link
		$args = array (
			"type"			=> "hyperlink"
		,	"hyp_href"		=> "?page=custom-background"
		,	"hyp_text"		=> __("Upload a custom Background image", NCM_I18N_DOMAIN)
		);
		add_settings_field("ncm_custom_background_link", (__("Background", NCM_I18N_DOMAIN) . "<p><small><em>" . __("Upload a custom image to the background of the shop", NCM_I18N_DOMAIN) . ".</em></small></p>"), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_general_2", $args);
		
		// SECTION 3
		// ----------------------------------------------
		// -- Color Schemes
		// ----------------------------------------------
		// Theme color
		$args = array (
			"handle" 			=> "ncm_color_theme"
		,	"type"				=> "colorpicker"
		,	"index"				=> "color_theme"
		,	"label_for"			=> "ncm_color_theme"
		,	"default"			=> NCM_ADM_COLOR_DEFAULT
		,	"size"				=> 8
		,	"second_td_output"	=> ("<p><em>" . __("Click on the first textfield to choose the color", NCM_I18N_DOMAIN) . ".</em></small></p>")
		);
		add_settings_field($args["handle"], __("Color", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_general_3", $args);
		
		// SECTION 4
		// ----------------------------------------------
		// -- Fonts
		// ----------------------------------------------
		// Primary
		$args = array (
			"handle" 			=> "ncm_font_1"
		,	"type"				=> "font"
		,	"index"				=> "font_1"
		,	"label_for"			=> "ncm_font_1"
		,	"default"			=> NCM_FONT_1_DEFAULT
		,	"default_font_name"	=> "Oswaldbook"
		,	"second_td_output"	=> ("<p><em>" . __("Select the primary font style for the theme", NCM_I18N_DOMAIN) . ".</em></small></p>")
		);
		add_settings_field($args["handle"], __("Primary Font", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_general_4", $args);
		
		// Secondary
		$args = array (
			"handle" 			=> "ncm_font_2"
		,	"type"				=> "font"
		,	"index"				=> "font_2"
		,	"label_for"			=> "ncm_font_2"
		,	"default"			=> NCM_FONT_2_DEFAULT
		,	"default_font_name"	=> "Missionscript"
		,	"second_td_output"	=> ("<p><em>" . __("Select the secondary font style for the theme", NCM_I18N_DOMAIN) . ".</em></small></p>")
		);
		add_settings_field($args["handle"], __("Secondary Font", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_general_4", $args);
		
		// General Text
		$args = array (
			"handle" 			=> "ncm_font_general_text"
		,	"type"				=> "font"
		,	"index"				=> "font_general_text"
		,	"label_for"			=> "ncm_font_general_text"
		,	"default"			=> NCM_FONT_GENERAL_TEXT_DEFAULT
		,	"default_font_name"	=> "Arial"
		,	"second_td_output"	=> ("<p><em>" . __("Select the general text font style for the theme", NCM_I18N_DOMAIN) . ".</em></small></p>")
		);
		add_settings_field($args["handle"], __("General Text Font", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_general_4", $args);
		
		// SECTION 5
		// ----------------------------------------------
		// -- General Features
		// ----------------------------------------------
		$second_td_output_raw = __("Enable / Disable %s", NCM_I18N_DOMAIN);
		$second_td_output = "<p><em>" . sprintf($second_td_output_raw, "") . "</em></p>";
		
		// Fixed menu on scroll
		$args = array (
			"handle" 			=> "ncm_fixed_menu_on_scroll"
		,	"type"				=> "checkbox"
		,	"index"				=> "fixed_menu_on_scroll"
		,	"label_for"			=> "ncm_fixed_menu_on_scroll"
		,	"default"			=> 0
		,	"second_td_output"	=> $second_td_output
		);
		add_settings_field($args["handle"], __("Fixed menu on scroll", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_general_5", $args);

		// Customer Support
		$args = array (
			"handle" 			=> "ncm_customer_support"
		,	"type"				=> "checkbox"
		,	"index"				=> "customer_support"
		,	"label_for"			=> "ncm_customer_support"
		,	"default"			=> 0
		,	"second_td_output"	=> $second_td_output
		);
		add_settings_field($args["handle"], __("Header Customer Support", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_general_5", $args);
	}
	
	// the text output for the 1st section
	function ncm_tab_general_section_1_text() {
		echo '<div class="postbox">';
		echo 	"<h3 class='box-title'>" . __("Follow Profile Buttons", NCM_I18N_DOMAIN) . "</h3>";
		echo	"<div class='box-description'>";
		echo 		"<p>" . __("Customize the links of your profiles", NCM_I18N_DOMAIN) . ":</p>";
		echo 		"<p><small><em>" . __("Note that you can set a profile to empty, so it will not appear on your blog", NCM_I18N_DOMAIN) . ".</em></small></p>";
		echo	"</div>";
	}
	
	// the text output for the 2nd section
	function ncm_tab_general_section_2_text() {
		echo "</div>";
		echo '<div class="postbox">';
		echo 	"<h3 class='box-title'>" . __("Uploads", NCM_I18N_DOMAIN) . "</h3>";
		echo	"<div class='box-description'>";
		echo 		"<p>" . __("Upload custom assets to your blog", NCM_I18N_DOMAIN) . ":</p>";
		echo	"</div>";
	}
	
	// the text output for the 3rd section
	function ncm_tab_general_section_3_text() {
		echo "</div>";
		echo '<div class="postbox">';
		echo 	"<h3 class='box-title'>" . __("Color Schemes", NCM_I18N_DOMAIN) . "</h3>";
		echo	"<div class='box-description'>";
		echo 		"<p>" . __("Choose which color scheme the theme will use", NCM_I18N_DOMAIN) . ":</p>";
		echo	"</div>";
	}
	
	// the text output for the 4th section
	function ncm_tab_general_section_4_text() {
		echo "</div>";
		echo '<div class="postbox">';
		echo 	"<h3 class='box-title'>" . __("Font Styles", NCM_I18N_DOMAIN) . "</h3>";
		echo	"<div class='box-description'>";
		echo 		"<p>" . __("Choose which font styles the theme will use", NCM_I18N_DOMAIN) . ":</p>";
		echo	"</div>";
	}
	
	// the text output for the 5th section
	function ncm_tab_general_section_5_text() {
		echo "</div>";
		echo '<div class="postbox">';
		echo 	"<h3 class='box-title'>" . __("General Features", NCM_I18N_DOMAIN) . "</h3>";
		echo	"<div class='box-description'>";
		echo 		"<p>" . __("Customize which features should be active on both your shop and blog", NCM_I18N_DOMAIN) . ":</p>";
		echo	"</div>";
	}
	
	// validate the input for the General tab
	function ncm_tab_general_validate($input) {
		// SECTION 1
		$return["profile_facebook"] = esc_url_raw($input["profile_facebook"]);
		$return["profile_twitter"] = esc_url_raw($input["profile_twitter"]);
		$return["profile_google_plus"] = esc_url_raw($input["profile_google_plus"]);
		$return["profile_flickr"] = esc_url_raw($input["profile_flickr"]);
		$return["profile_linkedin"] = esc_url_raw($input["profile_linkedin"]);
		$return["profile_instagram"] = esc_url_raw($input["profile_instagram"]);
		$return["profile_pinterest"] = esc_url_raw($input["profile_pinterest"]);
		$return["profile_rss"] = esc_url_raw($input["profile_rss"]);
		
		// SECTION 2
		$return["favicon"] = ncm_process_favicon($input);
	
		// SECTION 3
		$color = ((!empty($input["color_theme"])) ? sanitize_text_field($input["color_theme"]) : NCM_ADM_COLOR_DEFAULT);
		$return["color_theme"] = clean_color($color);
		
		// SECTION 4
		$return["font_1"] = sanitize_text_field($input["font_1"]);
		$return["font_2"] = sanitize_text_field($input["font_2"]);
		$return["font_general_text"] = sanitize_text_field($input["font_general_text"]);
		
		// SECTION 5
		$return["fixed_menu_on_scroll"] = sanitize_text_field($input["fixed_menu_on_scroll"]);
		$return["customer_support"] = sanitize_text_field($input["customer_support"]);

		return $return;
	}
	
	// processes the favicon input on the validation
	function ncm_process_favicon($input) {
		global $ncm_options_general;
		
		$submit = !empty($input["submit"]);
		$reset = !empty($input["reset"]);
		$delete_logo = !empty($input["favicon_delete_logo_button"]);
	
		if($submit) {
			if($ncm_options_general["favicon"] != $input["favicon"] && !empty($ncm_options_general["favicon"])) {
				ncm_delete_image($ncm_options_general["favicon"]);
			}
	
			$return["favicon"] = sanitize_text_field($input["favicon"]);
		}
		else if($reset) {
			ncm_delete_image($ncm_options_general["favicon"]);
			$return["favicon"] = NCM_FAVICON_URL;
		}
		else if($delete_logo) {
			ncm_delete_image($ncm_options_general["favicon"]);
			$return["favicon"] = "";
		}
		
		return $return["favicon"];
	}
?>