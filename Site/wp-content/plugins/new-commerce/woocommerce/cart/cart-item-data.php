<?php
/**
 * Cart item data (when outputting non-flat)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 	2.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<dl class="variations fll">
	<?php foreach ( $item_data as $data ) : ?>
        <?php $last = (end($item_data)); ?>

		<dt class="fll variation-<?php echo sanitize_html_class( $data['key'] ); ?>"><?php echo wp_kses_post( $data['key'] ); ?>:</dt>
		<dd class="fll variation-<?php echo sanitize_html_class( $data['key'] ); ?>"><?php echo wp_kses_post( wpautop( $data['display'] ) ); ?></dd>
		<?php if($data !== $last) : ?>
		    <span class="fll">&nbsp;|&nbsp;</span>
        <?php endif; ?>
	<?php endforeach; ?>
</dl>