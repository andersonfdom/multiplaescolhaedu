<?php
	/* LIBRARY - REVOLUTION SLIDER */

	// check if the revslider is active
	function ncm_is_revslider_activated() {
		return class_exists("RevSlider");
	}

	// outputs the revslider
	function ncm_output_revslider($id = "") {
		if(ncm_is_revslider_activated()) {
			echo "<div class='wrapperSlider'>";
			
			if(empty($id))
				putRevSlider(1);
			else
				putRevSlider($id);
				
			echo "</div>";
		}
	}
	
	// outputs the revslider on the shopindex
	function ncm_add_revslider_shopindex() {
		global $ncm_options_shop;
				
		if(ncm_isset_and_not_empty($ncm_options_shop["enable_revslider"]) && $ncm_options_shop["enable_revslider"] == 1) {
			if(ncm_isset_and_not_empty($ncm_options_shop["shopindex_revslider_default"]) && $ncm_options_shop["shopindex_revslider_default"] == 1) {
				ncm_output_revslider();
			}
			else {
				if(ncm_isset_and_not_empty($ncm_options_shop["shopindex_revslider_alias"])) {
					ncm_output_revslider($ncm_options_shop["shopindex_revslider_alias"]);
				}
			}
		}
	}
?>