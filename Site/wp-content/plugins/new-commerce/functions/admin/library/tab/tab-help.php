<?php
	/* TAB - HELP */

	// adds all the controls for the Help tab
	function ncm_tab_help_add_settings() {
		add_settings_section("ncm_section_tab_help_1", "", "ncm_tab_help_section_1_text", "ncm-page-custom-settings");
	}
	
	// the text output for the 1st section
	function ncm_tab_help_section_1_text() {
		if(!wp_style_is("ncm-help-style")) {
			wp_register_style("ncm-help-style", (get_template_directory_uri() . "/css/help-style.css"));
			wp_enqueue_style("ncm-help-style");
		}
		
		if(!wp_script_is("jquery")) {
			wp_enqueue_script("jquery");
		}
		
		global $ncm_admin_base_url;
		$ncm_admin_base_url = (get_template_directory_uri() . "/images/help/");

		get_template_part("help");			
	}
	
	// validate the input for the Help tab
	function ncm_tab_help_validate($input) {
		return $input;
	}
?>