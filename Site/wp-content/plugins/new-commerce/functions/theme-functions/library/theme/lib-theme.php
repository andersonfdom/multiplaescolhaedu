<?php
/* LIBRARY - THEME */

// custom function to display comments
function ncm_comment_display($comment, $args, $depth)
{
	$GLOBALS["comment"] = $comment;

	// customize the output for 'pingback' or 'trackback'
	$txtPingTrack = "";
	if ($comment->comment_type == "pingback")
		$txtPingTrack = "Pingback";
	else if ($comment->comment_type == "trackback")
		$txtPingTrack = "Trackback";
	?>
	<div id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
		<table>
			<tr>
				<td class="avatar"><?php echo get_avatar($comment, 50); ?></td>
				<td class="comment-content">
					<div class="name"><?php echo (!empty($txtPingTrack) ? ($txtPingTrack . ": ") : ""); ?><?php comment_author_link(); ?></div>
					<div class="date"><?php comment_date(); ?>, <?php comment_time(); ?></div>
					<div class="text"><?php comment_text(); ?></div>
					<div class="reply"><?php comment_reply_link(array_merge($args, array("reply_text" => (__("Reply", NCM_I18N_DOMAIN) . " <span>&darr;</span>"), "depth" => $depth, "max_depth" => $args["max_depth"]))); ?></div>
				</td>
			</tr>
		</table>
	<?php
}

// custom function to modify background-color and/or image
function ncm_setup_background()
{
	$background = set_url_scheme(get_background_image());
	$color = get_theme_mod("background_color");

	if (!$background && !$color)
		return;

	$style = $color ? "background-color: #$color;" : "";

	if ($background) {
		$image = " background-image: url('$background');";

		$repeat = get_theme_mod("background_repeat", "repeat");
		if (!in_array($repeat, array("no-repeat", "repeat-x", "repeat-y", "repeat")))
			$repeat = "repeat";
		$repeat = " background-repeat: $repeat;";

		$position = get_theme_mod("background_position_x", "left");
		if (!in_array($position, array("center", "right", "left")))
			$position = "left";
		$position = " background-position: top $position;";

		$attachment = get_theme_mod("background_attachment", "scroll");
		if (!in_array($attachment, array("fixed", "scroll")))
			$attachment = "scroll";
		$attachment = " background-attachment: $attachment;";

		$style .= $image . $repeat . $position . $attachment;
	}
	?>
		<style type="text/css">
			div#wrapperHeader {
				<?php echo trim($style);
				?>
			}

			div#wrapperContent {
				<?php echo trim($style);
				?>
			}

			body {
				<?php echo trim($style);
				?>
			}
		</style>
	<?php
}

// returns all db options from the General tab
function ncm_get_option_general()
{
	return get_option(ncm_admin_option_general());
}

// returns all db options from the Front Page tab
function ncm_get_option_front_page()
{
	return get_option(ncm_admin_option_front_page());
}

// returns all db options from the Shop tab
function ncm_get_option_shop()
{
	return get_option(ncm_admin_option_shop());
}

// returns all db options from the Blog tab
function ncm_get_option_blog()
{
	return get_option(ncm_admin_option_blog());
}

// returns all db options from the Others tab
function ncm_get_option_integration()
{
	return get_option(ncm_admin_option_integration());
}

// returns all db options from the current tab
function ncm_get_option_current()
{
	return get_option(ncm_admin_options_current());
}

// pre-built check used with options indexes, to verify if an option is set and not empty
function ncm_isset_and_not_empty($value)
{
	return (isset($value) && !empty($value));
}

// outputs the codes from the Integration tab to the footer, inserting <script> tags if they are necessary
function ncm_echo_code_with_tags_for_script($code)
{
	if (ncm_isset_and_not_empty($code)) {
		if (stripos($code, "<script") === FALSE)
			$code = "<script type='text/javascript'>" . $code;
		if (strripos($code, "</script>") === FALSE)
			$code .= "</script>";
	} else {
		$code = "";
	}

	echo $code;
}

// outputs the codes from the Integration tab to the footer, inserting <script> tags if they are necessary
function ncm_echo_code_with_tags_for_style($code)
{
	if (ncm_isset_and_not_empty($code)) {
		if (stripos($code, "<style") === FALSE)
			$code = "<style type='text/css'>" . $code;
		if (strripos($code, "</style>") === FALSE)
			$code .= "</style>";
	} else {
		$code = "";
	}

	echo $code;
}

// sets the blog content position relative to the sidebar
function ncm_set_blog_position_relative_to_sidebar()
{
	$options = ncm_get_option_blog();
	$retorno = " ";

	if (isset($options["sidebar_position"]) && $options["sidebar_position"] == NCM_ADM_SIDEBAR_POS_ALIGN_L)
		$retorno .= "flr";
	else
		$retorno .= "fll";

	return $retorno;
}

// register sidebar sections
function ncm_register_sidebars()
{
	// blog sidebar
	register_sidebar(array(
		"name" 			=> __("Blog Sidebar", NCM_I18N_DOMAIN),
		"id" 			=> "sidebar-blog",
		"description" 	=> __("Section to place widgets on your blog's sidebar", NCM_I18N_DOMAIN),
		"before_title" 	=> "<h3>",
		"after_title" 	=> "</h3>",
		"before_widget" => '<div class="widget wrapperStuff %2$s"><div class="stuff">',
		"after_widget" 	=> "</div></div>"
	));

	// links footer
	register_sidebar(array(
		"name" 			=> __("Footer Links", NCM_I18N_DOMAIN),
		"id" 			=> "wa-footer-links",
		"description" 	=> __("Section to place links to any pages from your blog e.g.: Contact | FAQ, and so on", NCM_I18N_DOMAIN),
		"before_title" 	=> "<h3>",
		"after_title" 	=> "</h3>",
		"before_widget" => "<div class='widget'>",
		"after_widget" 	=> "</div>"
	));

	// shop sidebar
	register_sidebar(array(
		"name" 			=> __("Shop Sidebar", NCM_I18N_DOMAIN),
		"id" 			=> "wa-shop-sidebar",
		"description" 	=> __("Section to place Woocommerce's product widgets (only works with product archives)", NCM_I18N_DOMAIN),
		"before_title" 	=> "<h3>",
		"after_title" 	=> "</h3>",
		"before_widget" => "<div class='widget wrapperStuff'><div class='stuff'>",
		"after_widget" 	=> "</div></div>"
	));

	// front page banner
	register_sidebar(array(
		"name" 			=> __("Front Page Banner", NCM_I18N_DOMAIN),
		"id" 			=> "wa-front-page-banner",
		"description" 	=> __("Section to place an image banner for your shop", NCM_I18N_DOMAIN),
		"before_title" 	=> "<h3>",
		"after_title" 	=> "</h3>",
		"before_widget" => "<div class='widget wrapperStuff'><div id='front-banner' class='stuff'>",
		"after_widget" 	=> "</div></div>"
	));
}

// adds theme support for menus
function ncm_register_nav_menus()
{
	register_nav_menus(
		array(
			"nav_top" => __("Main Menu", NCM_I18N_DOMAIN)
		)
	);

	register_nav_menus(
		array(
			"header_nav_menu" => __("Header Navigation Menu", NCM_I18N_DOMAIN)
		)
	);

	register_nav_menus(
		array(
			"footer_nav_menu" => __("Footer Navigation Menu", NCM_I18N_DOMAIN)
		)
	);
}

// adds theme support for background-color and image
function ncm_add_background_support()
{
	global $wp_version;
	$args = array(
		"default-image" 			=> "",
		"default-color" 			=> "",
		"wp-head-callback" 			=> "ncm_setup_background",
		"admin-head-callback" 		=> "",
		"admin-preview-callback" 	=> ""
	);

	add_theme_support("custom-background", $args);
}

// adds theme support for custom-header
function ncm_add_header_support()
{
	$options_general = ncm_get_option_general();
	$color = str_replace("#", "", $options_general["color_theme"]);

	$args = array(
		"default-text-color"     => $color,
		"wp-head-callback"       => "ncm_header_style",
		"admin-head-callback"    => "ncm_admin_header_style",
		"admin-preview-callback" => "ncm_admin_header_image"
	);

	add_theme_support("custom-header", $args);
}

// wp-head-callback
function ncm_header_style()
{
	$header_image = get_header_image();
	$text_color   = get_header_textcolor();

	if (empty($header_image) && $text_color == get_theme_support("custom-header", "default-text-color"))
		return;
	?>
		<style type="text/css">
			<?php if (!empty($header_image)) : ?>.site-header {
					background: url(<?php header_image();
									?>) no-repeat scroll top;
				}

			<?php endif;

		?><?php if (!display_header_text()) : ?>.site-title,
				.site-description {
					z-index: -999;
					height: 0;
				}

				<?php if (empty($header_image)) : ?>.site-header .home-link {
						min-height: 0;
					}

				<?php endif;

			?><?php elseif ($text_color != get_theme_support("custom-header", "default-text-color")) : ?>.site-title {
					color: #<?php echo esc_attr($text_color);
							?> !important;
				}

			<?php endif;
		?>
		</style>
	<?php
}

// admin-head-callback
function ncm_admin_header_style()
{
	$header_image = get_header_image(); ?>
		<style type="text/css">
			.appearance_page_custom-header #headimg {
				border: none;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;

				<?php if (!empty($header_image)) {
					echo 'background: url(' . esc_url($header_image) . ') no-repeat scroll;';
				}

				?>padding: 0 20px;
			}

			#headimg .home-link {
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
				margin: 0 auto;

				<?php if (!empty($header_image) || display_header_text()) {
					echo 'min-height: 230px;';
				}

				?>width: 100%;
			}

			<?php if (!display_header_text()) : ?>#headimg h1,
				#headimg h2 {
					position: absolute !important;
					clip: rect(1px 1px 1px 1px);
					/* IE7 */
					clip: rect(1px, 1px, 1px, 1px);
				}

			<?php endif;

		?>#headimg h1 {
				margin: 0;
				padding: 58px 0 10px;
			}

			#headimg h1 a {
				text-decoration: none;
			}

			#headimg h1 a:hover {
				text-decoration: underline;
			}

			#headimg h2 {
				margin: 0;
				text-shadow: none;
			}

			.default-header img {
				max-width: 230px;
				width: auto;
			}
		</style>
	<?php
}

// admin-preview-callback
function ncm_admin_header_image()
{
	?>
		<div id="headimg" style="background: url(<?php header_image(); ?>) no-repeat scroll left;">
			<?php $style = ' style="color:#' . get_header_textcolor() . ';"'; ?>

			<div class="home-link">
				<h1 class="displaying-header-text"><a id="name" <?php echo $style; ?> onclick="return false;" href="#"><?php bloginfo("name"); ?></a></h1>
				<h2 id="desc" class="displaying-header-text" style="color: #c3c3c3;"><?php bloginfo("description"); ?></h2>
			</div>
		</div>
	<?php
}

// adds some post options support
function ncm_add_post_options_support()
{
	// adds automatic feed links support on <head> section
	add_theme_support("automatic-feed-links");

	// adds theme support for thumbnails
	add_theme_support("post-thumbnails");

	// adds theme support for galleries
	add_theme_support("post-formats", array("gallery"));
}

// sets the max_content width for the theme
function ncm_set_max_content_width()
{
	if (!isset($content_width))
		$content_width = 560;
}

// redirects to the theme's custom settings panel
function ncm_redirect_after_theme_activation()
{
	global $pagenow;
	if (is_admin() && isset($_GET["activated"]) && $pagenow == "themes.php") {
		wp_redirect(admin_url("admin.php?page=ncm-page-custom-settings&tab=help"));

		ncm_change_page_on_front_to_shop();

		exit;
	}
}

// set the default size of catalog images
function ncm_set_wc_image_dimensions()
{
	global $pagenow;
	if (is_admin() && isset($_GET["activated"]) && $pagenow == "themes.php") {
		$catalog = array(
			'width' 	=> '300',	// px
			'height'	=> '300',	// px
			'crop'		=> 1 		// true
		);

		// updates the image sizes
		update_option("shop_catalog_image_size", $catalog); 		// Product category thumbs

		/*
			$single = array(
				'width' 	=> '300',	// px
				'height'	=> '300',	// px
				'crop'		=> 1 		// true
			);
		 
			$thumbnail = array(
				'width' 	=> '90',	// px
				'height'	=> '90',	// px
				'crop'		=> 1 		// false
			);
	
			update_option("shop_single_image_size", $single); 			// Single product image
			update_option("shop_thumbnail_image_size", $thumbnail); 	// Image gallery thumbs
			*/
	}
}

// overwrites the front page
function ncm_change_page_on_front_to_shop()
{
	if (function_exists(wc_get_page_id)) {
		update_option("page_on_front", wc_get_page_id("shop"));
		update_option("show_on_front", "page");
	}
}

// adds translation support
function ncm_add_translation_support()
{
	load_theme_textdomain(NCM_I18N_DOMAIN, (get_template_directory() . "/languages"));
}

// get the URL for the posts page
function ncm_get_page_for_posts_url()
{
	$posts_page_id = get_option("page_for_posts");
	$posts_page = get_page($posts_page_id);

	return get_page_link($posts_page_id);
}

// get the current url
function ncm_get_current_url()
{
	global $wp;
	$current_url = (add_query_arg($wp->query_string, "", home_url($wp->request)));

	return $current_url;
}

// get the current language
function ncm_get_current_language()
{
	$ncm_i18n = get_bloginfo("language");
	$ncm_i18n = ((!is_null($ncm_i18n) && !empty($ncm_i18n)) ? str_replace("-", "_", $ncm_i18n) : "en_US");

	return $ncm_i18n;
}

// adds the custom class to the author post links
function ncm_the_author_posts_link($deprecated = "")
{
	if (!empty($deprecated))
		_deprecated_argument(__FUNCTION__, "2.1");

	global $authordata;
	if (!is_object($authordata))
		return false;

	$link = sprintf(
		'<a href="%1$s" class="patternTextColor" title="%2$s" rel="author">%3$s</a>',
		esc_url(get_author_posts_url($authordata->ID, $authordata->user_nicename)),
		esc_attr(sprintf(__("Posts by %s", NCM_I18N_DOMAIN), get_the_author())),
		get_the_author()
	);

	echo apply_filters("ncm_the_author_posts_link", $link);
}

// menu callback
function ncm_menu_callback($args)
{
	if (!current_user_can("manage_options")) {
		return;
	}

	extract($args);
	$link = $link_before
		. '<li><a href="' . admin_url('nav-menus.php') . '">' . $before . __('Add a menu', NCM_I18N_DOMAIN) . $after . '</a></li>'
		. $link_after;

	if (stripos($items_wrap, '<ul') !== FALSE || stripos($items_wrap, '<ol') !== FALSE) {
		$link = "<li>$link</li>";
	}

	$output = sprintf($items_wrap, $menu_id, $menu_class, $link);

	if (!empty($container)) {
		$output  = "<$container class='$container_class' id='$container_id'>$output</$container>";
	}
	if ($echo) {
		echo $output;
	}

	return $output;
}

// menu callback without default link
function ncm_menu_callback_without_default($args)
{
	if (!current_user_can("manage_options")) {
		return;
	}

	extract($args);
	$link = "";
	$output = sprintf($items_wrap, $menu_id, $menu_class, $link);

	if (!empty($container)) {
		$output  = "<$container class='$container_class' id='$container_id'>$output</$container>";
	}
	if ($echo) {
		echo $output;
	}

	return $output;
}

function ncm_load_product_layout_settings()
{
	$options_shop = ncm_get_option_shop();

	echo "<style type='text/css'>";
	echo '.ncm-products .ncm-product-grid { margin-bottom: ' . $options_shop["product_layout_margin_bottom"] . "px!important;}";
	echo "</style>";
}

// outputs the custom color
function ncm_load_custom_color_scheme()
{
	$options_general = ncm_get_option_general();
	$color = $options_general["color_theme"];

	echo "<style type='text/css'>";
	echo '
		.patternTextColor, .patternTextColor * {color: #' . $color . '!important;}
		.patternTextColorActive {color: #' . $color . '!important;}
		.patternTextColorHover:hover {color: #' . $color . '!important;}
		.patternBGColor {background-color: #' . $color . '!important;}
		.patternBGColorHover:hover {background-color: #' . $color . '!important;}
		.patternBorderColor {border-color: #' . $color . '!important;}
		.patternBorderColor:hover {border-color: initial!important;}
		.patternBorderColorHover:hover {border-color: #' . $color . '!important;}
		.patternBorderColorWithoutHover {border-color: #' . $color . '!important;}
		
		mark {background-color: #' . $color . '!important;}
		
		#wrapperMenu ul li:hover a {border-color: #' . $color . '!important;}
		#wrapperMenu ul li.fix-mobile a {border-color: #' . $color . '!important;}
		#wrapperMenu ul ul ul {border-color: #' . $color . '!important;}
		#wrapperMenu ul li:hover ul li a:hover {background: #' . $color . ';}
		#wrapperMenu ul li.fix-mobile a.fix-mobile:hover {background: #' . $color . ';}

		#wrapperHeader #cartHeader a#view-cart:hover:after {color: #' . $color . ';}
		
		#wrapperContent h3 {color: #' . $color . '!important;}
		
		#wrapperBlog h1, #wrapperBlog h2 {color: #' . $color . '!important;}
		#wrapperBlog #comments table td.comment-content div.name {color: #' . $color . '!important;}
		#wrapperBlog #comments table td.comment-content div.name a {color: #' . $color . '!important;}
		#wrapperBlog .post .postOptions a:hover:before, #wrapperBlog .edit-post .post-edit-link:hover:before {color: #' . $color . ';}
		#wrapperBlog .post .postMetadata h2 a:hover {color: #' . $color . ';}
		
		#slidesBoxFrontWrapper #slidesBoxProducts .slides {border-color: #' . $color . '!important;}
		
		#wrapperProductView .single_variation_wrap .single_variation .price ins .amount {color: #' . $color . '!important;}
		div.pp_woocommerce .pp_gallery ul li.selected a {border-color: #' . $color . '!important;}
		div.pp_woocommerce .pp_gallery ul li a:hover {border-color: #' . $color . '!important;}
		
		#wrapperMyacc .digital-downloads li {border-color: #' . $color . '!important;}
		
		#wrapperBottomSidebar #lastComments .stuff > a:hover .p1 {color: #' . $color . ';}
		
		#wrapperProductView .comment-form-rating p.stars span a {color: #' . $color . ';}
		#wrapperProductView .comment-form-rating p.ncm-stars span a {color: #' . $color . ';}
		
		#wrapperFooter .demo_store {
			background: #' . $color . ';
			background: -webkit-gradient(linear, left top, left bottom, from(#' . $color . '), to(#' . $color . '));
			background: -webkit-linear-gradient(#' . $color . ', #' . $color . ');
			background: -moz-linear-gradient(center top, #' . $color . ' 0%, #' . $color . ' 100%);
			background: -moz-gradient(center top, #' . $color . ' 0%, #' . $color . ' 100%);
			border: 1px solid #' . $color . ';
		}
		#wrapperFooter .row > div + div a:hover {color: #' . $color . ';}
		
		input[type=submit] {background-color: #' . $color . '!important; border-color: #' . $color . '!important;}
		input[type=submit]:hover {border-color: #fff!important;}
		.ncm-button {background-color: #' . $color . '!important; border-color: #' . $color . '!important;}
		.ncm-button:hover {border-color: #fff!important;}
		::-moz-selection {background-color: #' . $color . ';}
		::selection {background-color: #' . $color . ';}
		
		#shop-widget-sidebar .widget ul.product_list_widget li a,
		.widget.woocommerce ul.product_list_widget li a {color: #' . $color . ';}
		#shop-widget-sidebar .widget ul.product_list_widget .star-rating span,
		.widget.woocommerce ul.product_list_widget .star-rating span {color: #' . $color . ';}
		
		.price_slider_wrapper .ui-slider .ui-slider-handle {border-color: #' . $color . '!important;}
		.price_slider_wrapper .ui-slider .ui-slider-range {background-color: #' . $color . '!important;}
		
		#shop-widget-sidebar .widget ul li {border-color: #' . $color . '!important;} 
		#shop-widget-sidebar .widget ul li .count {background-color: #' . $color . '!important;}
		
		.widget.widget_calendar table td a {border-color: #' . $color . ';}
		.widget.widget_calendar table td#today {background-color: #' . $color . '!important;}
		.widget.widget_calendar table td#prev {background-color: #' . $color . '!important;}
		.widget.widget_calendar table td#next {background-color: #' . $color . '!important;}
		blockquote {border-color: #' . $color . '!important;}
		.sticky {border-color: #' . $color . '!important;
			box-shadow: 0px 0px 10px #' . $color . '!important;
			-webkit-box-shadow: 0px 0px 10px #' . $color . '!important;
			-moz-box-shadow: 0px 0px 10px #' . $color . '!important;
			-ms-box-shadow: 0px 0px 10px #' . $color . '!important;
			-o-box-shadow: 0px 0px 10px #' . $color . '!important;
		}
		
		#sc_chat_box div.sc-chat-header {background-color: #' . $color . '!important;}
		
		#wrapperCheckout .overlay {
			box-shadow: 0px 0px 10px #' . $color . '!important;
			-webkit-box-shadow: 0px 0px 10px #' . $color . '!important;
			-moz-box-shadow: 0px 0px 10px #' . $color . '!important;
			-ms-box-shadow: 0px 0px 10px #' . $color . '!important;
			-o-box-shadow: 0px 0px 10px #' . $color . '!important;
		}
		
		.ncm-2arrows-after-shortcode:hover:after, .ncm-2arrows-before-shortcode:hover:before {color: #' . $color . ';}
		
		#wrapperContent .wishlist_table a.add_to_cart.button {background-color: #' . $color . '!important; border-color: #' . $color . '!important;}
		#wrapperContent .yith-wcwl-share h4 {color: #' . $color . ';}
		#yith-wcwl-popup-message #yith-wcwl-message {color: #' . $color . ';}
		#yith-wcwl-popup-message {border-color: #' . $color . '!important;
			box-shadow: 0px 0px 10px #' . $color . '!important;
			-webkit-box-shadow: 0px 0px 10px #' . $color . '!important;
			-moz-box-shadow: 0px 0px 10px #' . $color . '!important;
			-ms-box-shadow: 0px 0px 10px #' . $color . '!important;
			-o-box-shadow: 0px 0px 10px #' . $color . '!important;
		}

		#shop-widget-sidebar .product-title { color: #' . $color . '; }

        .woocommerce-Price-amount.amount,
        .woocommerce-Price-amount.amount .woocommerce-Price-currencySymbol{ color: #' . $color . '; }

		.ncm-products .productInfo h2 { color: #' . $color . '; }

		';
	echo "</style>";
}

// outputs the custom fonts
function ncm_load_custom_font_style()
{
	$options_general = ncm_get_option_general();

	ncm_load_general_text_font($options_general);
	ncm_load_primary_font($options_general);
	ncm_load_secondary_font($options_general);
}

// outputs the primary font
function ncm_load_primary_font($options)
{
	if (isset($options["font_1"]) && !is_null($options["font_1"]) && !empty($options["font_1"])) {
		$isDefault = ($options["font_1"] == NCM_FONT_1_DEFAULT);
		$font1 = (!$isDefault ? $options["font_1"] : "Oswaldbook");

		if (!$isDefault) {
			echo "<link href='" . NCM_GFONTS_HREF . "$font1' rel='stylesheet' type='text/css'>";
		}

		echo "
			<style type='text/css'>
				.site-header .site-description,
				#wrapperHeader #telWrapper p,
				#wrapperHeader #cartHeader span, 
				#wrapperHeader #cartHeader #cartHeaderTotal .woocommerce-Price-amount.amount,
				#wrapperHeader #cartHeader #cartHeaderTotal .woocommerce-Price-amount.amount .woocommerce-Price-currencySymbol,
				#wrapperHeader #cartHeader a#view-cart,
				#wrapperMenu ul a,
				#wrapperBlog h1, #wrapperBlog h2, 
				#compare-modal h1, #compare-modal h2,
				#wrapperBlog .post .postMetadata h2 a,
				#wrapperContent #wrapperBlog .post .postOptions a, #wrapperContent #wrapperBlog .edit-post .post-edit-link,
				#wrapperBlog #archive .archiveTitle, #wrapperBlog #archive .archiveTitle span,
				#wrapperContent .post-pagination *,
				.ncm-products .productCatInfo *,
				.ncm-products .productPrice *,
				.ncm-products .productActions *,
				.ncm-products .productActions .add .added_to_cart,
				.ncm-products .productInfo *, .ncm-products .productCatInfo *,
				#wrapperCart #cartProducts table th,
				#wrapperCart #cartTotal .stuff #calc_shipping,
				#wrapperProductView #productInfo h2,
				#wrapperProductView #price,
				#wrapperProductView #price .woocommerce-Price-amount.amount, 
				#wrapperProductView #price .woocommerce-Price-amount.amount .woocommerce-Price-currencySymbol,
				#wrapperProductView #extra .tabs .header a,
				#wrapperProductView #extra #addComment a,
				#wrapperProductView .single_variation_wrap .single_variation .price .woocommerce-Price-amount.amount,
				#wrapperProductView .single_variation_wrap .single_variation .price .woocommerce-Price-amount.amount .woocommerce-Price-currencySymbol,
				table#orderTable thead th,
				#wrapperBottomSidebar .title,
				#wrapperBottomSidebar .text2,
				#wrapperBottomSidebar .text3,
				#wrapperBottomSidebar #lastComments .comment .commentsBubble a,
				#wrapperBottomSidebar #lastComments .stuff > a .p2,
				#wrapperMyaccOrders .tableMyaccOrders th,
				.fontOswaldbook,
				input[type=submit],
				.ncm-button,
				.stock,
				#wrapperContent .ncm-pagination .pages, #wrapperContent .ncm-pagination .paginationHolder .page-numbers, #wrapperContent .post-pagination, #wrapperContent .post-pagination *,
				.ncm-2arrows-after-shortcode, .ncm-2arrows-before-shortcode,
				#yith-wcwl-popup-message *,
				#ncm-wishtable th *,
				#ncm-wishtable .button,
				#wrapperContent .yith-wcwl-add-to-wishlist a,
				#wrapperContent .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse span.feedback,
				#wrapperContent .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse span.feedback,
				a.compare.button
				{font-family: '$font1'!important;}
			</style>";
	}
}

// outputs the secondary font
function ncm_load_secondary_font($options)
{
	if (isset($options["font_2"]) && !is_null($options["font_2"]) && !empty($options["font_2"])) {
		$isDefault = ($options["font_2"] == NCM_FONT_2_DEFAULT);
		$font2 = (!$isDefault ? $options["font_2"] : "Missionscript");

		if (!$isDefault) {
			echo "<link href='" . NCM_GFONTS_HREF . "$font2' rel='stylesheet' type='text/css'>";
		}

		echo "
			<style type='text/css'>
				.site-header .site-title,
				#wrapperContent h3,
				#wrapperContent h4,
				#wrapperContent h5,
				#wrapperContent h6,
				#wrapperBlog .post .postMetadata .postInnerRight .postAuthor a,
				#slidesBoxStack #slidesBox *, #slidesBoxFrontWrapper #slidesBoxProducts a.slider-caption,
				#wrapperThanks #thanksStuff h2,
				.fontMissionscript {font-family: '$font2'!important;}
			</style>";
	}
}

// outputs the general text font
function ncm_load_general_text_font($options)
{
	if (isset($options["font_general_text"]) && !is_null($options["font_general_text"]) && !empty($options["font_general_text"])) {
		$isDefault = ($options["font_general_text"] == NCM_FONT_GENERAL_TEXT_DEFAULT);
		$font_general_text = (!$isDefault ? $options["font_general_text"] : "Arial, Helvetica, sans-serif");

		if (!$isDefault) {
			echo "<link href='" . NCM_GFONTS_HREF . "$font_general_text' rel='stylesheet' type='text/css'>";
		}

		$font_general_text = (!$isDefault ? "'" . $font_general_text . "'" : $font_general_text);

		echo "
			<style type='text/css'>
				*,
				mark,
				.ncm-products .ncm-product-list .productInfo .productDescription #resume * {font-family: $font_general_text!important;}
			</style>";
	}
}

// clean the color
function clean_color($color)
{
	$color = str_replace(' ', '-', $color);
	$color = preg_replace('/[^A-Fa-f0-9\-]/', '', $color);
	$color = preg_replace('/-+/', '-', $color);

	return $color;
}

// loads some css to for Safari browsers
function ncm_load_css_for_safari()
{
	echo "
			<script type='text/javascript'>
				window.onload = function() {
					var ua = navigator.userAgent.toLowerCase(); 
					if (ua.indexOf('safari') != -1 && ua.indexOf('chrome') == -1) { 
						var link = document.getElementById('safari-stub');
						link.rel  = 'stylesheet';
						link.type = 'text/css';
						link.href = '" . get_template_directory_uri() . "/css/safari.css';
						link.media = 'all';
					}
				};
			</script>
		";
}

// check if the theme loads the sticky menu
function ncm_load_sticky_menu()
{
	$options_general = ncm_get_option_general();

	if (isset($options_general["fixed_menu_on_scroll"]) && $options_general["fixed_menu_on_scroll"] == 1) {
		if (!wp_script_is("ncm-sticky-lib")) {
			wp_register_script("ncm-sticky-lib", (get_template_directory_uri() . "/scripts/sticky/jquery.sticky.js"), array("jquery"));
			wp_enqueue_script("ncm-sticky-lib");
		}
	}
}
?>