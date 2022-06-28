<?php
/**
 * Product quantity inputs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php global $glb_ncm_is_grouped, $glb_ncm_is_inside_cart; ?>

<?php $local_id = "qty_" . esc_attr( ( !$glb_ncm_is_grouped && !$glb_ncm_is_inside_cart ? $input_name : str_replace(array("[", "]"), "", $input_name) ) ); ?>

<div id="quantity" class="unselectable" unselectable="on">
	<?php if(!$glb_ncm_is_inside_cart) : ?>
    	<b><?php esc_html_e('Quantity:', NCM_I18N_DOMAIN) ?>&nbsp;&nbsp;</b>
	<?php endif; ?>
        
	<div id="wrap_<?php echo $local_id; ?>" class="qty">
		<span class="operator minus withOpacityTransitionEffect">-</span>
		<input type="text" 
        	class="qtyValue patternTextColor unselectable" 
            id="<?php echo $local_id; ?>" 
            name="<?php echo esc_attr( $input_name ); ?>" 
            value="<?php echo esc_attr( $input_value ); ?>"  
            title="<?php esc_attr_x( 'Quantity', 'Product quantity input tooltip', NCM_I18N_DOMAIN ) ?>"
            data-toggle="tooltip" />
		<span class="operator plus withOpacityTransitionEffect">+</span>
	</div>
</div>

<?php
	$var_min = (!isset($min_value) || is_null($min_value) || empty($min_value)) ? NCM_MIN_PRODUCTS_STOCK_MANAGEMENT_OFF : esc_attr($min_value);
	$var_max = (!isset($max_value) || is_null($max_value) || empty($max_value)) ? NCM_MAX_PRODUCTS_STOCK_MANAGEMENT_OFF : esc_attr($max_value);
	$var_step = (!isset($step) || is_null($step)) ? NCM_STEP_PRODUCTS_STOCK_MANAGEMENT_OFF : esc_attr($step);
?>

<script type="text/javascript">
	(function($) {
		"use strict";
			  
		$(document).ready(function() {
			$("#wrap_<?php echo $local_id; ?>").children(".qtyValue").quantity_holder(
				<?php echo $var_min; ?>,
				<?php echo $var_max; ?>
			);
										
			$("#wrap_<?php echo $local_id; ?>").children(".operator").each(
				function(index, value) {
					$(this).spinner(
						<?php echo $var_min; ?>,
						<?php echo $var_max; ?>,
						<?php echo $var_step; ?>,
						($(this).html() == "+" ? "plus" : "minus"),
						"#<?php echo $local_id; ?>"
					);
				}
			);
		});
	})(jQuery);
</script>