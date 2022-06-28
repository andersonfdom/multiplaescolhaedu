<?php
	/* LIBRARY - PAGINATION */

	// function to execute the pagination for the blog index
	function ncm_paginate($mode = NCM_PAGINATION_MODE_BLOG) {
		global $wp_query;
		$paged = get_query_var("paged");
		$paged = ($paged == 0) ? 1 : $paged;
		$big = 999999999;
		$pagination;
		
		if($mode == NCM_PAGINATION_MODE_BLOG) {
			$pagination = paginate_links(
				array(
					"base" 		=> str_replace($big, '%#%', get_pagenum_link($big)),
					"format" 	=> "?paged=%#%",
					"current" 	=> max(1, get_query_var("paged")),
					"prev_text" => "&laquo;",
					"next_text" => "&raquo;",
					"total" 	=> $wp_query->max_num_pages
				)
			);
		}
		else {	
			$pagination = paginate_links( apply_filters( 'woocommerce_pagination_args', array(
				'base'         => esc_url( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', htmlspecialchars_decode( get_pagenum_link( 999999999 ) ) ) ) ),
				'format'       => '',
				'current'      => max( 1, get_query_var( 'paged' ) ),
				'total'        => $wp_query->max_num_pages,
				'prev_text'    => '&laquo;',
				'next_text'    => '&raquo;',
				//'type'         => 'list',
				'end_size'     => 3,
				'mid_size'     => 3
			) ) );
		}
		
		echo "<span class=\"pages\">" . __("Page", NCM_I18N_DOMAIN) . "&nbsp;" . $paged . "&nbsp;" . __("of", NCM_I18N_DOMAIN) . "&nbsp;" . $wp_query->max_num_pages . "</span>";
		echo "<span class=\"paginationHolder\">";
		echo str_replace("current", "current patternBGColor", str_replace("page-numbers", "page-numbers withOpacityTransitionEffect patternBGColorHover", $pagination));
		echo "</span>";
	}
	
	function ncm_wp_link_pages( $args = '' ) {
		$defaults = array(
			'before' => '<p class="post-pagination">' . __('Pages:', NCM_I18N_DOMAIN), 
			'after' => '</p>',
			'text_before' => '',
			'text_after' => '',
			'next_or_number' => 'number', 
			'nextpagelink' => '&rarr;',
			'previouspagelink' => "&larr;",
			'pagelink' => '%',
			'echo' => 1
		);
	
		$r = wp_parse_args( $args, $defaults );
		$r = apply_filters( 'wp_link_pages_args', $r );
		extract( $r, EXTR_SKIP );
	
		global $page, $numpages, $multipage, $more, $pagenow;
	
		$output = '';
		if ( $multipage ) {
			if ( 'number' == $next_or_number ) {
				$output .= $before;
				for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
					$j = str_replace( '%', $i, $pagelink );
					$output .= ' ';
					if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
						$output .= _wp_link_page( $i );
					else
						$output .= '<span class="current patternBGColor withOpacityTransitionEffect">';
	
					$output .= $text_before . $j . $text_after;
					if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
						$output .= '</a>';
					else
						$output .= '</span>';
				}
				$output .= $after;
			} else {
				if ( $more ) {
					$output .= $before;
					$i = $page - 1;
					if ( $i && $more ) {
						$output .= _wp_link_page( $i );
						$output .= $text_before . $previouspagelink . $text_after . '</a>';
					}
					$i = $page + 1;
					if ( $i <= $numpages && $more ) {
						$output .= _wp_link_page( $i );
						$output .= $text_before . $nextpagelink . $text_after . '</a>';
					}
					$output .= $after;
				}
			}
		}
	
		$output = str_replace("<a", "<a class='withOpacityTransitionEffect patternBGColorHover'", $output);
	
		if ( $echo )
			echo $output;
	
		return $output;
	}
?>