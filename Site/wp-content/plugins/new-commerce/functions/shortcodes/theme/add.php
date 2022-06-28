<?php

	require_once("shortcode.php");

	add_shortcode("ncm_products_slider_stack", "ncm_products_slider_stack_callback");
	add_shortcode("ncm_product_added_message", "ncm_product_added_message_callback");
	add_shortcode("ncm_button", "ncm_button_callback");
	
	add_shortcode("ncm_2arrows_before_link", "ncm_2arrows_before_link_callback");
	add_shortcode("ncm_2arrows_after_link", "ncm_2arrows_after_link_callback");
	
	add_shortcode("ncm_2_banner_area", "ncm_2_banner_area_callback");
	add_shortcode("ncm_left_banner", "ncm_left_banner_callback");
	add_shortcode("ncm_right_banner", "ncm_right_banner_callback");
?>