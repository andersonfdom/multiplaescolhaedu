<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $post, $ncm_options_shop;

$rating = 0;
if(isset($ncm_options_shop["enable_products_custom_review"]) && $ncm_options_shop["enable_products_custom_review"] == 1) {
	$args = array (
		"post_type"		=> "ncm_review_category",
		"orderby"		=> "title",
		"order" 		=> "ASC"
	);
	$query = new WP_Query($args);
	$review_categories = !empty($query->posts) ? $query->posts : array();
	
	foreach($review_categories as $category) {
		$rating += intval(get_comment_meta($comment->comment_ID, ("rating_" . $category->ID), true));
	}
	
	$rating = intval($rating / count($review_categories));
}
else {
	$rating = intval(get_comment_meta($comment->comment_ID, 'rating', true));
}

$verified = wc_review_is_from_verified_owner( $comment->comment_ID );

?>

<li itemprop="reviews" itemscope itemtype="http://schema.org/Review" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">

				<!-- Comment -->
				<div id="comment-<?php comment_ID(); ?>" class="review">
					<!-- Avatar -->
					<?php echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '60' ), '' ); ?>
					<div class="openQuotes"></div>

					<div class="info">
						<!-- Author -->
						<?php if ($comment->comment_approved == '0') : ?>
							<span class="author"><em><?php _e( 'Your comment is awaiting approval', 'woocommerce' ); ?></em></span>
						<?php else : ?>
							<span class="author patternTextColor">
								<?php comment_author(); ?>
								<?php
									if ( get_option('woocommerce_review_rating_verification_label') == 'yes' )
                                        if ( $verified )
											echo '<em class="verified">(' . __( 'verified owner', 'woocommerce' ) . ')</em> ';
								?>&ndash; <time itemprop="datePublished" time datetime="<?php echo get_comment_date('c'); ?>"><?php echo get_comment_date(__( get_option('date_format'), 'woocommerce' )); ?></time>
							</span>
						<?php endif; ?>

						<!-- Star Rating -->
						<?php if ( $rating && get_option( 'woocommerce_enable_review_rating' ) == 'yes' ) : ?>
                            <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" data-toggle="tooltip" title="<?php echo sprintf( __( 'Rated %d out of 5', 'woocommerce' ), $rating ) ?>">
                                <span class="patternTextColor" style="width:<?php echo ( $rating / 5 ) * 100; ?>%"><strong itemprop="ratingValue"><?php echo $rating; ?></strong> <?php _e( 'out of 5', 'woocommerce' ); ?></span>
                            </div>
                        <?php endif; ?>

						<div class="clear"></div>

						<!-- Comment Text -->
						<?php do_action( 'woocommerce_review_before_comment_text', $comment ); ?>

						<div class="description" itemprop="description"><?php comment_text(); ?><div class="closeQuotes"></div></div>
						<div class="clear"></div>

                        <?php do_action( 'woocommerce_review_after_comment_text', $comment ); ?>
					</div>

					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>