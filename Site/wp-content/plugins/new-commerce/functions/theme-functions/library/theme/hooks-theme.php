<?php
	/* HOOKS - THEME */

	add_action("after_setup_theme", "ncm_theme_setup");
	add_action("wp_enqueue_scripts", "ncm_load_scripts");
	add_action("wp_head", "ncm_load_globals", 1);
	add_action("wp_head", "ncm_process_head_output", 2);
	add_action("wp_footer", "ncm_create_footer");
	add_filter("edit_post_link", "ncm_edit_post_link");
	add_filter("wp_title", "ncm_filter_wp_title");
	add_filter("pre_get_posts", "ncm_exclude_pages_from_search");

	add_action("ncm_header_login_register_links", "ncm_login_register_links_output");
	add_action("ncm_faq_scripts", "ncm_load_accordion_assets");
	add_action("ncm_contact_scripts", "ncm_load_gmaps_assets");
	add_action("ncm_blog_sidebar", "ncm_set_blog_sidebar_position");

	add_action("ncm_after_body", "ncm_script_header");
	add_action("ncm_faq_execute_script", "ncm_script_faq");
	add_action("ncm_contact_execute_script", "ncm_script_contact");
	add_action("ncm_menu_execute_script", "ncm_script_menu");
	add_action("ncm_testimonials_execute_script", "ncm_script_testimonials");
	add_action("ncm_single_product_reviews_execute_script", "ncm_script_single_product_reviews");
	add_action("ncm_slides_box_front_execute_script", "ncm_script_slides_box_front");
	add_action("ncm_slides_box_stack_execute_script", "ncm_script_slides_box_stack");
	add_action("ncm_footer_execute_script", "ncm_script_footer");
?>