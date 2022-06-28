<?php
	/* LIBRARY - UPLOADER */

	// initiates the uploader
	function ncm_uploader_init() {
		global $pagenow;
		if("media-upload.php" == $pagenow || "async-upload.php" == $pagenow) {
			add_filter("gettext", "ncm_replace_thickbox_text", 1, 3);
		}
	}
	
	// change the text of the button "Use this image", when browsing the gallery from the uploader
	function ncm_replace_thickbox_text($translated_text, $text, $domain) {
		if("Insert into Post" == $text) {
			$referer = strpos(wp_get_referer(), "ncm-page-custom-settings");
			if(!empty($referer)) {
				return __("Choose this one as my logo!", NCM_I18N_DOMAIN);
			}
		}
		
		return $translated_text;
	}
	
	// delete the image from the db
	function ncm_delete_image($image_url) {
		global $wpdb;
	
		$query = "SELECT ID FROM wp_posts where guid = '" . esc_url($image_url) . "' AND post_type = 'attachment'";
		$results = $wpdb->get_results($query);
	
		foreach($results as $row) {
			wp_delete_attachment($row->ID);
		}
	}
?>