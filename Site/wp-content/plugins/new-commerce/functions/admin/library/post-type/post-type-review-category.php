<?php 
	/* POST TYPE - REVIEW CATEGORY */

	// register the contact category post type
	function ncm_register_post_type_review_category() {
		$labels = array(
			"name" => __("Review Categories", NCM_I18N_DOMAIN),
			"singular_name" => __("Category", NCM_I18N_DOMAIN),
			"add_new" => __("Add New", NCM_I18N_DOMAIN),
			"add_new_item" => __("Add New Category", NCM_I18N_DOMAIN),
			"edit_item" => __("Edit Category", NCM_I18N_DOMAIN),
			"new_item" => __("New Category", NCM_I18N_DOMAIN),
			"all_items" => __("All Categories", NCM_I18N_DOMAIN),
			"view_item" => __("View Category", NCM_I18N_DOMAIN),
			"search_items" => __("Search Categories", NCM_I18N_DOMAIN),
			"not_found" => __("No Categories found", NCM_I18N_DOMAIN),
			"not_found_in_trash" => __("No Categories found in Trash", NCM_I18N_DOMAIN), 
			"parent_item_colon" => "",
			"menu_name" => __("Product Reviews", NCM_I18N_DOMAIN)
	  	);
	  	$args = array(
			"labels" => $labels,
			"public" => false,
			"show_ui" => true,
			"rewrite" => array("slug" => "ncm_review_category"),
			"capability_type" => "post",
			"hierarchical" => false,
			"menu_position" => 29,
			"menu_icon"	=> "dashicons-welcome-add-page",
			"supports" => array("title"),
			"register_meta_box_cb" => ""
	  	); 
    	register_post_type("ncm_review_category", $args);
	}
	
?>