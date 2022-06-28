<?php
	/* LIBRARY - TAB */

	//Show premium support services admin notice
	if ( isset($_GET["tab"]) ) {
		function ncm_support_notice__success()
		{
			?>
			<div data-dismissible="notice-support" class="update notice notice-warning is-dismissible">
				<p>Struggling with technical issues? Click for help of a <a
						href="https://f5themes.com/wordpress-expert-go" target="_blank">WordPress Expert</a></p>
			</div>
			<?php
		}

		add_action( 'admin_notices', 'ncm_support_notice__success' );
	}

	// outputs the tabs for the admin backend
	function ncm_admin_tab_pages($current) {
		$tabs = array(
			NCM_ADM_TAB_GENERAL		=> __("General", NCM_I18N_DOMAIN),
			NCM_ADM_TAB_FRONT_PAGE	=> __("Front Page", NCM_I18N_DOMAIN),
			NCM_ADM_TAB_SHOP		=> __("Shop", NCM_I18N_DOMAIN),
			NCM_ADM_TAB_BLOG		=> __("Blog", NCM_I18N_DOMAIN),
			NCM_ADM_TAB_INTEGRATION	=> __("Integration", NCM_I18N_DOMAIN),
            NCM_ADM_TAB_IMPORT      => __("Import", NCM_I18N_DOMAIN),
			NCM_ADM_TAB_HELP		=> __("Help", NCM_I18N_DOMAIN),
			NCM_ADM_TAB_SERVICES	=> __("Services", NCM_I18N_DOMAIN)
		);

		echo '<h2 class="nav-tab-wrapper">';

		foreach($tabs as $key => $tab) {
			if($key != NCM_ADM_TAB_SERVICES) {
				$class = ($key === $current) ? 'nav-tab-active' : '';
				echo "<a class='nav-tab $class' href='?page=ncm-page-custom-settings&tab=$key'>$tab</a>";
			}
			else {
				echo "<a class='nav-tab' href='https://f5themes.com/wordpress-support-maintenance-services/' target='_blank'>$tab</a>";
			}
		}

		echo '</h2>';
	}

	// returns the current tab
	function ncm_admin_get_current_tab() {
		global $pagenow;

		$retorno = "";
		if($pagenow == "admin.php") {
			$tab = (isset($_GET["tab"])) ? $_GET["tab"] : NCM_ADM_TAB_GENERAL;

			if($tab == NCM_ADM_TAB_GENERAL ||
			    $tab == NCM_ADM_TAB_FRONT_PAGE ||
			    $tab == NCM_ADM_TAB_SHOP ||
			    $tab == NCM_ADM_TAB_BLOG ||
			    $tab == NCM_ADM_TAB_INTEGRATION ||
                $tab == NCM_ADM_TAB_IMPORT ||
			    $tab == NCM_ADM_TAB_HELP)
			{
				$retorno = $tab;
			}
			else {
                $retorno = NCM_ADM_TAB_GENERAL;
            }
		}

		return $retorno;
	}

    function ncm_is_current_tab_front() {
        return ncm_admin_get_current_tab() == NCM_ADM_TAB_FRONT_PAGE;
    }

    function ncm_is_current_tab_shop() {
        return ncm_admin_get_current_tab() == NCM_ADM_TAB_SHOP;
    }

    function ncm_is_current_tab_blog() {
        return ncm_admin_get_current_tab() == NCM_ADM_TAB_BLOG;
    }

    function ncm_is_current_tab_integration() {
        return ncm_admin_get_current_tab() == NCM_ADM_TAB_INTEGRATION;
    }

    function ncm_is_current_tab_import() {
        return ncm_admin_get_current_tab() == NCM_ADM_TAB_IMPORT;
    }

    function ncm_is_current_tab_help() {
        return ncm_admin_get_current_tab() == NCM_ADM_TAB_HELP;
    }

	// returns the slug name by tab
	function ncm_admin_get_settings_slug_name($tab) {
		return "ncm_options_" . $tab;
	}

	// returns the slug for the General tab
	function ncm_admin_option_general() {
		return ncm_admin_get_settings_slug_name(NCM_ADM_TAB_GENERAL);
	}

	// returns the slug for the Front Page tab
	function ncm_admin_option_front_page() {
		return ncm_admin_get_settings_slug_name(NCM_ADM_TAB_FRONT_PAGE);
	}

	// returns the slug for the Shop tab
	function ncm_admin_option_shop() {
		return ncm_admin_get_settings_slug_name(NCM_ADM_TAB_SHOP);
	}

	// returns the slug for the Blog tab
	function ncm_admin_option_blog() {
		return ncm_admin_get_settings_slug_name(NCM_ADM_TAB_BLOG);
	}

	// returns the slug for the Others tab
	function ncm_admin_option_integration() {
		return ncm_admin_get_settings_slug_name(NCM_ADM_TAB_INTEGRATION);
	}

    function ncm_admin_option_import() {
        return ncm_admin_get_settings_slug_name(NCM_ADM_TAB_IMPORT);
    }

	// returns the slug for the Help tab
	function ncm_admin_option_help() {
		return ncm_admin_get_settings_slug_name(NCM_ADM_TAB_HELP);
	}

	// returns the slug for the current tab
	function ncm_admin_options_current() {
		return ncm_admin_get_settings_slug_name(ncm_admin_get_current_tab());
	}

	// initiates the tabs configurations
	function ncm_tabs_init() {
		require_once("tab-general.php");
		register_setting(
			ncm_admin_option_general(),
			ncm_admin_option_general(),
			"ncm_tab_general_validate"
		);

		require_once("tab-front-page.php");
		register_setting(
			ncm_admin_option_front_page(),
			ncm_admin_option_front_page(),
			"ncm_tab_front_page_validate"
		);

		require_once("tab-shop.php");
		register_setting(
			ncm_admin_option_shop(),
			ncm_admin_option_shop(),
			"ncm_tab_shop_validate"
		);

		require_once("tab-blog.php");
		register_setting(
			ncm_admin_option_blog(),
			ncm_admin_option_blog(),
			"ncm_tab_blog_validate"
		);

		require_once("tab-integration.php");
		register_setting(
			ncm_admin_option_integration(),
			ncm_admin_option_integration(),
			"ncm_tab_others_validate"
		);

        require_once("tab-import.php");
        register_setting(
            ncm_admin_option_import(),
            ncm_admin_option_import(),
            "ncm_tab_import_validate"
        );

		require_once("tab-help.php");
		register_setting(
			ncm_admin_option_help(),
			ncm_admin_option_help(),
			"ncm_tab_help_validate"
		);
	}

	// adds all the default values for all inputs to the db
	function ncm_db_options_init() {
		ncm_init_options_general();
		ncm_init_options_front();
		ncm_init_options_shop();
		ncm_init_options_blog();
		ncm_init_options_integration();
        ncm_init_options_import();
	}

	// inits the general options
	function ncm_init_options_general() {
		global $ncm_options_general;

		if(empty($ncm_options_general)) {
			$ncm_options_general = array(
				"profile_facebook"		=> ""
			,	"profile_twitter"		=> ""
			,	"profile_google_plus"	=> ""
			,	"profile_flickr"		=> ""
			,	"profile_linkedin"		=> ""
			,	"profile_instagram"		=> ""
			,	"profile_pinterest"		=> ""
			,	"profile_rss"			=> get_bloginfo_rss("rss2_url")
			,	"favicon"				=> NCM_FAVICON_URL
			,	"color_theme"			=> NCM_ADM_COLOR_DEFAULT
			,	"font_1"				=> NCM_FONT_1_DEFAULT
			,	"font_2"				=> NCM_FONT_2_DEFAULT
			,	"font_general_text"		=> NCM_FONT_GENERAL_TEXT_DEFAULT
			,	"fixed_menu_on_scroll"	=> 0
			,	"customer_support"		=> 0
			);

			add_option(ncm_admin_option_general(), $ncm_options_general, "", "no");
		}
		else {
			// Clean the old Color
			$ncm_options_general["color_theme"] = clean_color($ncm_options_general["color_theme"]);

			// Updates recent added options
			$ncm_options_general["profile_rss"] = esc_url_raw($ncm_options_general["profile_rss"]);

			update_option(ncm_admin_option_general(), $ncm_options_general, "", "no");
		}
	}

	// inits the front options
	function ncm_init_options_front() {
		global $ncm_options_front;

		if(empty($ncm_options_front)) {
			$ncm_options_front = array(
				"products_sliders_count"			=> NCM_TOTAL_PRODUCTS_SLIDERS
			,	"enable_testimonial"				=> 1
			,	"enable_last_comments"				=> 1
			);

			add_option(ncm_admin_option_front_page(), $ncm_options_front, "", "no");
		}
	}

	// inits the shop options
	function ncm_init_options_shop() {
		global $ncm_options_shop;

		if(empty($ncm_options_shop)) {
			$ncm_options_shop = array(
				"phone_number"						=> ""
			,	"shop_address"						=> ""
			,	"shop_latitude"						=> ""
			,	"shop_longitude"					=> ""
			,	"shop_map_zoom"						=> NCM_ADM_MAP_ZOOM
			,	"shop_map_zoom_max"					=> NCM_ADM_MAP_ZOOM_MAX
			,	"shop_map_zoom_min"					=> NCM_ADM_MAP_ZOOM_MIN
			,	"shop_map_key"						=> ""
			/*
			,	"shopindex_revslider_default" 		=> 1
			,	"shopindex_revslider_alias"			=> ""
			,	"shopindex_layerslider_default" 	=> 1
			,	"shopindex_layerslider_alias"		=> ""
			*/
			,	"sidebar_position"					=> NCM_ADM_SIDEBAR_POS_ALIGN_L
			,	"default_view_mode"					=> NCM_ADM_DEFAULT_VIEW_MODE_GRID
			,	"products_main_count"				=> NCM_TOTAL_PRODUCTS_MAIN
			,	"products_sliders_count"			=> NCM_TOTAL_PRODUCTS_SLIDERS
			,	"enable_faq"						=> 1
			,	"enable_contact"					=> 1
			,	"enable_products_custom_review"		=> 0
			,	"enable_contact_map"				=> 1
			,	"enable_slides_recommended"			=> 1
			,	"enable_slides_special_offers"		=> 1
			,	"enable_slides_best_sellers"		=> 1
			,	"enable_grid_list_toggle"		    => 1
			,	"product_layout_margin_bottom"		=> NCM_PRODUCT_MARGIN_BOTTOM_DEFAULT
			/*
			,	"enable_revslider"					=> 0
			,	"enable_layerslider"				=> 0
			*/
			);

			add_option(ncm_admin_option_shop(), $ncm_options_shop, "", "no");
		}
	}

	// inits the blog options
	function ncm_init_options_blog() {
		global $ncm_options_blog;

		if(empty($ncm_options_blog)) {
			$ncm_options_blog = array(
				"sidebar_position"				=> NCM_ADM_SIDEBAR_POS_ALIGN_R
			,	"grid_posts_on_index"			=> 0
			,	"enable_copy_post"				=> 1
            ,   "enable_sidebar_on_faq"         => 1
            ,   "enable_sidebar_on_contact"     => 1
			,	"post_grid_call_max_char"		=> NCM_ADM_GRID_POSTS_MAX_CHAR
			,	"post_grid_call_overlay_width"	=> NCM_ADM_GRID_POSTS_OVERLAY_W
			,	"post_grid_call_overlay_height"	=> NCM_ADM_GRID_POSTS_OVERLAY_H
			);

			add_option(ncm_admin_option_blog(), $ncm_options_blog, "", "no");
		}
	}

	// inits the integration options
	function ncm_init_options_integration() {
		global $ncm_options_integration;

		if(empty($ncm_options_integration)) {
			$ncm_options_integration = array(
				"textarea_custom_css"		=> ""
			,	"textarea_header_code"		=> ""
			,	"textarea_google_analytics" => ""
			);

			add_option(ncm_admin_option_integration(), $ncm_options_integration, "", "no");
		}
	}

    // inits the import options
    function ncm_init_options_import() {
        global $ncm_options_import;

        if(empty($ncm_options_import)) {
            $ncm_options_import = array();
        }

        add_option(ncm_admin_option_import(), $ncm_options_import, "", "no");
    }
?>