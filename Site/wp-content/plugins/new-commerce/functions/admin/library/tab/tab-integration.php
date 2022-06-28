<?php
	/* TAB - OTHERS */

	// adds all the controls for the Integration tab
	function ncm_tab_others_add_settings() {
		add_settings_section("ncm_section_tab_integration_1", "", "ncm_tab_integration_section_1_text", "ncm-page-custom-settings");
		
		// SECTION 1
		// ----------------------------------------------
		// -- CSS
		// ----------------------------------------------
		// Custom CSS
		$args = array (
			"handle" 			=> "ncm_textarea_custom_css"
		,	"type"				=> "textarea"
		,	"index"				=> "textarea_custom_css"
		,	"label_for"			=> "ncm_textarea_custom_css"
		,	"textarea_rows"		=> 5
		,	"textarea_cols"		=> 80
		,	"second_td_output"	=> "<p><em>" . sprintf(__("Note that you can omit the %s tag", NCM_I18N_DOMAIN), "&lt;style&gt;&lt;/style&gt;") . "</em></p>"
		);
		add_settings_field($args["handle"], __("Custom CSS", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_integration_1", $args);
		
		
		// ----------------------------------------------
		// -- Header Code
		// ----------------------------------------------
		// Textarea Header Code
		$args = array (
			"handle" 			=> "ncm_textarea_header_code"
		,	"type"				=> "textarea"
		,	"index"				=> "textarea_header_code"
		,	"label_for"			=> "ncm_textarea_header_code"
		,	"textarea_rows"		=> 5
		,	"textarea_cols"		=> 80
		,	"second_td_output"	=> "<p><em>" . sprintf(__("Note that you can omit the %s tag", NCM_I18N_DOMAIN), "&lt;script&gt;&lt;/script&gt;") . "</em></p>"
		);
		add_settings_field($args["handle"], __("Custom Header Code", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_integration_1", $args);
		
		// ----------------------------------------------
		// -- Google Analytics
		// ----------------------------------------------
		// Textarea GA
		$args = array (
			"handle" 			=> "ncm_textarea_google_analytics"
		,	"type"				=> "textarea"
		,	"index"				=> "textarea_google_analytics"
		,	"label_for"			=> "ncm_textarea_google_analytics"
		,	"textarea_rows"		=> 5
		,	"textarea_cols"		=> 80
		,	"second_td_output"	=> "<p><em>" . sprintf(__("Note that you can omit the %s tag", NCM_I18N_DOMAIN), "&lt;script&gt;&lt;/script&gt;") . "</em></p>"
		);
		add_settings_field($args["handle"], "Google Analytics", "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_integration_1", $args);
	}
	
	// the text output for the 1st section
	function ncm_tab_integration_section_1_text() {
		echo '<div class="postbox">';
		echo 	"<h3 class='box-title'>" . __("Customized Code", NCM_I18N_DOMAIN) . "</h3>";
		echo	"<div class='box-description'>";
		echo 		"<p>" . __("On this page you can add some pieces of code to your Shop / Blog", NCM_I18N_DOMAIN) . ":</p>";
		echo	"</div>";
	}
	
	// validate the input for the Integration tab
	function ncm_tab_others_validate($input) {
		// SECTION 1
		$return["textarea_custom_css"] = $input["textarea_custom_css"];
		$return["textarea_header_code"] = $input["textarea_header_code"];
		$return["textarea_google_analytics"] = $input["textarea_google_analytics"];
		
		return $return;
	}
?>