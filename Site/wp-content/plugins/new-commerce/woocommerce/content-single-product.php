<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product;

$isOnlyCompare = (!ncm_is_wishlist_activated() && ncm_is_compare_activated());
$isOnlyWish = (ncm_is_wishlist_activated() && !ncm_is_compare_activated());

$classCompare = $isOnlyCompare ? " only-compare " : "";
$classWish = $isOnlyWish ? " only-wish " : "";

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<!-- content -->
<div class="container">
	<div class="row-fluid">
		<div class="span12">	
			
			<!-- product -->			
			<div id="wrapperProductView" class="wrapperStuff">
				<div class="row-fluid">
					<div class="span12">
						<div class="stuff">
							<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
                            
								<!-- left -->
								<div class="row-fluid">
									<div class="span4">
										<div id="productView">
											<?php
												/**
												 * woocommerce_show_product_images hook
												 *
												 * @hooked woocommerce_show_product_images - 20
												 * @hooked woocommerce_show_product_sale_flash - 21 (custom)
												 */
												do_action( 'woocommerce_before_single_product_summary' );
											?>
										</div>
									</div>
									
									<!-- right -->
									<div class="span8">
										<div id="productInfo" class="<?php echo ($classCompare . $classWish); ?>">
											<?php
												/**
												 * woocommerce_single_product_summary hook
												 *
												 * @hooked woocommerce_template_single_title - 5
												 * @hooked woocommerce_template_single_meta - 6 (custom)
												 * @hooked woocommerce_template_single_sharing - 7 (custom)
												 * @hooked woocommerce_template_single_excerpt - 8 (custom)
												 * @hooked woocommerce_template_single_price - 10
												 * @hooked woocommerce_template_single_add_to_cart - 30
												 */
												do_action( 'woocommerce_single_product_summary' );
											?>
										</div>
									</div>
								</div>
								
								<div class="row-fluid">
									<div class="span12">
										<?php
											/**
											 * woocommerce_after_single_product_summary hook
											 *
											 * @hooked woocommerce_output_product_data_tabs - 10
											 */
											do_action( 'woocommerce_after_single_product_summary' );
										?>
									</div>
								</div>
                                
							</div><!-- #product-<?php the_ID(); ?> -->
							
							<?php
								/**
								* woocommerce_after_single_product hook
								*
								*/
								 do_action( 'woocommerce_after_single_product' ); 
							 ?>
						</div>
					</div>
				</div>
			</div>
		
			<div class="row-fluid">
				<div class="span12">
					<!-- related products -->
					<?php
						/**
						* ncm_content_single_product_related_products hook
						*
						* @hooked woocommerce_output_related_products - 1 (custom)
						* @hooked woocommerce_output_upsells - 2 (custom)
						*/
						 do_action("ncm_content_single_product_related_products"); 
					 ?>
				 </div>
			 </div>
		</div>
	</div>
</div>