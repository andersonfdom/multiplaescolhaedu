<?php
	/* TAB - FRONT PAGE */
	
	// adds all the controls for the Front Page tab
	function ncm_tab_front_page_add_settings() {
		add_settings_section("ncm_section_tab_front_page_1", "", "ncm_tab_front_page_section_1_text", "ncm-page-custom-settings");
		add_settings_section("ncm_section_tab_front_page_2", "", "ncm_tab_front_page_section_2_text", "ncm-page-custom-settings");
		
		// SECTION 1
		// ----------------------------------------------
		// -- Products Total
		// ----------------------------------------------
		$sizeSpinner = 10;
		
		// Slider total products
		$args = array (
			"handle" 			=> "ncm_products_sliders_count"
		,	"type"				=> "spinner"
		,	"index"				=> "products_sliders_count"
		,	"size"				=> $sizeSpinner
		,	"label_for"			=> "ncm_products_sliders_count"
		,	"default"			=> NCM_TOTAL_PRODUCTS_SLIDERS
		,	"second_td_output"	=> "<p><em>" . __("Products which appears inside a slider (like Recommeded Products or Featured Products)", NCM_I18N_DOMAIN) . "</em></p>"
		);
		add_settings_field($args["handle"], __("Sliders Total Products", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_front_page_1", $args);
		
		// SECTION 2
		// ----------------------------------------------
		// -- Modules
		// ----------------------------------------------
		$second_td_output = "<p><em>" . __("Enable / Disable", NCM_I18N_DOMAIN) . "</em></p>";
		
		// Testmonial box
		$args = array (
			"handle" 			=> "ncm_enable_testimonial"
		,	"type"				=> "checkbox"
		,	"index"				=> "enable_testimonial"
		,	"label_for"			=> "ncm_enable_testimonial"
		,	"default"			=> 1
		,	"second_td_output"	=> $second_td_output
		);
		add_settings_field($args["handle"], __("Testmonial Box", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_front_page_2", $args);
		
		// Last Comments box
		$args = array (
			"handle" 			=> "ncm_enable_last_comments"
		,	"type"				=> "checkbox"
		,	"index"				=> "enable_last_comments"
		,	"label_for"			=> "ncm_enable_last_comments"
		,	"default"			=> 1
		,	"second_td_output"	=> $second_td_output
		);
		add_settings_field($args["handle"], __("Last Comments Box", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_front_page_2", $args);
	}
	
	// the text output for the 1st section
	function ncm_tab_front_page_section_1_text() {
		echo '<div class="postbox">';
		echo 	"<h3 class='box-title'>" . __("Front Page Total Products", NCM_I18N_DOMAIN) . "</h3>";
		echo	"<div class='box-description'>";
		echo 		"<p>" . __("Customize how many products will appear on the Front Page", NCM_I18N_DOMAIN) . ":</p>";
		echo	"</div>";
	}
	
	// the text output for the 2nd section
	function ncm_tab_front_page_section_2_text() {
		echo "</div>";
		echo '<div class="postbox">';
		echo 	"<h3 class='box-title'>" . __("Front Page Features", NCM_I18N_DOMAIN) . "</h3>";
		echo	"<div class='box-description'>";
		echo 		"<p>" . __("Customize which features should be active on your Front Page", NCM_I18N_DOMAIN) . ":</p>";
		echo	"</div>";
	}
	
	// validate the input for the Front Page tab
	function ncm_tab_front_page_validate($input) {
		// SECTION 1
		$return["products_sliders_count"] = sanitize_text_field($input["products_sliders_count"]);
		
		// SECTION 2
		$return["enable_testimonial"] = sanitize_text_field($input["enable_testimonial"]);
		$return["enable_last_comments"] = sanitize_text_field($input["enable_last_comments"]);
		
		return $return;
	}
?>