<!-- slider -->
<?php if(is_shop() && !ncm_is_search_product()) : ?>
	<div id="ncm-slider" class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <?php ncm_add_revslider_shopindex(); ?>
                <?php ncm_add_layerslider_shopindex(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>