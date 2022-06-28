jQuery.fn.extend({
	changeProductBox: function(contentTarget) {
		if(window.location.hash.indexOf(contentTarget) >= 0) {
			jQuery(this).addClass("current");
			jQuery("#tab-" + contentTarget).addClass("current");
		}
		
		jQuery(this).click(function() {
			jQuery("#extra .header").removeClass("current");
			jQuery("#extra .entry-content").removeClass("current");
			
			jQuery(this).addClass("current");
			jQuery("#tab-" + contentTarget).addClass("current");
		});
	}
});