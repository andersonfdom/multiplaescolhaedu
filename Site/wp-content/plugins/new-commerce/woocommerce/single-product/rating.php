<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
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

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product, $ncm_options_shop;

if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
	return;
}

if(isset($ncm_options_shop["enable_products_custom_review"]) && $ncm_options_shop["enable_products_custom_review"] == 1) :

	$args = array (
		"post_type"		=> "ncm_review_category",
		"orderby"		=> "title",
		"order" 		=> "ASC"
	);
	$query = new WP_Query($args);
	$review_categories = !empty($query->posts) ? $query->posts : array();
	
	$comments = get_comments(array(
		"post_id" 	=> $product->id,
		"status"	=> "approve"
	));
	$count = count($comments);
	
	if($count > 0) : ?>
    	<p class="average-rating-label fll"><strong><?php _e("Average Rating:", NCM_I18N_DOMAIN); ?></strong></p>
        <div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
        	<a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '<strong class="patternTextColor">%s</strong> customer review', '<strong class="patternTextColor">%s</strong> customer reviews', $count, NCM_I18N_DOMAIN ), '<span itemprop="ratingCount" class="count">' . $count . '</span>' ); ?>)</a>
    <?php endif; ?>
	
		<?php foreach($review_categories as $category) : ?>
			<?php $average = 0; ?>
            <?php foreach($comments as $comment) : ?>
            	<?php $average += intval(get_comment_meta($comment->comment_ID, ("rating_" . $category->ID), true)); ?>
            <?php endforeach; ?>
			<?php $average = ($count > 0) ? round(($average / $count), 1) : 0; ?>
            
			<table>
            	<tr>
                	<td class="td-rating-category-name">
                		<span class="rating-category-name fll"><?php echo $category->post_title; ?></span>
                	</td>
                    <td>
                        <div class="star-rating" data-toggle="tooltip" title="<?php printf( __( 'Rated %s out of 5', 'woocommerce' ), $average ); ?>">
                            <span class="patternTextColor" style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
                                
                                <!--<strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php _e( 'out of 5', 'woocommerce' ); ?>-->

                                <strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( __( 'out of %s5%s', 'woocommerce' ), '<span itemprop="bestRating">', '</span>' ); ?>
								<?php printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $count, 'woocommerce' ), '<span itemprop="ratingCount" class="rating">' . $count . '</span>' ); ?>

                            </span>
                        </div>
	                </td>
                </tr>
            </table>
        <?php endforeach; ?>
    
    <?php if($count > 0) : ?>
	    </div>
        <div class="clear"></div>
    <?php endif; ?>

<?php else :

	$rating_count = $product->get_rating_count();
	$review_count = $product->get_review_count();
	$average = $product->get_average_rating();
	
	if ( $rating_count > 0 ) : ?>	
		<p class="average-rating-label fll"><strong><?php _e("Average Rating:", NCM_I18N_DOMAIN); ?></strong></p>
	
		<div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
			<div class="star-rating" data-toggle="tooltip" title="<?php printf( __( 'Rated %s out of 5', 'woocommerce' ), $average ); ?>">
				<span class="patternTextColor" style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
					<!--<strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php _e( 'out of 5', 'woocommerce' ); ?>-->

					<strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( __( 'out of %s5%s', 'woocommerce' ), '<span itemprop="bestRating">', '</span>' ); ?>
					<?php printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'woocommerce' ), '<span itemprop="ratingCount" class="rating">' . $rating_count . '</span>' ); ?>

				</span>
			</div>

			<?php if ( comments_open() ) : ?>
				<a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '<strong class="patternTextColor">%s</strong> customer review', '<strong class="patternTextColor">%s</strong> customer reviews', $review_count, NCM_I18N_DOMAIN ), '<span itemprop="reviewCount" class="count">' . $review_count . '</span>' ); ?>)</a>
			<?php endif ?>

			<!--<a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '<strong class="patternTextColor">%s</strong> customer review', '<strong class="patternTextColor">%s</strong> customer reviews', $count, NCM_I18N_DOMAIN ), '<span itemprop="ratingCount" class="count">' . $count . '</span>' ); ?>)</a>-->

		</div>
	<?php endif; ?>
	
<?php endif; ?>
	