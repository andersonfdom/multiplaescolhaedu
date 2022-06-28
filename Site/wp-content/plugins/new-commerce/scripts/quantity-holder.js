jQuery.fn.extend({
	spinner: function(min, max, step, type, target) {
		jQuery(this).click(function() {
			if(min < 1)
				min = 1;
									
			var valDiv = parseInt(jQuery(target).val());
			var value = (type == "plus" ? valDiv + step : valDiv - step);
			
			if(max >= 1) {
				if(valDiv > max && type == "minus") {
					jQuery(target).val(value);
				}
				else {
					jQuery(target).val(((value >= min && value <= max) ? value : valDiv));
				}
			}
		});
	}
});

jQuery.fn.extend({
	quantity_holder: function(min, max) {
		jQuery(this).change(function() {
			if(min < 1)
				min = 1;
			
			var value = jQuery(this).val();
			
			if(value < min || isNaN(value)) {
				jQuery(this).val(min);
			}
			else if(value > max) {
				jQuery(this).val(max);
			}
		});
	}
});