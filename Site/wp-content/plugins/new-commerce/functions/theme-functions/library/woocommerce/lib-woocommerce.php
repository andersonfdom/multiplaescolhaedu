<?php
	/* LIBRARY - WOOCOMMERCE */

	// checks if WooCommerce is activated
	function ncm_is_woocommerce_activated() {
		return class_exists("woocommerce");
	}
	
	// checks if Wishlist Plugin is activated
	function ncm_is_wishlist_activated() {
		return class_exists("YITH_WCWL");
	}
	
	// checks if Compare Plugin is activated
	function ncm_is_compare_activated() {
		return class_exists("YITH_Woocompare");
	}

    function ncm_is_faq() {
        return is_page_template("page-faq.php");
    }

    function ncm_is_contact() {
        return is_page_template("page-contact.php");
    }
	
	// check if current page is from woocommerce (woocommerce page, cart, checkout, etc)
	function ncm_is_current_woocommerce() {
		return (
			ncm_is_woocommerce() || 
			ncm_is_cart() || 
			ncm_is_checkout() || 
			ncm_is_account_page() || 
			ncm_is_product() || 
			ncm_is_product_category() || 
			ncm_is_shop() || 
			ncm_is_product_tag() ||
			ncm_is_ajax() ||
			ncm_is_search_product()
		);
	}
	
	// check if current page is woocommerce
	function ncm_is_woocommerce() {
		return (ncm_is_woocommerce_activated() && is_woocommerce());
	}
	
	// check if it's the woocommerce's cart
	function ncm_is_cart() {
		return (ncm_is_woocommerce_activated() && is_cart());
	}

	// check if it's the woocommerce's checkout
	function ncm_is_checkout() {
		return (ncm_is_woocommerce_activated() && is_checkout());
	}
	
	// check if it's the woocommerce's account page
	function ncm_is_account_page() {
		return (ncm_is_woocommerce_activated() && is_account_page());
	}
	
	// check if it's the woocommerce's product
	function ncm_is_product() {
		return (ncm_is_woocommerce_activated() && is_product());
	}
	
	// check if it's the woocommerce's product category
	function ncm_is_product_category() {
		return (ncm_is_woocommerce_activated() && is_product_category());
	}
	
	// check if it's the woocommerce's shop
	function ncm_is_shop() {
		return (ncm_is_woocommerce_activated() && is_shop());
	}
	
	// check if it's the woocommerce's product tag
	function ncm_is_product_tag() {
		return (ncm_is_woocommerce_activated() && is_product_tag());
	}

	// check if it's the woocommerce's ajax
	function ncm_is_ajax() {
		return (ncm_is_woocommerce_activated() && is_ajax());
	}

	// check if it's the woocommerce's search product page
	function ncm_is_search_product() {
		$wc_widget_filter_keys = array_keys($_GET);
		$wc_widget_filter_keys_match = preg_grep("/^filter_./", $wc_widget_filter_keys );
		
		$wc_widget_query_type_keys = array_keys($_GET);
		$wc_widget_query_type_keys_match = preg_grep("/^query_type./", $wc_widget_query_type_keys );
		
		$isSearch = (		 
			(isset($_GET["s"]) && !is_null($_GET["s"])) ||
			(isset($_GET["min_price"]) && !is_null($_GET["min_price"])) ||
			(isset($_GET["max_price"]) && !is_null($_GET["max_price"])) ||
			(count($wc_widget_filter_keys_match) > 0) ||
			(count($wc_widget_query_type_keys_match) > 0)
		);
		$isProductMeta = (
			(isset($_GET["product_cat"]) && !is_null($_GET["product_cat"])) ||
			(isset($_GET["product_tag"]) && !is_null($_GET["product_tag"]))
		);
		$isProduct = (
			(isset($_GET["post_type"]) && !is_null($_GET["post_type"]) && $_GET["post_type"] == "product")
		);

		return (ncm_is_woocommerce_activated() && $isProduct && ($isSearch || $isProductMeta));
	}

	// get the logout URL
	function ncm_get_logout_url() {
		$logout_url = "";
		$myaccount_page_id = get_option("woocommerce_myaccount_page_id");
 
		if($myaccount_page_id)
			$logout_url = wp_logout_url(get_permalink($myaccount_page_id ));
		 
		if(get_option("woocommerce_force_ssl_checkout") == "yes")
			$logout_url = str_replace("http:", "https:", $logout_url);
			
		return $logout_url;
	}

	// get the my account URL
	function ncm_get_myaccount_url() {
		$myaccount_page_url = "";
		$myaccount_page_id = get_option("woocommerce_myaccount_page_id");
		
		if($myaccount_page_id)
			$myaccount_page_url = get_permalink($myaccount_page_id);
			
		return $myaccount_page_url;
	}
	
	// get the shop URL
	function ncm_get_shop_url() {
		$shop_page_url = get_permalink(wc_get_page_id("shop"));	
		
		return $shop_page_url;
	}
	
	// automatically overrides the plugable function (from the core) to return a customized thumbnail for a product inside the loop
	function woocommerce_template_loop_product_thumbnail() {
		global $woocommerce;
		
		echo "<div class='productImage'><a href='" . get_permalink($woocommerce->id) . "'>";
		echo woocommerce_get_product_thumbnail();
		echo "</a></div>";
	}

	// automatically overrides the plugable function (from the core) to return a customized thumbnail for a category inside the loop
	function woocommerce_subcategory_thumbnail($category) {
		global $woocommerce;
 
		$large_thumbnail_size   = apply_filters( 'single_product_large_thumbnail_size', 'shop_catalog' );
		$dimensions             = wc_get_image_size( $large_thumbnail_size );
		$thumbnail_id           = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );
		
		if ( $thumbnail_id ) {
		 	$image = wp_get_attachment_image_src( $thumbnail_id, $large_thumbnail_size  );
		 	$image = $image[0];
		} 
		else {
		 	$image = woocommerce_placeholder_img_src();
		}
		if ( $image )
			echo '<img src="' . $image . '" alt="' . $category->name . '" width="' . $dimensions['width'] . '" height="' . $dimensions['height'] . '" />';
	}
	
	// formats the product price html
	function ncm_format_product_price_html($html, $addPrice = FALSE) {
		if(!empty($html) && $addPrice === TRUE)
			$html = __("Price:", NCM_I18N_DOMAIN) . "&nbsp;" . $html;
		
		$html = str_replace(__("From:", NCM_I18N_DOMAIN), "", $html);
		$html = str_replace("> </span", "></span", $html);

		return $html;
	}
	
	// get the max price of a product in the current query
	function ncm_get_product_max_price_from_query() {
		global $wpdb, $woocommerce, $wp_query;
		$max = 0;
		
		if ( isset($woocommerce->query) && !is_null($woocommerce->query) && sizeof( $woocommerce->query->layered_nav_product_ids ) === 0 ) {
			$max = ceil( $wpdb->get_var(
				$wpdb->prepare('
					SELECT max(meta_value + 0)
					FROM %1$s
					LEFT JOIN %2$s ON %1$s.ID = %2$s.post_id
					WHERE meta_key = \'%3$s\'
				', $wpdb->posts, $wpdb->postmeta, '_price' )
			) );
		} else {
			$max = ceil( $wpdb->get_var(
				$wpdb->prepare('
					SELECT max(meta_value + 0)
					FROM %1$s
					LEFT JOIN %2$s ON %1$s.ID = %2$s.post_id
					WHERE meta_key =\'%3$s\'
					AND (
						%1$s.ID IN (%4$s)
						OR (
							%1$s.post_parent IN (%4$s)
							AND %1$s.post_parent != 0
						)
					)
				', $wpdb->posts, $wpdb->postmeta, '_price', implode( ',', $woocommerce->query->layered_nav_product_ids )
			) ) );
		}
		
		return $max;
	}
	
	// query has more than 1 product with different price?
	function ncm_has_search_product_different_price() {
		return true; // ncm_get_product_max_price_from_query() != 0;
	}
	
	// sets the shop content position relative to the sidebar
	function ncm_set_shop_position_relative_to_sidebar() {
		global $ncm_options_shop;
		$retorno = " ";
		
		if(isset($ncm_options_shop["sidebar_position"]) && $ncm_options_shop["sidebar_position"] == NCM_ADM_SIDEBAR_POS_ALIGN_L)
			$retorno .= "flr";
		else
			$retorno .= "fll";

		return $retorno;
	}
	
	// override the Order Again button function
	function woocommerce_order_again_button($order) {
		if ( ! $order || $order->status != 'completed' )
			return;
		
		?>
			<p class="order-again">
				<a href="<?php echo wp_nonce_url( add_query_arg( 'order_again', $order->id ) , 'woocommerce-order_again' ); ?>" class="ncm-button patternBGColor"><?php _e( 'Order Again', 'woocommerce' ); ?></a>
			</p>
		<?php
	}
	
	// sets the slide lock for the view mode
	function ncm_set_view_mode_lock($is = TRUE) {
		global $ncm_is_slides_box;
		$ncm_is_slides_box = $is;
		
		// Grid View
		if(ncm_is_grid_view_mode()) {
			add_action("ncm_after_shop_loop_item", "ncm_output_loop_product_wishlist_link", 3);
			add_action("ncm_after_shop_loop_item", "ncm_output_loop_product_compare_link", 4);
		}
		// List View
		else {
			add_action("woocommerce_after_shop_loop_item_title", "ncm_output_loop_product_wishlist_link", 1);
			add_action("woocommerce_after_shop_loop_item_title", "ncm_output_loop_product_compare_link", 2);
		}
	}
	
	// checks if it's the list view mode
	function ncm_is_list_view_mode() {
		return (ncm_get_current_view_mode() == NCM_VIEW_MODE_LIST);
	}
	
	// checks if it's the grid view mode
	function ncm_is_grid_view_mode() {
		return (ncm_get_current_view_mode() == NCM_VIEW_MODE_GRID);
	}
	
	// get the current view mode
	function ncm_get_current_view_mode() {
		global $ncm_is_slides_box, $ncm_options_shop;
		$view_mode = NCM_VIEW_MODE_GRID;
		
		if(isset($_GET["view"]) && !empty($_GET["view"]) && !$ncm_is_slides_box) {
			$view_mode = woocommerce_clean($_GET["view"]);
		}
		else {
			if(!$ncm_is_slides_box) {
				if(isset($ncm_options_shop["default_view_mode"]) && !empty($ncm_options_shop["default_view_mode"])) {
					if($ncm_options_shop["default_view_mode"] == NCM_ADM_DEFAULT_VIEW_MODE_GRID) {
						$view_mode = NCM_VIEW_MODE_GRID;
					}
					else {
						$view_mode = NCM_VIEW_MODE_LIST;
					}
				}
				else{
					$view_mode = NCM_VIEW_MODE_GRID;
				}
			}
			else {
				$view_mode = NCM_VIEW_MODE_GRID;
			}
		}
		
		return $view_mode;
	}
?>