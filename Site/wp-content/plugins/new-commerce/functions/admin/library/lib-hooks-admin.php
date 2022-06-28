<?php
	/* LIBRARY - HOOKS ADMIN */

	// handles the admin's notices
	function ncm_admin_notices(){
		ncm_output_notice_admin_backend();
		//ncm_output_notice_like_us();
	}
	
	// outputs the admin's backend notice
	function ncm_output_notice_admin_backend() {
		if(isset($_GET["page"]) && $_GET["page"] == "ncm-page-custom-settings" && current_user_can("manage_options")) {
			if((isset($_GET["settings-updated"]) && $_GET["settings-updated"])) {
				 echo 
				 '<div id="ncm-settings-notice" class="updated">
					 <p><strong>' . sprintf(__("%s settings saved!", NCM_I18N_DOMAIN), NCM_NAME_TEXT) . '</strong></p>
				 </div>';
			 }
			 else if((isset($_GET["settings-updated"]) && !$_GET["settings-updated"])){
				 echo 
				 '<div id="ncm-settings-notice" class="error">
					 <p><strong>' . sprintf(__("An error ocurred! %s settings couldn't be saved!", NCM_I18N_DOMAIN), NCM_NAME_TEXT) . '</strong></p>
				 </div>';
			 }
		}
	}
	
	// outputs the like us notice
	function ncm_output_notice_like_us() {
		if(current_user_can("manage_options")) {
			global $current_user ;
			$user_id = $current_user->ID;
	
			if(!get_user_meta($user_id, "ncm_ignore_notice_like_us")) {
				echo "<div class='updated'><p>";
				echo __("Please, if you have liked this theme, remember to motivate us with your like / rate, here:", NCM_I18N_DOMAIN) . "&nbsp;<a href='http://www.mojo-themes.com/item/new-commerce-responsive-e-commerce-theme/'>New-Commerce</a>";
				echo sprintf("<a style='float: right;' href='?ignore-like-us=0'>%1s</a>", __("Dismiss this message permanently", NCM_I18N_DOMAIN));
				echo "</p></div>";
			}
		}
	}

	// ignores the like us notice
	function ncm_ignore_notice_like_us() {
		if(current_user_can("manage_options")) {
			global $current_user;
			$user_id = $current_user->ID;
				
			if(isset($_GET["ignore-like-us"]) && "0" == $_GET["ignore-like-us"]) {
				 add_user_meta($user_id, "ncm_ignore_notice_like_us", "true", true);
			}
		}
	}
	
	// includes admin's scripts and styles
	function ncm_load_theme_assets() {
		if(!wp_style_is("ncm-admin-style")) {
			wp_register_style("ncm-admin-style", (get_template_directory_uri() . "/css/style-ncm-panel.css"));
			wp_enqueue_style("ncm-admin-style");
		}
		
		if(!wp_script_is("jquery")) {
			wp_enqueue_script("jquery");
		}

        if(!wp_script_is("new-commerce-import") && ncm_is_current_tab_import()) {
            wp_register_script("new-commerce-import", get_template_directory_uri() . '/functions/importer/new-commerce-import.js', false, '1.0.0');
            wp_enqueue_script("new-commerce-import");
        }
	}
	
	// block to process input/output for the admin panel
	function ncm_add_admin_page() {
		add_admin_menu_separator(53.1);
		add_menu_page(sprintf(__("%s Custom Settings Page", NCM_I18N_DOMAIN), NCM_NAME_TEXT), NCM_NAME_TEXT, "manage_options", "ncm-page-custom-settings", "ncm_admin_page", "div", 54.2);
		add_submenu_page("ncm-page-custom-settings", __("General", NCM_I18N_DOMAIN), __("General", NCM_I18N_DOMAIN), "manage_options", "admin.php?page=ncm-page-custom-settings&tab=general");
		add_submenu_page("ncm-page-custom-settings", __("Front Page", NCM_I18N_DOMAIN), __("Front Page", NCM_I18N_DOMAIN), "manage_options", "admin.php?page=ncm-page-custom-settings&tab=front-page");
		add_submenu_page("ncm-page-custom-settings", __("Shop", NCM_I18N_DOMAIN), __("Shop", NCM_I18N_DOMAIN), "manage_options", "admin.php?page=ncm-page-custom-settings&tab=shop");
		add_submenu_page("ncm-page-custom-settings", __("Blog", NCM_I18N_DOMAIN), __("Blog", NCM_I18N_DOMAIN), "manage_options", "admin.php?page=ncm-page-custom-settings&tab=blog");
		add_submenu_page("ncm-page-custom-settings", __("Integration", NCM_I18N_DOMAIN), __("Integration", NCM_I18N_DOMAIN), "manage_options", "admin.php?page=ncm-page-custom-settings&tab=integration");
        add_submenu_page("ncm-page-custom-settings", __("Import", NCM_I18N_DOMAIN), __("Import", NCM_I18N_DOMAIN), "manage_options", "admin.php?page=ncm-page-custom-settings&tab=import");
		add_submenu_page("ncm-page-custom-settings", __("Help", NCM_I18N_DOMAIN), __("Help", NCM_I18N_DOMAIN), "manage_options", "admin.php?page=ncm-page-custom-settings&tab=help");
	}
	
	// inits the admin page
	function ncm_admin_page_init() {
		ncm_db_options_init();
		ncm_uploader_init();
		ncm_tabs_init();
		
		switch(ncm_admin_get_current_tab()) {
			default:
			case NCM_ADM_TAB_GENERAL: ncm_tab_general_add_settings();
			break;
			
			case NCM_ADM_TAB_FRONT_PAGE: ncm_tab_front_page_add_settings();
			break;
			
			case NCM_ADM_TAB_SHOP: ncm_tab_shop_add_settings();
			break;
			
			case NCM_ADM_TAB_BLOG: ncm_tab_blog_add_settings();
			break;
			
			case NCM_ADM_TAB_INTEGRATION: ncm_tab_others_add_settings();
			break;

            case NCM_ADM_TAB_IMPORT: ncm_tab_import_add_settings();
            break;
			
			case NCM_ADM_TAB_HELP: ncm_tab_help_add_settings();
			break;
		}
	}
	
	// inits the post types
	function ncm_init() {
		ncm_init_post_types();
	}
	
	// saves the metadata from the post type metaboxes
	function ncm_save_meta($post_id, $post) {
		// Is the user allowed to edit the post or page?
		if (!current_user_can("edit_post", $post->ID))
			return $post->ID;
		
		switch($post->post_type) {
			case "testimonial": {
				ncm_save_meta_testimonial($post_id, $post);
			}
			break;
			
			case "contact": {
				ncm_save_meta_contact($post_id, $post);
			}
			break;
				
			default: return;
		}
	}
	
	// saves the data for the testimonial post type
	function ncm_save_meta_testimonial($post_id, $post) {
		if (!isset($_POST["_post_testmonial_nonce"]) || (isset($_POST["_post_testmonial_nonce"]) && !wp_verify_nonce($_POST["_post_testmonial_nonce"], admin_url()))) {
			return $post->ID;
		}

		$testmonial_meta["_testmonial_author"] = $_POST["_testmonial_author"];
		$testmonial_meta["_testmonial_date"] = $_POST["_testmonial_date"];
		
		// Add values of $testmonial_meta as custom fields
		foreach($testmonial_meta as $key => $value) {
			if($post->post_type == "revision") 
				return;
				
			$value = implode(",", (array)$value);
			if(get_post_meta($post->ID, $key, FALSE)) {
				update_post_meta($post->ID, $key, $value);
			} 
			else {
				add_post_meta($post->ID, $key, $value);
			}
			
			if(!$value) {
				delete_post_meta($post->ID, $key);
			}
		}
	}
	
	// saves the data for the contact post type
	function ncm_save_meta_contact($post_id, $post) {
		if (!isset($_POST["_post_contact_nonce"]) || (isset($_POST["_post_contact_nonce"]) && !wp_verify_nonce($_POST["_post_contact_nonce"], admin_url()))) {
			return $post->ID;
		}

		$contact_meta["_contact_receiver"] = $_POST["_contact_receiver"];
		$contact_meta["_contact_email_body"] = $_POST["_contact_email_body"];
		$contact_meta["_contact_align_send_button"] = $_POST["_contact_align_send_button"];
		$contact_meta["_contact_success_message"] = $_POST["_contact_success_message"];
		$contact_meta["_contact_error_message_bad_format"] = $_POST["_contact_error_message_bad_format"];
		$contact_meta["_contact_error_message_not_sent"] = $_POST["_contact_error_message_not_sent"];
		$contact_meta["_contact_error_message_missing_content"] = $_POST["_contact_error_message_missing_content"];
		$contact_meta["_contact_use"] = $_POST["_contact_use"];
		
		// Add values of $contact_meta as custom fields
		foreach($contact_meta as $key => $value) {
			if($post->post_type == "revision") 
				return;
				
			$value = implode(",", (array)$value);
			if(get_post_meta($post->ID, $key, FALSE)) {
				update_post_meta($post->ID, $key, $value);
			} 
			else {
				add_post_meta($post->ID, $key, $value);
			}
			
			if(!$value) {
				delete_post_meta($post->ID, $key);
			}
		}
		
		// get all the contact configs
		$args = array(
			"post_type" => "contact"
		);
		$contacts = new WP_Query($args);			
		
		// Updates others contact posts "active" meta option
		if(isset($contact_meta["_contact_use"]) && $contact_meta["_contact_use"]) {
			foreach($contacts->posts as $key => $contact) {
				// not the current contact post
				if($contact->ID != $post->ID) {
					update_post_meta($contact->ID, "_contact_use", 0);
				}
			}
		}
	}
?>