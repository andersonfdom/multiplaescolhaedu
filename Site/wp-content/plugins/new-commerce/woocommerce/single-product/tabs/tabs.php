<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );
if ( ! empty( $tabs ) ) : ?>

	<div id="extra">
		<ul class="tabs wc-tabs">
			<?php foreach ( $tabs as $key => $tab ) : ?>

				<li class="<?php echo esc_attr( $key ); ?>_tab header withOpacityTransitionEffect">
					<a href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ) ?></a>
				</li>

                <script type="text/javascript">
					(function($) {
						"use strict";
							  
						$(document).ready(function() {
							$(".tabs .<?php echo $key ?>_tab").changeProductBox("<?php echo $key ?>");
						});
					})(jQuery);
				</script>
			<?php endforeach; ?>
		</ul>
        
        <div class="clr"></div>
        
		<?php foreach ( $tabs as $key => $tab ) : ?>
			<div class="panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>">
				<?php call_user_func( $tab['callback'], $key, $tab ) ?>
			</div>
		<?php endforeach; ?>
	</div>

<?php endif; ?>

<script type="text/javascript">
	(function($) {
		"use strict";
			  
		$(document).ready(function() {
			if(window.location.hash.indexOf("comment") >= 0) {
				$(".reviews_tab").addClass("current");
				$("#tab-reviews").addClass("current");
			}
		
			if($("#extra .header.current").size() == 0 && $("#extra .entry-content.current").size() == 0) {
				$("#extra .header:first").addClass("current");
				$("#extra .entry-content:first").addClass("current");
			}
		});
	})(jQuery);
</script>