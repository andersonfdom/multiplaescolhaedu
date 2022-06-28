<?php
	/* LIBRARY - HOOKS THEME */

	// prepare the theme setup
	function ncm_theme_setup() {
		ncm_add_background_support();
		ncm_add_header_support();
		ncm_add_translation_support();
		ncm_add_post_options_support();
		ncm_set_max_content_width();
		ncm_register_nav_menus();
		ncm_register_sidebars();
		ncm_set_wc_image_dimensions();
		ncm_redirect_after_theme_activation();

        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
	}

	// loads various scripts
	function ncm_load_scripts() {
		global $wp_styles;

		// Styles
		if(!wp_style_is("ncm-style-bootstrap")) {
			wp_register_style("ncm-style-bootstrap", get_template_directory_uri() . "/scripts/bootstrap/css/bootstrap.min.css");
			wp_enqueue_style("ncm-style-bootstrap");
		}
		if(!wp_style_is("ncm-style-bootstrap-responsive")) {
			wp_register_style("ncm-style-bootstrap-responsive", get_template_directory_uri() . "/scripts/bootstrap/css/bootstrap-responsive.min.css");
			wp_enqueue_style("ncm-style-bootstrap-responsive");
		}
		if(!wp_style_is("newcommerce-style")) {
			wp_register_style("newcommerce-style", get_stylesheet_directory_uri() . "/style.css");
			wp_enqueue_style("newcommerce-style");
		}

		// IE General
		if(!wp_style_is("newcommerce-ie-style")) {
			$wp_styles->add("newcommerce-ie-style", get_template_directory_uri() . "/css/ie-style.css");
			$wp_styles->add_data("newcommerce-ie-style", "conditional", "IE");
			$wp_styles->enqueue("newcommerce-ie-style");
		}

		// IE 8
		if(!wp_style_is("newcommerce-ie8-style")) {
			$wp_styles->add("newcommerce-ie8-style", get_template_directory_uri() . "/css/ie8-style.css");
			$wp_styles->add_data("newcommerce-ie8-style", "conditional", "IE 8");
			$wp_styles->enqueue("newcommerce-ie8-style");
		}

		// IE 9
		if(!wp_style_is("newcommerce-ie9-style")) {
			$wp_styles->add("newcommerce-ie9-style", get_template_directory_uri() . "/css/ie9-style.css");
			$wp_styles->add_data("newcommerce-ie9-style", "conditional", "IE 9");
			$wp_styles->enqueue("newcommerce-ie9-style");
		}

		// Scripts
		if(!wp_script_is("jquery")) {
			wp_enqueue_script("jquery");
		}
		if(!wp_script_is("ncm-change-product-box")) {
			wp_register_script("ncm-change-product-box", (get_template_directory_uri() . "/scripts/change-product-box.js"), array("jquery"));
			wp_enqueue_script("ncm-change-product-box");
		}
		if(!wp_script_is("ncm-quantity-holder")) {
			wp_register_script("ncm-quantity-holder", (get_template_directory_uri() . "/scripts/quantity-holder.js"), array("jquery"));
			wp_enqueue_script("ncm-quantity-holder");
		}
		if(!wp_script_is("ncm-bootstrap")) {
			wp_register_script("ncm-bootstrap", (get_template_directory_uri() . "/scripts/bootstrap/js/bootstrap.min.js"));
			wp_enqueue_script("ncm-bootstrap");
		}
		if(!wp_script_is("ncm-respond")) {
			wp_register_script("ncm-respond", (get_template_directory_uri() . "/scripts/respond/respond.min.js"));
			wp_enqueue_script("ncm-respond");
		}

		// Scrollup
		if(!wp_style_is("ncm-style-scrollup")) {
			wp_register_style("ncm-style-scrollup", get_template_directory_uri() . "/scripts/scrollup/css/image.css");
			wp_enqueue_style("ncm-style-scrollup");
		}
		if(!wp_script_is("ncm-scrollup")) {
			wp_register_script("ncm-scrollup", (get_template_directory_uri() . "/scripts/scrollup/jquery.scrollUp.min.js"), array("jquery"));
			wp_enqueue_script("ncm-scrollup");
		}

		// WordPress comments script
		if(!wp_script_is("comment-reply")) {
			if (is_singular() && comments_open() && get_option("thread_comments") == 1) {
				wp_enqueue_script("comment-reply");
			}
		}

		// Notice.js
		if(!wp_script_is('notice.js')) {
			wp_register_script('notice.js', (get_template_directory_uri() . "/scripts/notice.js"), array("jquery"));
			wp_enqueue_script('notice.js');
		}

		ncm_load_css_for_safari();
		ncm_load_custom_color_scheme();
		ncm_load_product_layout_settings();
		ncm_load_custom_font_style();
		ncm_load_sticky_menu();
	}

	// process some output to the <head>
	function ncm_process_head_output() {
		global $ncm_options_general, $ncm_options_integration;

		if(ncm_isset_and_not_empty($ncm_options_general["favicon"])) {
			$favicon = $ncm_options_general["favicon"];
		}
		else {
			$favicon = NCM_FAVICON_URL;
		}

		echo "<link rel='shortcut icon' href='$favicon'>";

		// Custom code from backend
        if(isset($ncm_options_integration["textarea_header_code"])) {
            ncm_echo_code_with_tags_for_script($ncm_options_integration["textarea_header_code"]);
        }

        if(isset($ncm_options_integration["textarea_custom_css"])) {
            ncm_echo_code_with_tags_for_style($ncm_options_integration["textarea_custom_css"]);
		}
		
		// GA code
		ncm_echo_code_with_tags_for_script($ncm_options_integration["textarea_google_analytics"]);
	}

	// encapsulates the creation of the footer
	function ncm_create_footer() {
		global $ncm_options_integration;

		echo '
			<div class="container">
				<div class="row-fluid">
					<div id="footer-left" class="footer-div">
						<div class="p1">' . get_bloginfo("name") . '</div>
						<div class="p2">' . sprintf(__("All rights reserved %s Copyright %s", NCM_I18N_DOMAIN), "&copy;", date("Y")) . ' </div>
					</div>
						
					<div id="footer-right" class="footer-div">
						<div class="p1">';

		wp_nav_menu(
			array(
				"theme_location" 	=> "footer_nav_menu",
				"menu_class" 		=> "nav-menu-footer",
				"items_wrap"      	=> '<ul id="%1$s" class="%2$s flr" role="navigation">%3$s</ul>',
				"fallback_cb"		=> "ncm_menu_callback_without_default"
			)
		);

		echo '			</div>
						<div class="clr"></div>
					</div>
				</div>
			</div>
		';
	}

	// add a class to edit button
	function ncm_edit_post_link($output) {
		return (!ncm_is_current_woocommerce() ? str_replace('class="post-edit-link"', 'class="post-edit-link" data-toggle="tooltip"', $output) : "");
	}

	// filters the page title appropriately depending on the current page
	function ncm_filter_wp_title($title) {
		global $paged, $page;

		$title = trim(str_replace("&raquo;", "", $title));

		if (is_feed())
			return $title;

		$filtered_title = "$title | " . get_bloginfo("name");

		$site_description = get_bloginfo("description", "display");
		if ($site_description && is_front_page()) {
			$title = get_bloginfo("name");
			$filtered_title = "$title | $site_description";
		}

		if ($paged >= 2 || $page >= 2) {
			$filtered_title = "$title | " . sprintf(__("Page %s", NCM_I18N_DOMAIN), max($paged, $page));
		}

		return $filtered_title;
	}

	// outputs the register links on the header of the shop
	function ncm_login_register_links_output() {
		if(is_user_logged_in()) {
			$user = wp_get_current_user();
			$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
			$login = $user->user_login;
			$isEmail = preg_match($regex, $login);

			echo __("Logged as", NCM_I18N_DOMAIN) . "&nbsp;" . ($isEmail ? strstr($login, "@", true) : $login);
			echo "&nbsp;|&nbsp;";
			echo "<a class='withTransitionEffect' href='" . ncm_get_logout_url() . "'>" . __("Logout", NCM_I18N_DOMAIN) . "</a>";
		}
		else {
			$text = get_option("users_can_register") ? __("Login / Register", NCM_I18N_DOMAIN) : __("Login", NCM_I18N_DOMAIN);

			echo "<a class='withTransitionEffect' href='" . ncm_get_myaccount_url() . "'>" . $text . "</a>";
		}
	}

	// sets the blog's sidebar position
	function ncm_set_blog_sidebar_position() {
		global $ncm_options_blog;

		if(isset($ncm_options_blog["sidebar_position"]) && $ncm_options_blog["sidebar_position"] == NCM_ADM_SIDEBAR_POS_ALIGN_L) {
			get_template_part("blog-left");
		}
		else {
			get_template_part("blog-right");
		}
	}

	// excludes pages from blog search
	function ncm_exclude_pages_from_search($query) {
		$wc_searching = (get_query_var("post_type") && get_query_var("post_type") == "product");

		if ($query->is_search && !$wc_searching && !is_admin()) {
			$query->set("post_type", "post");
		}

		return $query;
	}

	// load globals
	function ncm_load_globals() {
		global 	$ncm_options_general,
				$ncm_options_front,
				$ncm_options_shop,
				$ncm_options_blog,
				$ncm_options_integration,
				$ncm_blog_is_grid;

		$ncm_options_general 		= ncm_get_option_general();
		$ncm_options_front 			= ncm_get_option_front_page();
		$ncm_options_shop 			= ncm_get_option_shop();
		$ncm_options_blog 			= ncm_get_option_blog();
		$ncm_options_integration 	= ncm_get_option_integration();

		$ncm_blog_is_grid = (
			isset($ncm_options_blog["grid_posts_on_index"]) &&
			$ncm_options_blog["grid_posts_on_index"] == 1 &&
			!is_single() &&
			!is_page() &&
			!ncm_is_current_woocommerce()
		);
	}
