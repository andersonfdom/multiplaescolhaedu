<?php
/**
 * Pay for order form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $woocommerce;
?>

<div id="wrapperPay" class="container">
	<div class="row">
		<div class="span12">

            <?php $totals = $order->get_order_item_totals(); ?>
            <form id="order_review" method="post">

                <div id="wrapperCheckout" class="wrapperStuff">
                    <div class="stuff">
                        <div id="order-review-row" class="row-fluid">

                            <div class="span6">
                                <h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
                                <table id="orderTable">
                                    <thead>
                                        <tr>
                                            <th class="product-name headerProduct"><span class="rotated">&gt;</span>&nbsp;&nbsp;&nbsp;<?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
                                            <th class="product-qty headerQnty"><span class="rotated">&gt;</span>&nbsp;&nbsp;&nbsp;<?php esc_html_e( 'Qty', NCM_I18N_DOMAIN ); ?></th>
                                            <th class="product-total headerTotal"><span class="rotated">&gt;</span>&nbsp;&nbsp;&nbsp;<?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                    <?php if ( $totals ) foreach ( $totals as $total ) : ?>
                                        <tr>
                                            <th scope="row"><?php echo $total['label']; ?></th>
                                            <td>&nbsp;</td>
                                            <td class="product-total final"><?php echo $total['value']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tfoot>

                                    <tbody>
                                        <?php 
                                        if ( count( $order->get_items() ) > 0 )
                                            foreach ( $order->get_items() as $item ) :
                                                echo '
                                                    <tr>
                                                        <td class="product-name">' . esc_html($item->get_name()) . '</td>
                                                        <td class="product-quantity">' . esc_html($item['qty']) . '</td>
                                                        <td class="product-subtotal">' . $order->get_formatted_line_subtotal( $item ) . '</td>
                                                    </tr>';
                                            endforeach;
                                        endif;
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="span6">
                                <div id="payment">
                                    <?php if ( $order->needs_payment() ) : ?>
                                        <h3><?php esc_html_e( 'Payment', 'woocommerce' ); ?></h3>
                                        <ul class="payment_methods methods">
                                        <?php
                                            if ( $available_gateways = WC()->payment_gateways->get_available_payment_gateways() ) {
                                                // Chosen Method
                                                if ( sizeof( $available_gateways ) ) {
                                                    current($available_gateways)->set_current();
                                                }

                                                foreach ( $available_gateways as $gateway ) {
                                                    ?>
                                                    <!--
                                                    <li class="payment_method_<?php echo $gateway->id; ?>">
                                                        <input id="payment_method_<?php echo $gateway->id; ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />
                                                        <label for="payment_method_<?php echo $gateway->id; ?>"><?php echo $gateway->get_title(); ?> <?php echo $gateway->get_icon(); ?></label>
                                                        <?php
                                                            if ( $gateway->has_fields() || $gateway->get_description() ) {
                                                                echo '<div class="tooltipBox payment_box payment_method_' . $gateway->id . '" style="display:none;">';
                                                                echo '<div class="tooltipBoxArrow"></div>';
                                                                $gateway->payment_fields();
                                                                echo '</div>';
                                                            }
                                                        ?>
                                                    </li>
                                                    -->
                                                    <?php
                                                    wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
                                                }
                                            } else {

                                                echo '<p>' . apply_filters( 'woocommerce_no_available_payment_methods_message', __( 'Sorry, it seems that there are no available payment methods for your location. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) ) . '</p>';

                                            }
                                        ?>
                                    </ul>
                                    <?php endif; ?>

                                    <div class="form-row">
                                        <?php wp_nonce_field( 'woocommerce-pay', 'woocommerce-pay-nonce' ); ?>
                                        <input type="hidden" name="woocommerce_pay" value="1" />
                                        <?php
                                            do_action( 'woocommerce_pay_order_before_submit' );

                                            echo apply_filters( 'woocommerce_pay_order_button_html', '<input type="submit" class="ncm-button alt patternBGColor" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '" />' );

                                            do_action( 'woocommerce_pay_order_after_submit' );
                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </form>

		</div>
	</div>
</div>