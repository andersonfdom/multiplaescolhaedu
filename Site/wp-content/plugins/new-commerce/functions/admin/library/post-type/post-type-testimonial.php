<?php 
	/* POST TYPE - TESTIMONIAL */

	// register the testimonial post type
	function ncm_register_post_type_testimonial() {
		// testimonial
		$labels = array(
			"name" => __("Testimonials", NCM_I18N_DOMAIN),
			"singular_name" => __("Testimonial", NCM_I18N_DOMAIN),
			"add_new" => __("Add New", NCM_I18N_DOMAIN),
			"add_new_item" => __("Add New Testimonial", NCM_I18N_DOMAIN),
			"edit_item" => __("Edit Testimonial", NCM_I18N_DOMAIN),
			"new_item" => __("New Testimonial", NCM_I18N_DOMAIN),
			"all_items" => __("All Testimonials", NCM_I18N_DOMAIN),
			"view_item" => __("View Testimonial", NCM_I18N_DOMAIN),
			"search_items" => __("Search Testimonials", NCM_I18N_DOMAIN),
			"not_found" => __("No testimonials found", NCM_I18N_DOMAIN),
			"not_found_in_trash" => __("No testimonials found in Trash", NCM_I18N_DOMAIN), 
			"parent_item_colon" => "",
			"menu_name" => __("Testimonials", NCM_I18N_DOMAIN)
	  	);
	  	$args = array(
			"labels" => $labels,
			"public" => false,
			"show_ui" => true, 
			"rewrite" => array("slug" => "testimonial"),
			"capability_type" => "post",
			"hierarchical" => false,
			"menu_position" => 26,
			"menu_icon"	=> "dashicons-id-alt",
			"supports" => array("title", "editor"),
			"register_meta_box_cb" => "ncm_add_metabox_post_type_testimonial"
	  	); 
		
    	register_post_type("testimonial", $args);
	}

	// adds the testimonial metabox
	function ncm_add_metabox_post_type_testimonial() {
		add_meta_box("ncm_add_metabox_post_type_testimonial_output", __("Additional Information", NCM_I18N_DOMAIN), "ncm_add_metabox_post_type_testimonial_output", "testimonial", "normal", "default");
	}
	
	// adds all necessary controls for the testimonial metabox
	function ncm_add_metabox_post_type_testimonial_output() {
		$sizeText = 50;
		
		echo "<table>";
		
		// nonce
		echo "<input type='hidden' name='_post_testmonial_nonce' id='post_testmonial_nonce' value='" . wp_create_nonce(admin_url()) . "' />";
		
		// form output
		// ---
		// Author
		$args = array(
			"label" 			=> __("Author", NCM_I18N_DOMAIN)
		,	"handle" 			=> "_testmonial_author"
		,	"type"				=> "text"
		,	"index"				=> "testmonial_author"
		,	"size"				=> $sizeText
		,	"label_for"			=> "_testmonial_author"
		,	"second_td_output" 	=> __("The author of this testimonial", NCM_I18N_DOMAIN)
		);
		ncm_admin_metabox_render_input($args);
		
		// Date
		$args = array(
			"label" 			=> __("Date", NCM_I18N_DOMAIN)
		,	"handle" 			=> "_testmonial_date"
		,	"type"				=> "datepicker"
		,	"index"				=> "testmonial_date"
		,	"label_for"			=> "_testmonial_date"
		,	"second_td_output" 	=> __("The date of this testimonial", NCM_I18N_DOMAIN)
		);
		ncm_admin_metabox_render_input($args);
		
		echo "</table>";
	}
	
?>