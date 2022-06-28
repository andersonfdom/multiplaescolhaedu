<?php
/**
 * Single Product title
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

?>

<?php if (function_exists("get_field") && get_field('brand_image')) : ?>
    <img data-toggle="tooltip" class="brand-image" src="<?php echo get_field('brand_image'); ?>" title="<?php echo get_field('brand_tooltip'); ?>" />
<?php endif; ?>

<h2 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h2>