<?php
	/* TAB - IMPORT */

	// adds all the controls for the Integration tab
	function ncm_tab_import_add_settings() {
		add_settings_section("ncm_section_tab_import_1", "", "ncm_tab_import_section_1_text", "ncm-page-custom-settings");
    }
	
	// the text output for the 1st section
	function ncm_tab_import_section_1_text() {
		echo '<div class="postbox">';
		echo 	"<h3 class='box-title'>" . __("One-click Import", NCM_I18N_DOMAIN) . "</h3>";
		echo	"<div class='box-description'>";
		echo 		"<p>" . __("Import the theme's demo content to your installation (Wordpress and Woocommerce data)", NCM_I18N_DOMAIN) . ":</p>";
		echo	"</div>";
        echo    "<div class='box-description'>";
        echo        "<p class='import_message'></p>";
        echo    "</div>";
	}
	
	// validate the input for the Integration tab
	function ncm_tab_import_validate($input) {
		return $input;
	}
?>