<?php
	/* HOOKS - WOOCOMMERCE */
	$ncm_options_shop = ncm_get_option_shop();

	// :: GENERAL ::
	// ---
	add_action("after_setup_theme", "ncm_woocommerce_support");

	// :: CART ::
	// ---
	remove_action("woocommerce_cart_collaterals", "woocommerce_cross_sell_display");
	add_action("woocommerce_after_cart", "woocommerce_cross_sell_display");

	// :: SINGLE PRODUCT PAGE ::
	// ---
	remove_action("woocommerce_single_product_summary", "woocommerce_template_single_meta", 40);
	add_action("woocommerce_single_product_summary", "woocommerce_template_single_meta", 6);

	remove_action("woocommerce_single_product_summary", "woocommerce_template_single_sharing", 50);
	add_action("woocommerce_single_product_summary", "woocommerce_template_single_sharing", 7);

	remove_action("woocommerce_single_product_summary", "woocommerce_template_single_excerpt", 20);
	add_action("woocommerce_single_product_summary", "woocommerce_template_single_excerpt", 8);

	remove_action("woocommerce_before_single_product_summary", "woocommerce_show_product_sale_flash", 10);
	add_action("woocommerce_before_single_product_summary", "woocommerce_show_product_sale_flash", 21);

	remove_action("woocommerce_after_single_product_summary", "woocommerce_output_related_products", 20);
	add_action("ncm_content_single_product_related_products", "woocommerce_output_related_products", 1);

	add_filter("woocommerce_product_additional_information_tab_title", "ncm_change_product_additional_information_title");
	add_filter("woocommerce_get_price_html", "ncm_product_price_html", 100, 2);

	remove_action("woocommerce_after_single_product_summary", "woocommerce_upsell_display", 15);
	add_action("ncm_content_single_product_related_products", "woocommerce_output_upsells", 2);

	if(isset($ncm_options_shop["enable_products_custom_review"]) && $ncm_options_shop["enable_products_custom_review"] == 1) {
		add_action("comment_post", "ncm_custom_review", 2 );
	}

	// :: CHECKOUT ::
	// ---
	remove_action("woocommerce_checkout_order_review", "woocommerce_checkout_payment", 20);
	add_action("ncm_checkout_payment_options", "woocommerce_checkout_payment", 20);

	// :: BREADCRUMB ::
	// ---
	add_filter("woocommerce_breadcrumb_defaults", "ncm_change_breadcrumb_delimiter");

	if(ncm_is_woocommerce_activated()) {
		add_action("ncm_breadcrumb", "woocommerce_breadcrumb");
	}

	// :: PRODUCT LOOP ::
	// ---
	add_action("ncm_after_shop_loop_item", "ncm_output_loop_product_details_link", 1);
	add_action("ncm_after_shop_loop_item", "woocommerce_template_loop_add_to_cart", 2);

	// :: ARCHIVE ::
	// ---
	$totalProducts = ncm_isset_and_not_empty($ncm_options_shop["products_main_count"]) ? $ncm_options_shop["products_main_count"] : NCM_TOTAL_PRODUCTS_MAIN;

	// add_action("init", "ncm_create_product_added_session");
	add_action("ncm_shop_sidebar", "ncm_set_shop_sidebar_position");
	add_action("woocommerce_before_shop_loop", "ncm_view_mode_output", 25);
	add_filter("loop_shop_per_page", create_function('$cols', 'return ' . $totalProducts . ';'), 20);
	add_filter("add_to_cart_fragments", "ncm_header_add_to_cart_fragment_items_count", 1);
	add_filter("add_to_cart_fragments", "ncm_header_add_to_cart_fragment_value", 2);
	add_filter("add_to_cart_fragments", "ncm_header_add_to_cart_fragment_message", 3);

	// :: WIDGETS ::
	// ---
	add_action("widgets_init", "ncm_override_woocommerce_widgets", 15);

	// :: TESTIMONIAL ::
	// ---
	add_action("scripts_testimonial", "ncm_load_flexslider_assets");

	// :: SLIDES BOX ::
	// ---
	add_action("scripts_slides_box", "ncm_load_caroufredsel_assets");
?>