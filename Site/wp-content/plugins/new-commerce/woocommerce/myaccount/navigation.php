<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<nav class="woocommerce-MyAccount-navigation">
	<ul>
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="withOpacityTransitionEffect <?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<?php 
				switch($endpoint) :
					case 'dashboard': { ?><i class="icon-align-justify"></i><?php } break;
					case 'orders': { ?><i class="icon-shopping-cart"></i><?php } break;
					case 'downloads': { ?><i class="icon-download-alt"></i><?php } break;
					case 'edit-address': { ?><i class="icon-home"></i><?php } break;
					case 'edit-account': { ?><i class="icon-user"></i><?php } break;
					case 'customer-logout': { ?><i class="icon-arrow-left"></i><?php } break;
				endswitch; ?>

				&nbsp;<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
