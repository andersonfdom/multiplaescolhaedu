<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="woocommerce-billing-fields">
    <?php if (wc_ship_to_billing_address_only() && WC()->cart->needs_shipping()) : ?>
        <h3><?php esc_html_e('Billing &amp; Shipping', 'woocommerce'); ?></h3>
    <?php else : ?>
        <h3><?php esc_html_e('Billing Address', 'woocommerce'); ?></h3>
    <?php endif; ?>

    <?php do_action('woocommerce_before_checkout_billing_form', $checkout); ?>

    <?php foreach ($checkout->checkout_fields['billing'] as $key => $field) : ?>
        <?php if ($key == "billing_address_2") $field["label"] = __("Complement (e.g.: number)", NCM_I18N_DOMAIN); ?>
        <?php woocommerce_form_field($key, $field, $checkout->get_value($key)); ?>
    <?php endforeach; ?>

    <?php do_action('woocommerce_after_checkout_billing_form', $checkout); ?>

    <?php if (!is_user_logged_in() && $checkout->is_registration_enabled()) : ?>
        <?php if (!$checkout->is_registration_required()) : ?>
            <p class="form-row form-row-wide create-account">
                <input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked((true === $checkout->get_value('createaccount') || (true === apply_filters('woocommerce_create_account_default_checked', false))), true) ?> type="checkbox" name="createaccount" value="1"/>
                <span><?php esc_html_e('Create an account?', 'woocommerce'); ?></span>
            </p>
        <?php endif; ?>

        <?php do_action('woocommerce_before_checkout_registration_form', $checkout); ?>

        <?php if ($checkout->get_checkout_fields('account')) : ?>
            <div class="create-account">
                <h3><?php esc_html_e("New Account", NCM_I18N_DOMAIN); ?></h3>
                <p><?php esc_html_e('Create an account by entering the information below. If you are a returning customer please login at the top of the page.', 'woocommerce'); ?></p>

                <?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

                    <div class="create-account">
                        <?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
                            <?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
                        <?php endforeach; ?>
                        <div class="clear"></div>
                    </div>

                <?php endif; ?>

                <div class="clear"></div>
            </div>
        <?php endif; ?>

        <?php do_action('woocommerce_after_checkout_registration_form', $checkout); ?>
    <?php endif; ?>
</div>