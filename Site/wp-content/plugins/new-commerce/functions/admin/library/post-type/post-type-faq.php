<?php
	/* POST TYPE - FAQ */

	// register the faq post type
	function ncm_register_post_type_faq() {
		$labels = array(
			"name" => __("FAQs", NCM_I18N_DOMAIN),
			"singular_name" => __("FAQ", NCM_I18N_DOMAIN),
			"add_new" => __("Add New", NCM_I18N_DOMAIN),
			"add_new_item" => __("Add New FAQ", NCM_I18N_DOMAIN),
			"edit_item" => __("Edit FAQ", NCM_I18N_DOMAIN),
			"new_item" => __("New FAQ", NCM_I18N_DOMAIN),
			"all_items" => __("All FAQs", NCM_I18N_DOMAIN),
			"view_item" => __("View FAQ", NCM_I18N_DOMAIN),
			"search_items" => __("Search FAQs", NCM_I18N_DOMAIN),
			"not_found" => __("No FAQs found", NCM_I18N_DOMAIN),
			"not_found_in_trash" => __("No FAQs found in Trash", NCM_I18N_DOMAIN), 
			"parent_item_colon" => "",
			"menu_name" => __("FAQs", NCM_I18N_DOMAIN)
	  	);
	  	$args = array(
			"labels" => $labels,
			"public" => false,
			"show_ui" => true,
			"rewrite" => array("slug" => "faq"),
			"capability_type" => "post",
			"hierarchical" => false,
			"menu_position" => 27,
			"menu_icon"	=> "dashicons-editor-help",
			"supports" => array("title", "editor")
	  	); 
		
    	register_post_type("faq", $args);
	}

?>