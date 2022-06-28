<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
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

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

<?php if ($has_orders) : ?>

    <div id="wrapperMyaccOrders">
        <h3><?php echo apply_filters('woocommerce_my_account_my_orders_title', __('Recent Orders', 'woocommerce')); ?></h3>

        <table class="tableMyaccOrders span12 ncm-table">
            <thead>
            <tr>
                <th class="order-number">
                    <span class="rotated">&gt;</span>&nbsp;&nbsp;&nbsp;<?php esc_html_e('Order', 'woocommerce'); ?></th>
                <th class="order-date">
                    <span class="rotated">&gt;</span>&nbsp;&nbsp;&nbsp;<?php esc_html_e('Date', 'woocommerce'); ?></th>
                <th class="order-status">
                    <span class="rotated">&gt;</span>&nbsp;&nbsp;&nbsp;<?php esc_html_e('Status', 'woocommerce'); ?></th>
                <th class="order-total">
                    <span class="rotated">&gt;</span>&nbsp;&nbsp;&nbsp;<?php esc_html_e('Total', 'woocommerce'); ?></th>
                <th class="order-actions">&nbsp;</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ( $customer_orders->orders as $customer_order ) :
                $order      = wc_get_order( $customer_order );
                $item_count = $order->get_item_count() - $order->get_item_count_refunded();
                ?>
                <tr class="order">
                    <td class="firstCol">
                        <a href="<?php echo esc_url($order->get_view_order_url()); ?>">
                            <?php echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); ?>
                        </a>
                    </td>
                    <td>
                        <time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>
                    </td>
                    <td style="text-align:center; white-space:nowrap; font-weight: bold;">
                        <?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
                    </td>
                    <td>
                        <?php
                        /* translators: 1: formatted order total 2: total order items */
                        printf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), ('<strong>' . $order->get_formatted_order_total() . '</strong>'), $item_count );
                        ?>
                    </td>
                    <td class="lastCol">
                        <?php
                        $actions = wc_get_account_orders_actions( $order );
                        
                        if ( ! empty( $actions ) ) {
                            foreach ( $actions as $key => $action ) {
                                echo '<a href="' . esc_url( $action['url'] ) . '" class="ncm-button patternBGColor withOpacityTransitionEffect ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
                            }
                        }
                        ?>                        
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php do_action('woocommerce_before_account_orders_pagination'); ?>

    <?php if (1 < $customer_orders->max_num_pages) : ?>
        <div class="woocommerce-Pagination">
            <?php if (1 !== $current_page) : ?>
                <a class="woocommerce-Button woocommerce-Button--previous ncm-button patternBGColor" href="<?php echo esc_url(wc_get_endpoint_url('orders', $current_page - 1)); ?>"><?php esc_html_e('Previous', 'woocommerce'); ?></a>
            <?php endif; ?>

            <?php if ($current_page !== intval($customer_orders->max_num_pages)) : ?>
                <a class="woocommerce-Button woocommerce-Button--next ncm-button patternBGColor" href="<?php echo esc_url(wc_get_endpoint_url('orders', $current_page + 1)); ?>"><?php esc_html_e('Next', 'woocommerce'); ?></a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

<?php else : ?>
    <div class="woocommerce-Message woocommerce-Message--info woocommerce-info">
        <a class="woocommerce-Button ncm-button patternBGColor" href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>">
            <?php esc_html_e('Go Shop', 'woocommerce') ?>
        </a>
        <?php esc_html_e('No order has been made yet.', 'woocommerce'); ?>
    </div>
<?php endif; ?>

<?php do_action('woocommerce_after_account_orders', $has_orders); ?>
