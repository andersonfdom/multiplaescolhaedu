<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <meta http-equiv="Content-Type" content="<?php bloginfo("html_type"); ?>; charset=<?php bloginfo("charset"); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
    <title><?php echo wp_title(); ?></title>
	
    <link rel="pingback" href="<?php bloginfo("pingback_url"); ?>" />
    	
	<?php wp_head(); ?>
    
    <link id="safari-stub" rel="stylesheet" type="text/css" href="#" />
</head>

<body <?php body_class(); ?>>
    
    <?php do_action("ncm_after_body"); ?>
    
    <?php global $ncm_options_general, $ncm_options_shop; ?>

	<!-- login div -->
	<div id="wrapperTopStripe">
		<div class="container">
			<div class="row-fluid">
			
				<!-- left -->
				<div class="span6">
					<div id="stripeLeft">
						<span class="p1"><?php echo get_bloginfo("name"); ?></span>
						<span class="p2">//</span>
						<span class="p3"><?php echo get_bloginfo("description"); ?></span>
					</div>
				</div>
				
				<!-- right -->
				<div class="span6">
					<div id="stripeRight">
						<div class="flr">
                        	<?php do_action("ncm_header_login_register_links"); ?>
						</div>
                        <div id="header-wrapper-menu" class="flr">
							<?php
                                wp_nav_menu(
                                    array(
                                        "theme_location" 	=> "header_nav_menu",
                                        "menu_class" 		=> "nav-menu-header fll",
                                        "items_wrap"      	=> '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
                                        "fallback_cb"		=> "ncm_menu_callback_without_default"
                                    )
                                );
                            ?>
                        </div>
					</div>
				</div>
				
			</div>
		</div>
    </div>
	
	<!-- header -->
	<div id="wrapperHeader">
		<div class="container">
			<div class="row">
			
				<!-- left -->
				<div class="span4">
					<div class="site-header">
                        <a class="home-link" href="<?php echo esc_url(home_url("/")); ?>" title="<?php echo esc_attr(get_bloginfo("name", "display")); ?>" rel="home">
                            <h1 class="site-title patternTextColor"><?php bloginfo("name"); ?></h1>
                            <h2 class="site-description"><?php bloginfo("description"); ?></h2>
                        </a>
					</div>
				</div>
				
				<!-- middle -->
				<div class="span6">
					<?php if(isset($ncm_options_general["customer_support"]) && $ncm_options_general["customer_support"] == 1) : ?>
						<div id="telWrapper">
							<img src="<?php echo get_template_directory_uri(); ?>/images/tel-icon.png" alt="Telephone"/>
							<div id="telText">
								<p id="telTitle" class="patternTextColor"><?php _e("CUSTOMER SUPPORT", NCM_I18N_DOMAIN); ?></p>
								<p id="telNumber"><?php echo (ncm_isset_and_not_empty($ncm_options_shop["phone_number"]) ? $ncm_options_shop["phone_number"] : ""); ?></p>
							</div>
						</div>
					<?php endif; ?>
                    
					<div id="socialNetwork">
						<ul>
                            <?php if(ncm_isset_and_not_empty($ncm_options_general["profile_facebook"])) : ?>
								<li class="withOpacity"><a href="<?php echo $ncm_options_general["profile_facebook"]; ?>" target="_blank" data-toggle="tooltip" title="Facebook"><img src="<?php echo get_template_directory_uri(); ?>/images/profile-facebook.png" alt="Facebook" /></a></li>
                            <?php endif; ?>
                            <?php if(ncm_isset_and_not_empty($ncm_options_general["profile_twitter"])) : ?>
								<li class="withOpacity"><a href="<?php echo $ncm_options_general["profile_twitter"]; ?>" target="_blank" data-toggle="tooltip" title="Twitter"><img src="<?php echo get_template_directory_uri(); ?>/images/profile-twitter.png" alt="Twitter" /></a></li>
                            <?php endif; ?>
                            <?php if(ncm_isset_and_not_empty($ncm_options_general["profile_google_plus"])) : ?>
								<li class="withOpacity"><a href="<?php echo $ncm_options_general["profile_google_plus"]; ?>" target="_blank" data-toggle="tooltip" title="Google+"><img src="<?php echo get_template_directory_uri(); ?>/images/profile-gplus.png" alt="Google+" /></a></li>
                            <?php endif; ?>
                            <?php if(ncm_isset_and_not_empty($ncm_options_general["profile_flickr"])) : ?>
								<li class="withOpacity"><a href="<?php echo $ncm_options_general["profile_flickr"]; ?>" target="_blank" data-toggle="tooltip" title="Flickr"><img src="<?php echo get_template_directory_uri(); ?>/images/profile-flickr.png" alt="Flickr" /></a></li>
                            <?php endif; ?>
                            <?php if(ncm_isset_and_not_empty($ncm_options_general["profile_linkedin"])) : ?>
								<li class="withOpacity"><a href="<?php echo $ncm_options_general["profile_linkedin"]; ?>" target="_blank" data-toggle="tooltip" title="LinkedIn"><img src="<?php echo get_template_directory_uri(); ?>/images/profile-linkedin.png" alt="LinkedIn" /></a></li>
                            <?php endif; ?>
                            <?php if(ncm_isset_and_not_empty($ncm_options_general["profile_instagram"])) : ?>
								<li class="withOpacity"><a href="<?php echo $ncm_options_general["profile_instagram"]; ?>" target="_blank" data-toggle="tooltip" title="Instagram"><img src="<?php echo get_template_directory_uri(); ?>/images/profile-instagram.png" alt="Instagram" /></a></li>
                            <?php endif; ?>
                            <?php if(ncm_isset_and_not_empty($ncm_options_general["profile_pinterest"])) : ?>
								<li class="withOpacity"><a href="<?php echo $ncm_options_general["profile_pinterest"]; ?>" target="_blank" data-toggle="tooltip" title="Pinterest"><img src="<?php echo get_template_directory_uri(); ?>/images/profile-pinterest.png" alt="Pinterest" /></a></li>
                            <?php endif; ?>
                            <?php if(ncm_isset_and_not_empty($ncm_options_general["profile_rss"])) : ?>
								<li class="withOpacity"><a href="<?php echo $ncm_options_general["profile_rss"]; ?>" target="_blank" data-toggle="tooltip" title="RSS Feed"><img src="<?php echo get_template_directory_uri(); ?>/images/profile-feed.png" alt="RSS Feed" /></a></li>
                            <?php endif; ?>
						</ul>
					</div>
                    
					<div class="clr"></div>
                    
					<div id="search">
						<form action="<?php echo home_url("/"); ?>" class="searchform" method="get">
                            <input type="text" class="span5 search-bar" name="s" id="s" value="<?php echo(is_search() ? the_search_query() : __("Search products", NCM_I18N_DOMAIN)); ?>" />
                            <input type="hidden" name="post_type" value="product" />
							<?php if(isset($_GET["max_price"]) && !empty($_GET["max_price"])) : ?>
                            	<input type="hidden" name="max_price" value="<?php echo $_GET["max_price"]; ?>" />
                            <?php endif; ?>
							<?php if(isset($_GET["min_price"]) && !empty($_GET["min_price"])) : ?>
								<input type="hidden" name="min_price" value="<?php echo $_GET["min_price"]; ?>" />
                            <?php endif; ?>                            
							<?php if(isset($_GET["orderby"]) && !empty($_GET["orderby"])) : ?>
	                            <input type="hidden" name="orderby" value="<?php echo $_GET["orderby"]; ?>" />
                            <?php endif; ?>
							<?php if(isset($_GET["product_cat"]) && !empty($_GET["product_cat"])) : ?>
	                            <input type="hidden" name="product_cat" value="<?php echo $_GET["product_cat"]; ?>" />
                            <?php endif; ?>
							<?php if(isset($_GET["product_tag"]) && !empty($_GET["product_tag"])) : ?>
	                            <input type="hidden" name="product_tag" value="<?php echo $_GET["product_tag"]; ?>" />
                            <?php endif; ?>
                            <?php if(isset($_GET["view"]) && !empty($_GET["view"])) : ?>
	                            <input type="hidden" name="view" value="<?php echo $_GET["view"]; ?>" />
                            <?php endif; ?>
                            
                            <input type="submit" class="ncm-button search-submit patternBGColor" value="">
                        </form>
					</div>
                    
				</div>
					
				<!-- right -->
				<div class="span2">
					<?php get_template_part("components/cart"); ?>
				</div>
			</div>
		</div>
	</div>
	
	<?php get_template_part("components/menu"); ?>
	
	<!-- main content -->
	<div id="wrapperContent">