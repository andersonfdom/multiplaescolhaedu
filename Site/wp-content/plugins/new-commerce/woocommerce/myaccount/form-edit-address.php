<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

$page_title = ( 'billing' === $load_address ) ? __( 'Billing address', 'woocommerce' ) : __( 'Shipping address', 'woocommerce' );

?>

<?php wc_print_notices(); ?>

<div id="wrapperMyacc" class="admin-form-editor wrapperStuff">
    <div class="stuff">
        <div class="container-fluid">
            <div class="row-fluid">

                <?php do_action('woocommerce_before_edit_account_address_form'); ?>

                <?php if ( ! $load_address ) : ?>
                    <?php wc_get_template( 'myaccount/my-address.php' ); ?>
                <?php else : ?>
                    <form method="post">
                        <h3><?php echo apply_filters('woocommerce_my_account_edit_address_title', $page_title); ?></h3>

                        <?php do_action("woocommerce_before_edit_address_form_{$load_address}"); ?>

                        <?php foreach ($address as $key => $field) : ?>
                            <?php if ($key == "billing_address_2" || $key == "shipping_address_2") $field["label"] = __("Complement (e.g.: number)", NCM_I18N_DOMAIN); ?>
                            <?php woocommerce_form_field($key, $field, !empty($_POST[$key]) ? wc_clean($_POST[$key]) : $field['value']); ?>
                        <?php endforeach; ?>

                        <div class="woocommerce-address-fields__field-wrapper">
                            <?php
                            foreach ( $address as $key => $field ) {
                                if ($key == "billing_address_2" || $key == "shipping_address_2") {
                                    $field["label"] = __("Complement (e.g.: number)", NCM_I18N_DOMAIN);
                                }
                                woocommerce_form_field( $key, $field, wc_get_post_data_by_key( $key, $field['value'] ) );
                            }
                            ?>
                        </div>

                        <?php do_action("woocommerce_after_edit_address_form_{$load_address}"); ?>

                        <p>
                            <input type="submit" class="ncm-button patternBGColor" name="save_address" value="<?php esc_attr_e('Save Address', 'woocommerce'); ?>"/>
                            <?php wp_nonce_field('woocommerce-edit_address', 'woocommerce-edit-address-nonce'); ?>
                            <input type="hidden" name="action" value="edit_address"/>
                        </p>
                    </form>
                <?php endif; ?>

                <?php do_action('woocommerce_after_edit_account_address_form'); ?>

            </div>
        </div>
    </div>
</div>