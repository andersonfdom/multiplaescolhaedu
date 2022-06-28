<?php
	/* LIBRARY - PLUGIN */

	require_once("class-tgm-plugin-activation.php");

	// registers all the necessary / recommended plugins for the New-Commerce
	add_action("tgmpa_register", "ncm_register_required_plugins");
	function ncm_register_required_plugins() {
		$plugins = array(
			array(
				"name"                  => "Revolution Slider",
				"slug"                  => "revslider",
				"source"                => get_template_directory() . "/functions/plugins/revslider.zip",
				"required"              => FALSE,
				"version"               => "",
				"force_activation"      => FALSE,
				"force_deactivation"    => FALSE,
				"external_url"          => ""
			),
			array(
				"name"                  => "Layer Slider",
				"slug"                  => "LayerSlider",
				"source"                => get_template_directory() . "/functions/plugins/LayerSlider.zip",
				"required"              => FALSE,
				"version"               => "",
				"force_activation"      => FALSE,
				"force_deactivation"    => FALSE,
				"external_url"          => ""
			),
			array(
				"name"                  => "Screets Live Chat",
				"slug"                  => "screets-chat",
				"source"                => get_template_directory() . "/functions/plugins/screets-chat.zip",
				"required"              => FALSE,
				"version"               => "",
				"force_activation"      => FALSE,
				"force_deactivation"    => FALSE,
				"external_url"          => ""
			),
			array(
				"name"      			=> "WooCommerce",
				"slug"      			=> "woocommerce",
				"source"                => get_template_directory() . "/functions/plugins/woocommerce.zip",
				"required"              => TRUE,
				"version"               => "3.8.1",
				"force_activation"      => FALSE,
				"force_deactivation"    => FALSE,
				"external_url"          => ""
			),
			array(
				"name"                  => "Wishlist",
				"slug"                  => "yith-woocommerce-wishlist",
				"source"                => get_template_directory() . "/functions/plugins/woocommerce-wishlist.zip",
				"required"              => FALSE,
				"version"               => "1.1.7",
				"force_activation"      => FALSE,
				"force_deactivation"    => FALSE,
				"external_url"          => ""
			),
			array(
				"name"                  => "Compare",
				"slug"                  => "yith-woocommerce-compare",
				"source"                => get_template_directory() . "/functions/plugins/woocommerce-compare.zip",
				"required"              => FALSE,
				"version"               => "1.2.3",
				"force_activation"      => FALSE,
				"force_deactivation"    => FALSE,
				"external_url"          => ""
			),
			array(
				"name"                  => "Font Awesome",
				"slug"                  => "font-awesome",
				"required"              => FALSE,
				"force_deactivation"    => FALSE
			),
			array(
				"name"                  => "Advanced Custom Fields",
				"slug"                  => "advanced-custom-fields",
				"required"              => FALSE,
				"force_deactivation"    => FALSE
			)
		);

		$config = array(
			'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to pre-packaged plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
			'strings'      => array(
				'page_title'                      => __( 'Install Required Plugins', NCM_I18N_DOMAIN ),
				'menu_title'                      => __( 'Install Plugins', NCM_I18N_DOMAIN ),
				'installing'                      => __( 'Installing Plugin: %s', NCM_I18N_DOMAIN ), // %s = plugin name.
				'oops'                            => __( 'Something went wrong with the plugin API.', NCM_I18N_DOMAIN ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', NCM_I18N_DOMAIN ), // %1$s = plugin name(s).
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', NCM_I18N_DOMAIN ), // %1$s = plugin name(s).
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', NCM_I18N_DOMAIN ), // %1$s = plugin name(s).
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', NCM_I18N_DOMAIN ), // %1$s = plugin name(s).
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', NCM_I18N_DOMAIN ), // %1$s = plugin name(s).
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', NCM_I18N_DOMAIN ), // %1$s = plugin name(s).
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', NCM_I18N_DOMAIN ), // %1$s = plugin name(s).
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', NCM_I18N_DOMAIN ), // %1$s = plugin name(s).
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', NCM_I18N_DOMAIN ),
				'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', NCM_I18N_DOMAIN ),
				'return'                          => __( 'Return to Required Plugins Installer', NCM_I18N_DOMAIN ),
				'plugin_activated'                => __( 'Plugin activated successfully.', NCM_I18N_DOMAIN ),
				'complete'                        => __( 'All plugins installed and activated successfully. %s', NCM_I18N_DOMAIN ), // %s = dashboard link.
				'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
			)
		);

		tgmpa($plugins, $config);
	}
?>