<?php global $ncm_options_front; ?>

<?php if(ncm_isset_and_not_empty($ncm_options_front["enable_last_comments"]) && $ncm_options_front["enable_last_comments"] == 1) : ?>
    <div class="span6">
        <div id="lastComments" class="wrapperStuff">
            <div class="stuff">
                <p class="title"><?php _e("LAST COMMENTS", NCM_I18N_DOMAIN); ?></p>
                <?php 
				$args = array(
					"number" => "2",
					"status" => "approve"
				);
				$comments = get_comments($args);
				
				$cont = 0;
				foreach($comments as $comment) : ?>                        
                    <div class="comment <?php echo (++$cont == 1 ? "first" : ""); ?>">
                        <div class="commentsBubble withOpacityTransitionEffect"><a href="<?php echo get_permalink($comment->comment_post_ID); ?>"><?php echo get_comments_number($comment->comment_post_ID); ?></a></div>
                        <?php echo get_avatar($comment, 64); ?>
                        <div class="info">
                            <p class="text"><?php echo substr(strip_tags($comment->comment_content), 0, NCM_MAX_LENGTH_LAST_COMMENTS); ?><?php echo (strlen($comment->comment_content) > NCM_MAX_LENGTH_LAST_COMMENTS ? "&nbsp;[...]" : ""); ?></p>
                            <p class="date patternTextColor">
                                <a href="<?php echo get_permalink($comment->comment_post_ID); ?>"><?php echo date_format(new DateTime($comment->comment_date), "d M Y"); ?></a>
                            </p>
                        </div>
                    </div>
                    <div class="clr"></div>
                <?php endforeach; ?>
                <a data-toggle="tooltip" title="<?php _e("Check our last posts", NCM_I18N_DOMAIN); ?>" href="<?php echo ncm_get_page_for_posts_url(); ?>"><span class="p1 withTransitionEffect">&gt;&gt;</span>&nbsp;&nbsp;<span class="p2 withTransitionEffect"><?php _e("go to blog", NCM_I18N_DOMAIN); ?></span></a>
                <div class="clr"></div>
            </div>
        </div>
    </div>
<?php endif; ?>