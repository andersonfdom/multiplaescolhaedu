<?php
/**
 * Review order table
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<table id="orderTable" class="shop_table woocommerce-checkout-review-order-table">
    <thead>

        <tr>
            <th class="product-name headerProduct"><span class="rotated">&gt;</span>&nbsp;&nbsp;&nbsp;<?php _e( 'Product', 'woocommerce' ); ?></th>
            <th class="product-qty headerQnty"><span class="rotated">&gt;</span>&nbsp;&nbsp;&nbsp;<?php _e( 'Qty', NCM_I18N_DOMAIN ); ?></th>
            <th class="product-total headerTotal"><span class="rotated">&gt;</span>&nbsp;&nbsp;&nbsp;<?php _e( 'Subtotal', 'woocommerce' ); ?></th>
        </tr>
        
    </thead>

    <tbody>

        <?php
            do_action( 'woocommerce_review_order_before_cart_contents' );

            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    ?>
                    <tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                        <td class="product-name cartProductName patternTextColor">
                            <a target="_blank" href="<?php echo $_product->get_permalink(); ?>">
                                <span class="fll table-label-checkout"><?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ); ?></span>
                                <?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
                            </a>
                        </td>
                        <td>
                            <?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); ?>
                        </td>
                        <td class="product-total">
                            <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
                        </td>
                    </tr>
                    <?php
                }
            }

            do_action( 'woocommerce_review_order_after_cart_contents' );
        ?>

    </tbody>

    <tfoot>

        <tr class="cart-subtotal">
            <th><?php _e( 'Cart Subtotal', 'woocommerce' ); ?></th>
            <td>&nbsp;</td>
            <td><?php wc_cart_totals_subtotal_html(); ?></td>
        </tr>

        <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
            <tr class="cart-discount coupon-<?php echo esc_attr( $code ); ?>">
                <th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
                <td>&nbsp;</td>
                <td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
            </tr>
        <?php endforeach; ?>

        <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

            <?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

            <?php global $glb_ncm_is_checkout; ?>
            <?php $glb_ncm_is_checkout = true; ?>

            <?php wc_cart_totals_shipping_html(); ?>

            <?php $glb_ncm_is_checkout = false; ?>

            <?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

        <?php endif; ?>

        <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
            <tr class="fee">
                <th><?php echo esc_html( $fee->name ); ?></th>
                <td>&nbsp;</td>
                <td><?php wc_cart_totals_fee_html( $fee ); ?></td>
            </tr>
        <?php endforeach; ?>

        <?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
            <?php if ( get_option( 'woocommerce_tax_total_display' ) === 'itemized' ) : ?>
                <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
                    <tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
                        <th><?php echo esc_html( $tax->label ); ?></th>
                        <td>&nbsp;</td>
                        <td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr class="tax-total">
                    <th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
                    <td>&nbsp;</td>
                    <td><?php echo wc_price( WC()->cart->get_taxes_total() ); ?></td>
                </tr>
            <?php endif; ?>
        <?php endif; ?>

        <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

        <tr class="order-total">
            <th><?php _e( 'Order Total', 'woocommerce' ); ?></th>
            <td>&nbsp;</td>
            <td class="final"><?php wc_cart_totals_order_total_html(); ?></td>
        </tr>

        <?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

    </tfoot>
</table>