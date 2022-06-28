<?php if(ncm_is_woocommerce_activated()) : ?>

<div id="cartHeader" class="wrapperStuff">
    <div class="stuff">
        <div class="row-fluid">
        
            <div class="span6 p1">
                <div id="cartHeaderItems">
                    <?php global $woocommerce; ?>
                    <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/cart.png" alt="Cart" />
                    </a>
                    <span id="cartHeaderItemsCount"><?php echo sprintf(_n("%d item", "%d items", $woocommerce->cart->cart_contents_count, NCM_I18N_DOMAIN), $woocommerce->cart->cart_contents_count);?>&nbsp;</span>
                </div>
            </div>
            
            <div class="span6 p2">
                <div id="cartHeaderTotal"><?php echo $woocommerce->cart->get_cart_total(); ?></div>
            </div>
            
        </div>
        
        <div class="row-fluid">
        	<div class="span12">
		        <a id="view-cart" class="withTransitionEffect" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><?php _e("view cart", NCM_I18N_DOMAIN); ?></a>
            </div>
        </div>
        
        <div class="clr"></div>
        <a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>"><div class="ncm-button patternBGColor"><?php _e("CHECKOUT", NCM_I18N_DOMAIN); ?></div></a>
    </div>
</div>

<?php endif; ?>