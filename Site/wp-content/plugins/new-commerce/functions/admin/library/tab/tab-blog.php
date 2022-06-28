<?php
	/* TAB - BLOG */

	// adds all the controls for the Blog tab
	function ncm_tab_blog_add_settings() {
		add_settings_section("ncm_section_tab_blog_1", "", "ncm_tab_blog_section_1_text", "ncm-page-custom-settings");
		add_settings_section("ncm_section_tab_blog_2", "", "ncm_tab_blog_section_2_text", "ncm-page-custom-settings");
		add_settings_section("ncm_section_tab_blog_3", "", "ncm_tab_blog_section_3_text", "ncm-page-custom-settings");
		
		// SECTION 1
		// ----------------------------------------------
		// -- Sidebar Position
		// ----------------------------------------------
		// Left Align
		$args = array (
			"handle" 		=> "ncm_sidebar_position_left"
		,	"type"			=> "radio"
		,	"index"			=> "sidebar_position"
		,	"label_for"		=> "ncm_sidebar_position_left"
		,	"radio_pair"	=> 
			array (
				"text" 	=> __("Left Align", NCM_I18N_DOMAIN)
			,	"value"	=> NCM_ADM_SIDEBAR_POS_ALIGN_L
			)
		,	"default"		=> NCM_ADM_SIDEBAR_POS_ALIGN_R
		);
		add_settings_field($args["handle"], __("Sidebar Align Position", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_blog_1", $args);
		
		// Right Align
		$args = array (
			"handle" 		=> "ncm_sidebar_position_right"
		,	"type"			=> "radio"
		,	"index"			=> "sidebar_position"
		,	"label_for"		=> "ncm_sidebar_position_right"
		,	"radio_pair"	=> 
			array (
				"text" 	=> __("Right Align", NCM_I18N_DOMAIN)
			,	"value"	=> NCM_ADM_SIDEBAR_POS_ALIGN_R
			)
		,	"default"		=> NCM_ADM_SIDEBAR_POS_ALIGN_R
		);
		add_settings_field($args["handle"], "", "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_blog_1", $args);

		// SECTION 2
		// ----------------------------------------------
		// -- Posts Grid mode
		// ----------------------------------------------
		$sizeSpinner = 10;
		
		// Post grid call maximum characters
		$args = array (
			"handle" 			=> "ncm_post_grid_call_max_char"
		,	"type"				=> "spinner"
		,	"index"				=> "post_grid_call_max_char"
		,	"size"				=> $sizeSpinner
		,	"label_for"			=> "ncm_post_grid_call_max_char"
		,	"default"			=> 150
		,	"spinner_max"		=> 9999
		,	"spinner_min"		=> 1
		);
		add_settings_field($args["handle"], __("Post Call maximum characters", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_blog_2", $args);
		
		// Post grid overlay width
		$args = array (
			"handle" 			=> "ncm_post_grid_call_overlay_width"
		,	"type"				=> "spinner"
		,	"index"				=> "post_grid_call_overlay_width"
		,	"size"				=> $sizeSpinner
		,	"label_for"			=> "ncm_post_grid_call_overlay_width"
		,	"default"			=> 300
		,	"spinner_max"		=> 9999
		,	"spinner_min"		=> 1
		);
		add_settings_field($args["handle"], __("Overlay Width", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_blog_2", $args);
		
		// Post grid overlay height
		$args = array (
			"handle" 			=> "ncm_post_grid_call_overlay_height"
		,	"type"				=> "spinner"
		,	"index"				=> "post_grid_call_overlay_height"
		,	"size"				=> $sizeSpinner
		,	"label_for"			=> "ncm_post_grid_call_overlay_height"
		,	"default"			=> 300
		,	"spinner_max"		=> 9999
		,	"spinner_min"		=> 1
		);
		add_settings_field($args["handle"], __("Overlay Height", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_blog_2", $args);

		// SECTION 3
		// ----------------------------------------------
		// -- Blog Features
		// ----------------------------------------------
		$second_td_output_raw = __("Enable / Disable %s", NCM_I18N_DOMAIN);
		$second_td_output = "<p><em>" . sprintf($second_td_output_raw, "") . "</em></p>";

		// Grid posts on Index page
		$args = array (
			"handle" 			=> "ncm_grid_posts_on_index"
		,	"type"				=> "checkbox"
		,	"index"				=> "grid_posts_on_index"
		,	"label_for"			=> "ncm_grid_posts_on_index"
		,	"default"			=> 0
		,	"second_td_output"	=> $second_td_output
		);
		add_settings_field($args["handle"], __("Display posts on grid view", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_blog_3", $args);

		// "Copy This"
		$args = array (
			"handle" 			=> "ncm_enable_copy_post"
		,	"type"				=> "checkbox"
		,	"index"				=> "enable_copy_post"
		,	"label_for"			=> "ncm_enable_copy_post"
		,	"default"			=> 1
		,	"second_td_output"	=> $second_td_output
		);
		add_settings_field($args["handle"], __("Copy Post Box", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_blog_3", $args);

        // Enable sidebar on contact
        $args = array (
            "handle" 			=> "ncm_enable_sidebar_on_contact"
        ,	"type"				=> "checkbox"
        ,	"index"				=> "enable_sidebar_on_contact"
        ,	"label_for"			=> "ncm_enable_sidebar_on_contact"
        ,	"default"			=> 1
        ,	"second_td_output"	=> $second_td_output
        );
        add_settings_field($args["handle"], __("Enable the sidebar on the Contact page", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_blog_3", $args);

        // Enable sidebar on FAQ
        $args = array (
            "handle" 			=> "ncm_enable_sidebar_on_faq"
        ,	"type"				=> "checkbox"
        ,	"index"				=> "enable_sidebar_on_faq"
        ,	"label_for"			=> "ncm_enable_sidebar_on_faq"
        ,	"default"			=> 1
        ,	"second_td_output"	=> $second_td_output
        );
        add_settings_field($args["handle"], __("Enable the sidebar on the FAQ page", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_blog_3", $args);
    }
	
	// the text output for the 1st section
	function ncm_tab_blog_section_1_text() {
		echo '<div class="postbox">';
		echo 	"<h3 class='box-title'>" . __("Sidebar Position", NCM_I18N_DOMAIN) . "</h3>";
		echo	"<div class='box-description'>";
		echo 		"<p>" . __("Choose which side the blog's sidebar will be set to", NCM_I18N_DOMAIN) . ":</p>";
		echo	"</div>";
	}

	// the text output for the 2nd section
	function ncm_tab_blog_section_2_text() {
		echo "</div>";
		echo '<div class="postbox">';
		echo 	"<h3 class='box-title'>" . __("Grid Posts Features", NCM_I18N_DOMAIN) . "</h3>";
		echo	"<div class='box-description'>";
		echo 		"<p>" . __("Customize how the posts will be shown when the Blog is using grid view mode", NCM_I18N_DOMAIN) . ":</p>";
		echo	"</div>";
	}

	// the text output for the 3rd section
	function ncm_tab_blog_section_3_text() {
		echo "</div>";
		echo '<div class="postbox">';
		echo 	"<h3 class='box-title'>" . __("Blog Features", NCM_I18N_DOMAIN) . "</h3>";
		echo	"<div class='box-description'>";
		echo 		"<p>" . __("Customize which features should be active on your blog", NCM_I18N_DOMAIN) . ":</p>";
		echo	"</div>";
	}
	
	// validate the input for the Blog tab
	function ncm_tab_blog_validate($input) {
		// SECTION 1
		$return["sidebar_position"] = sanitize_text_field($input["sidebar_position"]);
		
		// SECTION 2
		$return["post_grid_call_max_char"] = sanitize_text_field($input["post_grid_call_max_char"]);
		$return["post_grid_call_overlay_width"] = sanitize_text_field($input["post_grid_call_overlay_width"]);
		$return["post_grid_call_overlay_height"] = sanitize_text_field($input["post_grid_call_overlay_height"]);
		
		// SECTION 3
		$return["grid_posts_on_index"] = sanitize_text_field($input["grid_posts_on_index"]);
		$return["enable_copy_post"] = sanitize_text_field($input["enable_copy_post"]);
        $return["enable_sidebar_on_contact"] = sanitize_text_field($input["enable_sidebar_on_contact"]);
		$return["enable_sidebar_on_faq"] = sanitize_text_field($input["enable_sidebar_on_faq"]);

		return $return;
	}
?>