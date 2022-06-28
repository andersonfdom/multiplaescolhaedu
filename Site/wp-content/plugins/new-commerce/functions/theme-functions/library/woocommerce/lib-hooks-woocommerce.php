<?php
/* LIBRARY - HOOKS WOOCOMMERCE */

// adds support to woocommerce plugin
function ncm_woocommerce_support()
{
	add_theme_support("woocommerce");
}

// changes the "Additional Information" tab header on single product page
function ncm_change_product_additional_information_title()
{
	echo __("Technical Details", NCM_I18N_DOMAIN);
}

// changes the delimiter of the breadcrumb
function ncm_change_breadcrumb_delimiter($defaults)
{
	$defaults["delimiter"] = " <span class='separator patternTextColor'>&raquo;</span> ";
	return $defaults;
}

// adds custom output to custom hook in the product loop for the button "DETAILS"
function ncm_output_loop_product_details_link()
{
	echo '<span class="details"><a class="ncm-button patternBGColor" href="' . get_permalink() . '">' . __("DETAILS", NCM_I18N_DOMAIN) . '</a></span>';
}

// loads all necessary assets for the flexslider plugin
function ncm_load_flexslider_assets()
{
	if (!wp_style_is("ncm-style-flexlider")) {
		wp_register_style("ncm-style-flexlider", get_template_directory_uri() . "/scripts/flexslider/flexslider.css");
		wp_enqueue_style("ncm-style-flexlider");
	}
	if (!wp_script_is("ncm-script-flexlider")) {
		wp_register_script("ncm-script-flexlider", (get_template_directory_uri() . "/scripts/flexslider/jquery.flexslider-min.js"), array("jquery"));
		wp_enqueue_script("ncm-script-flexlider");
	}
}

// loads all necessary assets for the caroufredsel plugin
function ncm_load_caroufredsel_assets()
{
	if (!wp_script_is("ncm-script-caroufredsel")) {
		wp_register_script("ncm-script-caroufredsel", (get_template_directory_uri() . "/scripts/caroufredsel/jquery.carouFredSel-6.2.1-packed.js"), array("jquery"));
		wp_enqueue_script("ncm-script-caroufredsel");
	}
}

// automatically refresh the header's cart items count, when a new product is added to it
function ncm_header_add_to_cart_fragment_items_count($fragments)
{
	global $woocommerce;
	ob_start();

	?>
	<span id="cartHeaderItemsCount"><?php echo sprintf(_n("%d item", "%d items", $woocommerce->cart->cart_contents_count, NCM_I18N_DOMAIN), $woocommerce->cart->cart_contents_count); ?>&nbsp;</span>
	<?php

	$fragments["span#cartHeaderItemsCount"] = ob_get_clean();

	return $fragments;
}

// automatically refresh the header's cart total value, when a new product is added to it
function ncm_header_add_to_cart_fragment_value($fragments)
{
	global $woocommerce;
	ob_start();

	?>
	<div id="cartHeaderTotal"><?php echo $woocommerce->cart->get_cart_total(); ?></div>
	<?php

	$fragments["div#cartHeaderTotal"] = ob_get_clean();

	return $fragments;
}

// shows the product added message on shop index
function ncm_header_add_to_cart_fragment_message($fragments)
{
	global $woocommerce;

	if (!isset($_SESSION)) {
		session_start();
	}

	$session_products = $_SESSION[NCM_SHOPINDEX_MESSAGE_COOKIE_NAME];

	// before, it was (<). Because it was bugged and I didn't know why, this is now "deactivated" with a impossible condition (>)
	if ($session_products > $woocommerce->cart->cart_contents_count) {
		ob_start();

		?>
		<div id="shopindex-message" class='ncm-message success'><?php _e("Product sucessfully added to cart.", NCM_I18N_DOMAIN); ?></div>
		<?php

		$fragments["div#shopindex-message"] = ob_get_clean();
	}

	return $fragments;
}

// creates a custom session variable to store the current cart total, before adding a product to the cart
function ncm_create_product_added_session()
{
	if (!is_admin() && ncm_is_woocommerce_activated()) {
		global $woocommerce;

		if (!isset($_SESSION)) {
			session_start();
		}

		$_SESSION[NCM_SHOPINDEX_MESSAGE_COOKIE_NAME] = count($woocommerce->cart->cart_contents);
	}
}

// filters the product price
function ncm_product_price_html($price, $product)
{
	$html = $price;
	$html = str_replace("<ins>", "<ins class='patternTextColor'>", $price);

	return $html;
}

// overrides some woocommerce's widgets
function ncm_override_woocommerce_widgets()
{
	if (class_exists("WC_Widget_Price_Filter")) {
		unregister_widget("WC_Widget_Price_Filter");
		include_once("widgets/class-ncm-widget-price-filter.php");
		register_widget("NCM_WC_Widget_Price_Filter");
	}
}

// show the variation price label?
function ncm_show_variation_price_label()
{
	global $product;
	$show_label = FALSE;
	$variations = $product->get_available_variations();

	foreach ($variations as $variation) {
		$variation_price = get_post_meta($variation["variation_id"], "_regular_price", true);

		foreach ($variations as $variation_search) {
			$variation_search_price = get_post_meta($variation_search["variation_id"], "_regular_price", true);

			if ($variation_price != $variation_search_price) {
				$show_label = TRUE;
				break;
			}
		}

		if ($show_label) {
			break;
		}
	}

	return $show_label;
}

// sets the shop's sidebar position
function ncm_set_shop_sidebar_position()
{
	global $ncm_options_shop;

	if (is_active_sidebar("wa-shop-sidebar") && ncm_has_search_product_different_price()) {
		if (isset($ncm_options_shop["sidebar_position"]) && $ncm_options_shop["sidebar_position"] == NCM_ADM_SIDEBAR_POS_ALIGN_L) {
			get_template_part("shop-sidebar-left");
		} else {
			get_template_part("shop-sidebar-right");
		}
	}
}

// outputs the view-mode on shopindex
function ncm_view_mode_output()
{
	wc_get_template("loop/view-mode.php");
}

// output upsells
if (!function_exists("woocommerce_output_upsells")) {
	function woocommerce_output_upsells()
	{
		woocommerce_upsell_display(NCM_MAX_UPSELLS, 1);
	}
}

// adds the wishlist button
function ncm_output_loop_product_wishlist_link()
{
	if (ncm_is_wishlist_activated()) {
		$use_compare = ncm_is_compare_activated();

		echo "<div class='fll " . ($use_compare ? "half" : "full") . "'>";
		echo do_shortcode("[yith_wcwl_add_to_wishlist]");
		echo "</div>";
	}
}

// adds the compare button
function ncm_output_loop_product_compare_link()
{
	if (ncm_is_compare_activated()) {
		$use_wish = ncm_is_wishlist_activated();

		echo "<div class='fll " . ($use_wish ? "half" : "full") . "'>";
		echo do_shortcode("[yith_compare_button]");
		echo "</div>";
	}
}

// adds the custom review to the meta
function ncm_custom_review($comment_id)
{
	foreach ($_POST as $key => $post_value) {
		if (strpos($key, "rating_") !== false && $post_value && $post_value >= 0 && $post_value <= 5) {
			add_comment_meta($comment_id, $key, (int) esc_attr($post_value), true);
		}
	}
}
?>