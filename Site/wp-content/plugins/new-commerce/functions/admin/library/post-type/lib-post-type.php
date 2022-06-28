<?php
	/* LIBRARY - POST TYPE */

	// initialize all custom post types
	function ncm_init_post_types() {
		global $ncm_options_shop;
		
		ncm_register_post_type_testimonial();
		ncm_register_post_type_faq();
		ncm_register_post_type_contact();
		ncm_register_post_type_contact_category();
		
		if(isset($ncm_options_shop["enable_products_custom_review"]) && $ncm_options_shop["enable_products_custom_review"] == 1) {
			ncm_register_post_type_review_category();
		}
	}
?>