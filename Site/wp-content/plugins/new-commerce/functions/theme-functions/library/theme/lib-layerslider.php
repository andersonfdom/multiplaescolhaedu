<?php
	/* LIBRARY - LAYERSLIDER */

	// check if the layerslider is active
	function ncm_is_layerslider_activated() {
		return function_exists("layerslider");
	}

	// outputs the layerslider
	function ncm_output_layerslider($id = "") {
		if(ncm_is_revslider_activated()) {
			echo "<div class='wrapperSlider'>";
			
			if(empty($id))
				layerslider(1);
			else
				layerslider($id);
				
			echo "</div>";
		}
	}
	
	// outputs the layerslider on the shopindex
	function ncm_add_layerslider_shopindex() {
		global $ncm_options_shop;
		
		if(ncm_isset_and_not_empty($ncm_options_shop["enable_layerslider"]) && $ncm_options_shop["enable_layerslider"] == 1) {
			if(ncm_isset_and_not_empty($ncm_options_shop["shopindex_layerslider_default"]) && $ncm_options_shop["shopindex_layerslider_default"] == 1) {
				ncm_output_layerslider();
			}
			else {
				if(ncm_isset_and_not_empty($ncm_options_shop["shopindex_layerslider_id"])) {
					ncm_output_layerslider($ncm_options_shop["shopindex_layerslider_id"]);
				}
			}
		}
	}
?>