<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); 

global $ncm_options_shop;

ncm_set_view_mode_lock(FALSE);

?>

<div id="wrapperShop" class="container">
	<div class="row-fluid">
    	<div class="span12">
			<?php
                /**
                 * woocommerce_before_main_content hook
                 *
                 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                 * @hooked woocommerce_breadcrumb - 20
                 */
                do_action('woocommerce_before_main_content');
            ?>

                <?php do_action( 'woocommerce_archive_description' ); ?>
            
                <?php if (woocommerce_product_loop()) : ?>
                    <div class="row-fluid">
                        <?php
							/**
							 * woocommerce_before_shop_loop hook
							 *
							 * @hooked woocommerce_result_count - 20 (custom)
							 * @hooked ncm_view_mode_output - 25 (custom)
							 * @hooked woocommerce_catalog_ordering - 30 (custom)
							 */
							do_action( 'woocommerce_before_shop_loop' );
                        ?>
                    </div>
                	
                    <div id="products-with-filter" class="row-fluid">
                        <?php if(isset($ncm_options_shop["sidebar_position"]) && $ncm_options_shop["sidebar_position"] == NCM_ADM_SIDEBAR_POS_ALIGN_L) : ?>                        

							<?php do_action("ncm_shop_sidebar"); ?>
                            
                            <div class="<?php echo (is_active_sidebar("wa-shop-sidebar") && ncm_has_search_product_different_price()) ? ("span9 slidesBoxBorderFilter " . ncm_set_shop_position_relative_to_sidebar()) : "span12"; ?>">                        
                                <div class="productsBox">                            
                                    <?php woocommerce_product_loop_start(); ?>
                                        <?php woocommerce_product_subcategories(); ?>
                                        <?php while ( have_posts() ) : the_post(); ?>
                                            <?php wc_get_template_part( 'content', 'product' ); ?>
                                        <?php endwhile; ?>
                                    <?php woocommerce_product_loop_end(); ?>
                                </div>
                            </div>
                            
						<?php else : ?>

                            <div class="<?php echo (is_active_sidebar("wa-shop-sidebar") && ncm_has_search_product_different_price()) ? ("span9 slidesBoxBorderFilter " . ncm_set_shop_position_relative_to_sidebar()) : "span12"; ?>">                        
                                <div class="productsBox">                            
                                    <?php woocommerce_product_loop_start(); ?>
                                        <?php woocommerce_product_subcategories(); ?>
                                        <?php while ( have_posts() ) : the_post(); ?>
                                            <?php wc_get_template_part( 'content', 'product' ); ?>
                                        <?php endwhile; ?>
                                    <?php woocommerce_product_loop_end(); ?>
                                </div>
                            </div>
                            
                            <?php do_action("ncm_shop_sidebar"); ?>
                            
						<?php endif; ?>
					</div>
                    
                    <?php
                        /**
                         * woocommerce_after_shop_loop hook
                         *
                         * @hooked woocommerce_pagination - 10
                         */
                        do_action( 'woocommerce_after_shop_loop' );
                    ?>
                   
                   	<?php if(is_shop() && !ncm_is_search_product()) : ?>
                        <?php echo do_shortcode("[ncm_products_slider_stack]"); ?>
                    <?php endif; ?>
                    
                <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
                    <?php woocommerce_get_template( 'loop/no-products-found.php' ); ?>
                <?php endif; ?>
            
            <?php
                /**
                 * woocommerce_after_main_content hook
                 *
                 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                 */
                do_action('woocommerce_after_main_content');
            ?>
            
            <?php
                /**
                 * woocommerce_sidebar hook
                 *
                 * @hooked woocommerce_get_sidebar - 10
                 */
                do_action('woocommerce_sidebar');
            ?>
        </div>
	</div>
</div>

<?php get_footer('shop'); ?>