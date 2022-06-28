<?php
	/* HOOKS - ADMIN */

	add_action("admin_notices", "ncm_admin_notices");
	add_action("admin_enqueue_scripts", "ncm_load_theme_assets");	
	add_action("admin_menu", "ncm_add_admin_page");
	add_action("admin_init", "ncm_admin_page_init");
	add_action("admin_init", "ncm_ignore_notice_like_us");
	add_action("init", "ncm_init");
	add_action("save_post", "ncm_save_meta", 1, 2);
	
	remove_action("admin_notices", "woothemes_updater_notice");
?>