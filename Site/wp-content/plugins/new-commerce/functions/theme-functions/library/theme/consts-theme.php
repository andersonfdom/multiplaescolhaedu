<?php 
	/* CONSTANTS - THEME */

	/* FAVICON */
	define("NCM_FAVICON_URL", get_template_directory_uri() . "/images/favicon.ico");

	/* VARIABLES WHEN STOCK MANAGEMENTS IS OFF */
	define("NCM_MIN_PRODUCTS_STOCK_MANAGEMENT_OFF", 0);
	define("NCM_MAX_PRODUCTS_STOCK_MANAGEMENT_OFF", 999);
	define("NCM_STEP_PRODUCTS_STOCK_MANAGEMENT_OFF", 1);

	/* UP-SELLS */
	define("NCM_MAX_UPSELLS", 4);

	/* LAST COMMENTS */
	define("NCM_MAX_LENGTH_LAST_COMMENTS", 150);

	/* I18N */
	define("NCM_I18N_DOMAIN", "ncm_translation");
	
	/* PAGINATION MODES */
	define("NCM_PAGINATION_MODE_BLOG", 1);
	define("NCM_PAGINATION_MODE_SHOP", 2);	
	
	/* VIEW MODE */
	define("NCM_VIEW_MODE_GRID", "grid");
	define("NCM_VIEW_MODE_LIST", "list");
?>