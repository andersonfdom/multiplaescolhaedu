<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
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
 * @version 3.4.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div id="order-data" class="wrapperStuff">
	<div class="stuff">
		<header>
			<h3><?php _e( 'Customer Details', 'woocommerce' ); ?></h3>
		</header>

		<div id="accountTableHolder" class="ncm-table">
			<table id="accountTable" class="shop_table shop_table_responsive customer_details">
                <?php if ( $order->get_customer_note() ) : ?>
                    <tr>
                        <th><?php _e( 'Note:', 'woocommerce' ); ?></th>
                        <td><?php echo wptexturize( $order->get_customer_note() ); ?></td>
                    </tr>
                <?php endif; ?>

                <?php if ( $order->get_billing_email() ) : ?>
                    <tr>
                        <th><?php _e( 'Email:', 'woocommerce' ); ?></th>
                        <td><?php echo esc_html( $order->get_billing_email() ); ?></td>
                    </tr>
                <?php endif; ?>

                <?php if ( $order->get_billing_phone() ) : ?>
                    <tr>
                        <th><?php _e( 'Phone:', 'woocommerce' ); ?></th>
                        <td><?php echo esc_html( $order->get_billing_phone() ); ?></td>
                    </tr>
                <?php endif; ?>

                <?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>
			</table>
		</div>
	</div>
</div>

<div class="clear"></div>

<div id="wrapperMyaddr">
    <div class="row-fluid">
        <div class="addresses">

            <div class="span6 wrapperStuff">
                <div class="stuff">
                    <header class="title">
                        <h3><?php esc_html_e( 'Billing Address', 'woocommerce' ); ?></h3>
                    </header>
                    <address>
                        <?php echo wp_kses_post( $order->get_formatted_billing_address( __( 'N/A', 'woocommerce' ) ) ); ?>
                    </address>
                </div>
            </div>

            <?php if ( $show_shipping ) : ?>
                <div class="span6 wrapperStuff">
                    <div class="stuff">
                        <header class="title">
                            <h3><?php esc_html_e( 'Shipping Address', 'woocommerce' ); ?></h3>
                        </header>
                        <address>
                            <?php echo wp_kses_post( $order->get_formatted_shipping_address( __( 'N/A', 'woocommerce' ) ) ); ?>
                        </address>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>