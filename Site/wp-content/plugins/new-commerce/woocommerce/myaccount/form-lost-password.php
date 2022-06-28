<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
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
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

wc_print_notices(); ?>

<div id="wrapperMyacc" class="wrapperStuff">
    <div id="wrapperRecoverPassword" class="stuff">
        <div class="row-fluid"><div class="span12">
            <div class="wrapperStuff">
                <div class="stuff">

                    <?php do_action( 'woocommerce_before_lost_password_form' ); ?>

                    <form method="post" class="lost_reset_password">
                        <h3><?php esc_html_e("Recover your Password", NCM_I18N_DOMAIN); ?></h3>

                        <p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p>

                        <p class="form-row form-row-first">
                            <label for="user_login"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?></label>
                            <input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" />
                        </p>
                    
                        <div class="clear"></div>

                        <?php do_action( 'woocommerce_lostpassword_form' ); ?>

                        <p class="form-row">
                            <input type="hidden" name="wc_reset_password" value="true" />
                            <input type="submit" class="ncm-button patternBGColor" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>" />
                        </p>

                        <?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>
                    </form>

                    <?php do_action( 'woocommerce_after_lost_password_form' ); ?>

                </div>
            </div>
        </div>
    </div>
</div>
    
<!-- hack for this page not closing the parent <div> correctly -->
</div>