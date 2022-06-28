<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

global $glb_ncm_is_inside_cart;

$glb_ncm_is_inside_cart = true;

?>

<!-- content -->
<div class="container">
	<div class="row">
		<div class="span12">

			<?php
            wc_print_notices();
            
            do_action( 'woocommerce_before_cart' ); ?>
            
            <!-- cart -->
			<div id="wrapperCart" class="wrapperStuff">
				<div class="stuff">
            
                    <form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">
						<?php do_action( 'woocommerce_before_cart_table' ); ?>
                        
                        <!-- cart products -->
                        <div id="cartProducts">
                            <table class="ncm-table span12 shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="cart-col-name headerProduct"><span class="rotated">&gt;</span>&nbsp;&nbsp;&nbsp;<?php esc_html_e("PRODUCT", NCM_I18N_DOMAIN); ?></th>
                                        <th class="cart-price headerPrice"><span class="rotated">&gt;</span>&nbsp;&nbsp;&nbsp;<?php esc_html_e("PRICE", NCM_I18N_DOMAIN); ?></th>
                                        <th class="cart-qty headerQnty"><span class="rotated">&gt;</span>&nbsp;&nbsp;&nbsp;<?php esc_html_e("QUANTITY", NCM_I18N_DOMAIN); ?></th>
                                        <th class="cart-total headerTotal"><span class="rotated">&gt;</span>&nbsp;&nbsp;&nbsp;<?php esc_html_e("TOTAL", NCM_I18N_DOMAIN); ?></th>
                                        <th class="cart-btn headerRemove">&nbsp;</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php do_action( 'woocommerce_before_cart_contents' ); ?>
                            
                                    <?php
                                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                        $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                        $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                            ?>
                                            <tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                                                
                                                <td class="cart-col-name">
                                                    <div class="cartProduct">
                                                        <!-- The thumbnail -->
                                                        <div class="colLeft">
                                                            <div class="cartProductThumb">
                                                                <?php
                                                                $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                                                $thumbnail = str_replace('class="', 'class="patternBorderColorHover ', $thumbnail); // for uploaded images
                                                                $thumbnail = (strpos($thumbnail, 'class="patternBorderColorHover') === FALSE) ? str_replace('<img ', '<img class="patternBorderColorHover" ', $thumbnail) : $thumbnail; // for WC default image

                                                                if ( ! $product_permalink )
                                                                    echo $thumbnail; // PHPCS: XSS ok.
                                                                else
                                                                    printf('<a class="withOpacityTransitionEffect" href="%s">%s</a>', esc_url( $product_permalink ), wp_kses_post( $thumbnail ) );
                                                                ?>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Product Name -->
                                                        <div class="colRight">
                                                            <div class="cartProductName patternTextColor">
                                                                <?php
                                                                if ( ! $product_permalink ) {
                                                                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                                                } else {
                                                                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a class="fll" href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                                                }

                                                                echo '<div class="clr"></div>';

                                                                do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                                                                // Meta data
                                                                echo wc_get_formatted_cart_item_data( $cart_item );
                                                                ?>
                                                            </div>
                                                            
                                                            <div class="clr"></div>
                                                            
                                                            <div class="cartProductDescription">
                                                                <?php
                                                                    // Meta data
                                                                    echo $_product->get_attribute("product-cart-description");

                                                                    // Backorder notification
                                                                    if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
												</td>
                                                
                                                <!-- Product price -->
                                                <td class="cart-price number">
                                                    <?php
                                                        echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                                    ?>
                                                </td>
                            					
                                                <!-- Quantity inputs -->
                                                <td class="cart-qty unselectable" unselectable="on">
                                                    <?php
                                                    if ( $_product->is_sold_individually() ) {
                                                        $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                                    } else {
                                                        $product_quantity = woocommerce_quantity_input(
                                                            array(
                                                                'input_name'   => "cart[{$cart_item_key}][qty]",
                                                                'input_value'  => $cart_item['quantity'],
                                                                'max_value'    => $_product->get_max_purchase_quantity(),
                                                                'min_value'    => '0',
                                                                'product_name' => $_product->get_name(),
                                                            ),
                                                            $_product,
                                                            false
                                                        );
                                                    }

                                                    echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
                                                    ?>
                                                </td>
                                                
                                                <!-- Product subtotal -->
                                                <td class="cart-total number">
                                                    <?php
                                                        echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                                                    ?>
                                                </td>
                                                
                                                <!-- Remove from cart link -->
                                                <td class="cart-btn btnRemove">
                                                    <?php
                                                    echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                        'woocommerce_cart_item_remove_link',
                                                        sprintf(
                                                            '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">
                                                                <img data-toggle="tooltip" title="' . esc_html__("Remove from cart", NCM_I18N_DOMAIN) . '" class="withOpacityTransitionEffect" src="' .  get_template_directory_uri() . '/images/btn-remove.png" />
                                                            </a>',
                                                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                            esc_html__( 'Remove this item', 'woocommerce' ),
                                                            esc_attr( $product_id ),
                                                            esc_attr( $_product->get_sku() )
                                                        ),
                                                        $cart_item_key
                                                    );
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }

                                    do_action( 'woocommerce_cart_contents' );
                                    ?>
                                </tbody>
                            </table>
                            
                            <!-- options -->
                            <div id="productsOptions">
                                <?php if ( WC()->cart->coupons_enabled() ) : ?>
                                    <div class="coupon">
                                        <input type="text" id="coupon_code" class="fll after-table" name="coupon_code" value="" placeholder="<?php esc_html_e( 'Coupon code', 'woocommerce' ); ?>" /> 
                                        <input type="submit" id="apply_coupon" class="ncm-button fll patternBGColor after-table" name="apply_coupon" value="<?php esc_html_e( 'APPLY', NCM_I18N_DOMAIN ); ?>" />

                                        <?php do_action('woocommerce_cart_coupon'); ?>
                                    </div>
                                <?php endif; ?>
    
								<input type="submit" class="ncm-button flr patternBGColor after-table" name="update_cart" value="<?php esc_html_e( 'UPDATE CART', NCM_I18N_DOMAIN ); ?>" /> 
                                <input type="submit" class="checkout-button ncm-button flr patternBGColor after-table wc-forward" name="proceed" value="<?php esc_html_e( 'PROCEED TO CHECKOUT', NCM_I18N_DOMAIN ); ?>" />

                                <?php do_action( 'woocommerce_cart_actions' ); ?>

                                <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                            </div>

                            <?php do_action( 'woocommerce_after_cart_contents' ); ?>
                            
                            <div class="clr"></div>

                        </div>
                    </form>

                    <?php do_action( 'woocommerce_after_cart_table' ); ?>
            		
                	<!-- cart totals / shipping calculator -->
					<div id="cartTotal" class="wrapperStuff">
						<div class="stuff">
                        
                            <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

							<div class="container-fluid">
								<div class="row-fluid">
									<div class="span12">
										<?php do_action( 'woocommerce_cart_collaterals' ); ?>
									</div>
								</div>
							</div>
                            
						</div>
					</div>
					<div class="clr"></div>
                
                </div>
            </div>
            
            <?php do_action( 'woocommerce_after_cart' ); ?>
            
            <?php $glb_ncm_is_inside_cart = false; ?>
		</div>
	</div>
</div>