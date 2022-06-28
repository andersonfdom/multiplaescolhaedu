<?php
/**
 * Checkout coupon form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.4
 */

defined( 'ABSPATH' ) || exit;

global $woocommerce;

if ( ! wc_coupons_enabled() ) {
	return;
}

if ( empty( WC()->cart->applied_coupons ) ) {
	$info_message = apply_filters( 'woocommerce_checkout_coupon_message', __( 'Have a coupon?', 'woocommerce' ) . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'woocommerce' ) . '</a>' );
	wc_print_notice( $info_message, 'notice' );
}
?>

<form class="checkout_coupon" method="post" style="display:none">
    <div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
            	<h3><?php esc_html_e("Redeem your coupon", NCM_I18N_DOMAIN); ?></h3>
				<p class="form-row form-row-first">
					<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
				</p>

				<p class="form-row form-row-last">
					<input type="submit" class="ncm-button patternBGColor" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" />
				</p>

				<div class="clear"></div>
			</div>
		</div>
	</div>
</form>