<div class="postMetadata">

    <div class="postDate">
		<a href="<?php the_permalink(); ?>" data-toggle="tooltip" title="<?php _e("View this post", NCM_I18N_DOMAIN); ?>">
			<span class="p1"><?php the_time("d"); ?></span><br />
			<span class="p2 patternTextColor"><?php the_time("M"); ?></span>
		</a>
	</div>
    
	<div class="postInnerRight">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="clr"></div>
		<?php if($post->comment_status == "open" || have_comments()) : ?>
			<div class="postComments withOpacityTransitionEffect">
				<?php comments_popup_link(strtolower(__("no comments", NCM_I18N_DOMAIN)), ("1 " . strtolower(__("comment", NCM_I18N_DOMAIN))), strtolower(__("% comments", NCM_I18N_DOMAIN)), "comments-link", ""); ?>
			</div>
		<?php endif; ?>
		<div class="postAuthor"><?php echo __("by", NCM_I18N_DOMAIN); ?>&nbsp;<?php ncm_the_author_posts_link(); ?></div>
	</div>
    
	<div class="clr"></div>
	<div class="postCategory">Categories:&nbsp;<?php the_category(", "); ?></div>
	<div class="postTags"><?php the_tags("Tags: "); ?></div>
    
</div>
<div class="clr"></div>