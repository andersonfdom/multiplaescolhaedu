<?php
	/* LIBRARY - ASSETS */
	
	// loads all necessary assets for the datepicker
	function ncm_load_datepicker_assets() {
		if(!wp_style_is("jquery-ui-style")) {
			wp_register_style("jquery-ui-style", (get_template_directory_uri() . "/css/jquery-ui/jquery-ui.css"));
			wp_enqueue_style("jquery-ui-style");
		}
		
		if(!wp_script_is("jquery-ui-datepicker")) {
			wp_enqueue_script("jquery-ui-datepicker");
		}
	}
	
	// loads all necessary assets for the jQuery UI spinner
	function ncm_load_spinner_ui_assets() {
		if(!wp_style_is("jquery-ui-style")) {
			wp_register_style("jquery-ui-style", (get_template_directory_uri() . "/css/jquery-ui/jquery-ui.css"));
			wp_enqueue_style("jquery-ui-style");
		}
		
		if(!wp_script_is("jquery-ui-spinner")) {
			wp_enqueue_script("jquery-ui-spinner");
		}
	}
	
	// loads all necessary assets for the accordion
	function ncm_load_accordion_assets() {
		if(!wp_script_is("jquery-ui-accordion")) {
			wp_enqueue_script("jquery-ui-accordion");
		}
	}
	
	// loads all necessary assets for the uploader
	function ncm_load_uploader_assets() {
		if(!wp_script_is("thickbox")) {
			wp_enqueue_script("thickbox");
		}
		if(!wp_style_is("thickbox")) {
			wp_enqueue_style("thickbox");
		}
		if(!wp_script_is("media-upload")) {
			wp_enqueue_script("media-upload");
		}
		if(!wp_script_is("ncm-upload")) {
			wp_register_script("ncm-upload", get_template_directory_uri() . "/scripts/upload.js", array("jquery", "media-upload", "thickbox"));
			wp_enqueue_script("ncm-upload");
		}
	}
	
	// loads all necessary assets for the colorpicker
	function ncm_load_colorpicker_assets() {
		if(!wp_style_is("ncm-eye-style")) {
			wp_register_style("ncm-eye-style", (get_template_directory_uri() . "/scripts/eye-cp/css/colorpicker.css"));
			wp_enqueue_style("ncm-eye-style");
		}
		if(!wp_script_is("ncm-eye")) {
			wp_register_script("ncm-eye", (get_template_directory_uri() . "/scripts/eye-cp/js/eye.js"), array("jquery"));
			wp_enqueue_script("ncm-eye");
		}
		if(!wp_script_is("ncm-eye-colorpicker")) {
			wp_register_script("ncm-eye-colorpicker", (get_template_directory_uri() . "/scripts/eye-cp/js/colorpicker.js"), array("jquery"));
			wp_enqueue_script("ncm-eye-colorpicker");
		}
	}
	
	// loads all necessary assets for the Google maps
	function ncm_load_gmaps_assets() {
		global $ncm_options_shop;

		$key = $ncm_options_shop["shop_map_key"];

		echo ("<script src='" . (isset($_SERVER["HTTPS"]) ? 'https' : 'http') . "://maps.googleapis.com/maps/api/js?" . ((ncm_isset_and_not_empty($key)) ? ('key=' . $key . '&amp;') : '') . "sensor=false'></script>");
	}
?>