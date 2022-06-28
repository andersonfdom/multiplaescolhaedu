<?php
    if (!empty($_SERVER["SCRIPT_FILENAME"]) && "comments.php" == basename($_SERVER["SCRIPT_FILENAME"]))
        die (__("Please, do not load this page directly. Thanks!", NCM_I18N_DOMAIN));
 
    if (post_password_required()) : ?>
        <p class="nocomments"><?php echo __("This post is protected by password. Insert it to see the comments", NCM_I18N_DOMAIN); ?>.</p>
<?php
        return;
    endif;
?>

<?php if(!ncm_is_current_woocommerce()) : ?>
	 <!-- comments -->
	<div id="comments">
 
		<h3 class="title patternTextColor"><?php echo __("Comments", NCM_I18N_DOMAIN); ?></h3>
		
		<div class="commentList">
			<?php 
				if (have_comments()) :
					wp_list_comments(
						array(
							"type" 					=> "all",
							"reverse_top_level" 	=> true,
							"style" 				=> "div",
							"callback" 				=> "ncm_comment_display"
						)
					);
				else:
			?>
				<p><?php echo __("No comments were published for this post yet", NCM_I18N_DOMAIN); ?>.</p>
			<?php endif; ?>
		</div>
		
		<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
			<div class="comments-navigation">
				<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
			</div>
		<?php endif; ?>
		
		<!-- comments form -->
		<?php
			if (comments_open()) :
				comment_form(
					array(
						"comment_notes_before" 	=> "",
						"title_reply" 		   	=> __("Leave your comment", NCM_I18N_DOMAIN),
						"title_reply_to" 	   	=> __("Leave your comment to '%s'", NCM_I18N_DOMAIN),
						"comment_field" 	   	=> '<div><label for="comment">' . __('Message', NCM_I18N_DOMAIN) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>',
						"comment_notes_after"  	=> "",
						"label_submit"		   	=> __("COMMENT", NCM_I18N_DOMAIN),
						"fields" 			   	=> array(
							"author" => '<div><label for="author">' . __('Name', NCM_I18N_DOMAIN) . ( $req ? ' <span class="required">(' . __("required", NCM_I18N_DOMAIN) . ')</span>' : '' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $req . ' /></div>',
							"email"  => '<div><label for="email">' . __('E-mail', NCM_I18N_DOMAIN) . ( $req ? ' <span class="required">(' . __("required, it won't be published", NCM_I18N_DOMAIN) . ')</span>' : '' ) . '</label><input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $req . ' /></div>',
							'url' 	 => '<div><label for="url">' . __( 'Site/Blog', NCM_I18N_DOMAIN) . ' (' . __("optional", NCM_I18N_DOMAIN) . ')</label><input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></div>'
						)
					)
				);
			else :
		?>
			<p><strong><?php echo __("The comments are closed in this post", NCM_I18N_DOMAIN); ?>.</strong></p>
		<?php endif; ?>
	</div>
<?php endif; ?>