<?php

	function ncm_products_slider_stack_callback() {
		ob_start();
		get_template_part("components/slides-box-stack");
		return ob_get_clean();
	}
	
	function ncm_product_added_message_callback() {
		return 	"<div id='shopindex-message'></div>";
	}
	
	function ncm_button_callback($attrs) {
		extract(shortcode_atts( array(
			'link' => '#',
			'text' => 'Text',
		), $attrs));
		
		return '<a href="' . $link . '" class="ncm-button ncm-button-shortcode patternBGColor">' . $text . '</a>';
	}
	
	function ncm_2arrows_before_link_callback($attrs) {
		extract(shortcode_atts( array(
			'link' => '#',
			'text' => 'Text',
		), $attrs));
		
		return '<a href="' . $link . '" class="ncm-2arrows-before-shortcode withTransitionEffect">' . $text . '</a>';
	}
	
	function ncm_2arrows_after_link_callback($attrs) {
		extract(shortcode_atts( array(
			'link' => '#',
			'text' => 'Text',
		), $attrs));

		return '<a href="' . $link . '" class="ncm-2arrows-after-shortcode withTransitionEffect">' . $text . '</a>';
	}
	
	function ncm_2_banner_area_callback($attrs, $content = null) {
		return "<div class='container'><div class='row-fluid'>" . do_shortcode($content) . "</div></div>";
	}
	
	function ncm_left_banner_callback($attrs) {
		extract(shortcode_atts( array(
			'image' => '#',
			'title' => 'Title',
			'link'	=> '#'
		), $attrs));
		
		return "<div class='span6 fll banner-left'><a href='" . $link . "' title='" . $title . "'><img class='withOpacityTransitionEffect' src='" . $image . "' alt='" . $title . "' title='" . $title . "' /></a></div>";
	}
	
	function ncm_right_banner_callback($attrs) {
		extract(shortcode_atts( array(
			'image' => '#',
			'title' => 'Title',
			'link'	=> '#'
		), $attrs));
		
		return "<div class='span6 flr banner-right'><a href='" . $link . "' title='" . $title . "'><img class='withOpacityTransitionEffect' src='" . $image . "' alt='" . $title . "' title='" . $title . "' /></a></div>";
	}
?>