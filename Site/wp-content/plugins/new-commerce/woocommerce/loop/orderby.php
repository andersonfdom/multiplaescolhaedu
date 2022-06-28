<?php
/**
 * Show options for ordering
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

		<div id="wrapper-ordering" class="span3">
			<div class="wrapperStuff">
		    	<div class="stuff">
		        	<div class="row-fluid">
					
						<form class="woocommerce-ordering ncm-ordering" method="get">
							<h3><?php _e("Sorting", NCM_I18N_DOMAIN); ?></h3>
							<select name="orderby" class="orderby" aria-label="<?php esc_attr_e( 'Shop order', 'woocommerce' ); ?>">
								<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
									<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
								<?php endforeach; ?>
							</select>
							<input type="hidden" name="paged" value="1" />
							<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
						</form>
						
					</div>
				</div>
			</div>
		</div>

	<!-- closing for resut-count.php -->
	</div>
</div>