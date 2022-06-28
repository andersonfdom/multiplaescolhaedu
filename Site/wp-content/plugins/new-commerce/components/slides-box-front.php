<?php do_action("scripts_slides_box"); ?>

<?php ncm_set_view_mode_lock(); ?>

<?php 
global $ncm_options_front;

$totalSlider = $ncm_options_front["products_sliders_count"];
?>

<div class="clr"></div>

<div id="slidesBoxFrontWrapper">
    <div id="slidesBoxProducts" class="productsBox">
        <div id="slider-recent">
			<a class="patternTextColorActive slider-caption" href="#slider-recent"><?php _e("Recent Products", NCM_I18N_DOMAIN); ?></a>
			<div class="slider-arrows flr unselectable" unselectable="on">
				<span class="prev patternTextColorHover withOpacityTransitionEffect">&lt;</span>&nbsp;
            	<span class="next patternTextColorHover withOpacityTransitionEffect">&gt;</span>
            </div>
            <ul class="slides">
                <?php echo do_shortcode('[recent_products per_page="' . $totalSlider . '" orderby="date" order="desc"]'); ?> 
            </ul>
        </div>
        
        <div id="slider-best-sellers" class="slideBackToTop">
        	<a class="patternTextColorActive slider-caption" href="#slider-best-sellers"><?php _e("Best Sellers", NCM_I18N_DOMAIN); ?></a>
			<div class="slider-arrows flr unselectable" unselectable="on">
				<span class="prev patternTextColorHover withOpacityTransitionEffect">&lt;</span>&nbsp;
            	<span class="next patternTextColorHover withOpacityTransitionEffect">&gt;</span>
            </div>
            <ul class="slides">
                <?php echo do_shortcode('[best_selling_products per_page="' . $totalSlider . '" orderby="date" order="desc"]'); ?>
            </ul>
        </div>
    </div>
</div>

<?php do_action("ncm_slides_box_front_execute_script"); ?>