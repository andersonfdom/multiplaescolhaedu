<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

$order = wc_get_order( $order_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited

if ( ! $order ) {
	return;
}

$order_items          	= $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note     = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details  = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

// if ( $show_downloads ) {
// 	wc_get_template( 'order/order-downloads.php', array( 'downloads' => $downloads, 'show_title' => true ) );
// }

?>

<div id="order-table" >
    <?php do_action( 'woocommerce_order_details_before_order_table', $order ); ?>

    <h3><?php _e( 'Order Details', 'woocommerce' ); ?></h3>
    
    <div id="orderTableHolder" class="ncm-table">
        <table id="orderTable" class="shop_table order_details">
            <thead>
                <tr>
                    <th class="product-name headerProduct"><span class="rotated">&gt;</span>&nbsp;&nbsp;&nbsp;<?php _e( 'Product', 'woocommerce' ); ?></th>
                    <th class="product-qty headerQnty"><span class="rotated">&gt;</span>&nbsp;&nbsp;&nbsp;<?php _e( 'Qty', NCM_I18N_DOMAIN ); ?></th>
                    <th class="product-total headerTotal"><span class="rotated">&gt;</span>&nbsp;&nbsp;&nbsp;<?php _e( 'Total', 'woocommerce' ); ?></th>
                </tr>
            </thead>

            <tbody>
            <?php
            do_action( 'woocommerce_order_details_before_order_table_items', $order );

            foreach ( $order_items as $item_id => $item ) {
                $product = $item->get_product();

                wc_get_template( 'order/order-details-item.php', array(
                    'order'			     => $order,
                    'item_id'		     => $item_id,
                    'item'			     => $item,
                    'show_purchase_note' => $show_purchase_note,
                    'purchase_note'	     => $product ? $product->get_purchase_note() : '',
                    'product'	         => $product,
                ) );
            }
            
            do_action( 'woocommerce_order_details_after_order_table_items', $order );
            ?>
            </tbody>

            <tfoot>
                <?php
                foreach ( $order->get_order_item_totals() as $key => $total ) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $total['label']; ?></th>
                        <td>&nbsp;</td>
                        <td class="final"><?php echo ( 'payment_method' === $key ) ? esc_html( $total['value'] ) : $total['value']; ?></td>
                    </tr>
                    <?php
                }
                ?>
                <?php if ( $order->get_customer_note() ) : ?>
                    <tr>
                        <th><?php _e( 'Note:', 'woocommerce' ); ?></th>
                        <td>&nbsp;</td>
                        <td><?php echo nl2br( wptexturize( $order->get_customer_note() ) ); ?></td>
                    </tr>
                <?php endif; ?>
            </tfoot>

        </table>
    </div>
</div>

<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>

<?php if ( $show_customer_details ) : ?>
    <?php wc_get_template( 'order/order-details-customer.php', array( 'order' =>  $order ) ); ?>
<?php endif; ?>
