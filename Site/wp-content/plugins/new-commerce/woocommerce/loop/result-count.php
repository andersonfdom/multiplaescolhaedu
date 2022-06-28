<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/result-count.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $wp_query;

if ( ! woocommerce_products_will_display() )
	return;
?>

<div class="container">
    <div class="row-fluid">

        <div id="wrapper-result-count" class="span3 fll">
            <div class="wrapperStuff">
                <div class="stuff">
                    <div class="row-fluid">
                        <p class="ncm-result-count">
                            <?php
                            $paged    = max( 1, $wp_query->get( 'paged' ) );
                            $per_page = $wp_query->get( 'posts_per_page' );
                            $total    = $wp_query->found_posts;
                            $first    = ( $per_page * $paged ) - $per_page + 1;
                            $last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );
                        
                            $total_tag = "<span class='patternTextColor'><strong>" . $total . "</strong></span>";
                            $first_tag = "<span class='patternTextColor'><strong>" . $first . "</strong></span>";
                            $last_tag = "<span class='patternTextColor'><strong>" . $last . "</strong></span>";
                        
                            if ( 1 == $total ) {
                                _e( 'Showing the single result', 'woocommerce' );
                            } elseif ( $total <= $per_page || -1 === $per_page ) {
                                printf( _n( 'Showing all %d result', 'Showing all %d results', $total, 'woocommerce' ), $total );
                            } else {
                                printf( _nx( 'Showing %1$d&ndash;%2$d of %3$d result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, 'with first and last result', 'woocommerce' ), $first, $last, $total );
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>