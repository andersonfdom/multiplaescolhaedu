<?php do_action("scripts_slides_box"); ?>

<?php ncm_set_view_mode_lock(); ?>

<?php 
global $ncm_options_shop;

$recommended = $ncm_options_shop["enable_slides_recommended"];
$specialOffers = $ncm_options_shop["enable_slides_special_offers"];
$bestSellers = $ncm_options_shop["enable_slides_best_sellers"];
$totalSlider = $ncm_options_shop["products_sliders_count"];

$useRecommended = (ncm_isset_and_not_empty($recommended) && $recommended == 1);
$useSpecialOffers = (ncm_isset_and_not_empty($specialOffers) && $specialOffers == 1);
$useBestSellers = (ncm_isset_and_not_empty($bestSellers) && $bestSellers == 1);
?>

<div class="clear"></div>

<?php if($useRecommended || $useSpecialOffers || $useBestSellers) : ?>
	<div id="slidesBoxStack">
        <div id="slidesBox" class="patternBorderColorWithoutHover">
            <?php if($useRecommended) : ?>
                <a id="recommended" class="patternTextColorHover withTransitionEffect"><?php _e("Recommended", NCM_I18N_DOMAIN); ?></a>
                <?php if($useSpecialOffers || $useBestSellers) : ?>
                    <span class="separator">&nbsp;//&nbsp;</span>
                <?php endif; ?>
            <?php endif; ?>
            <?php if($useSpecialOffers) : ?>
                <a id="special-offers" class="patternTextColorHover withTransitionEffect"><?php _e("Special Offers", NCM_I18N_DOMAIN); ?></a>
                <?php if($useBestSellers) : ?>
                    <span class="separator">&nbsp;//&nbsp;</span>
                <?php endif; ?>				
            <?php endif; ?>
            <?php if($useBestSellers) : ?>
                <a id="best-sellers" class="patternTextColorHover withTransitionEffect"><?php _e("Best Sellers", NCM_I18N_DOMAIN); ?></a>
            <?php endif; ?>
			
			<?php if($useRecommended) : ?>
				<div id="arrows-slider-recommended" class="slider-arrows flr unselectable" unselectable="on">
					<span class="prev patternTextColorHover withOpacityTransitionEffect">&lt;</span>&nbsp;
					<span class="next patternTextColorHover withOpacityTransitionEffect">&gt;</span>
				</div>
			<?php endif; ?>
			<?php if($useSpecialOffers) : ?>
				<div id="arrows-slider-special-offers" class="slider-arrows flr unselectable" unselectable="on">
					<span class="prev patternTextColorHover withOpacityTransitionEffect">&lt;</span>&nbsp;
					<span class="next patternTextColorHover withOpacityTransitionEffect">&gt;</span>
				</div>
			<?php endif; ?>
			<?php if($useBestSellers) : ?>
				<div id="arrows-slider-best-sellers" class="slider-arrows flr unselectable" unselectable="on">
					<span class="prev patternTextColorHover withOpacityTransitionEffect">&lt;</span>&nbsp;
					<span class="next patternTextColorHover withOpacityTransitionEffect">&gt;</span>
				</div>
			<?php endif; ?>
        </div>
        
        <div id="slidesBoxProducts" class="productsBox">
            <?php if($useRecommended) : ?>
                <div id="slider-recommended" class="carousel">
                    <ul class="slides">
                        <?php echo do_shortcode('[featured_products per_page="' . $totalSlider . '" orderby="date" order="desc"]'); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if($useSpecialOffers) : ?>
                <div id="slider-special-offers" class="carousel">
                    <ul class="slides">
                        <?php echo do_shortcode('[sale_products per_page="' . $totalSlider . '" orderby="date" order="desc"]'); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if($useBestSellers) : ?>
                <div id="slider-best-sellers" class="carousel">
                    <ul class="slides">
                        <?php echo do_shortcode('[best_selling_products per_page="' . $totalSlider . '" orderby="date" order="desc"]'); ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="clear"></div>
        
        <?php do_action("ncm_slides_box_stack_execute_script"); ?>
	</div>
<?php endif; ?>