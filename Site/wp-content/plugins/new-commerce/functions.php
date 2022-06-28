<?php
/*
    Functions.php
*/

// imports automatic update
require_once('functions/theme-functions/library/theme/wp-updates-theme.php');
new WPUpdatesThemeUpdater_1956( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );

// imports the admin
require_once("functions/admin/admin.php");

// imports the function's code
require_once("functions/theme-functions/theme.php");
require_once("functions/theme-functions/woocommerce.php");

// imports the demo-content parser
require_once("functions/importer/new-commerce-importer.php");

// imports the plugin's code
require_once("functions/plugins/lib-plugin.php");

// imports the shortcodes
require_once("functions/shortcodes/wrapper.php");

// if ( file_exists( get_template_directory().'/functions/theme-funcionts/library/theme/wallet-gateway.php' ) ) {
// 	require_once( get_template_directory().'/functions/theme-funcionts/library/theme/wallet-gateway.php' );
// }

?>