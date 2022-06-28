<?php get_header(); ?>

<?php
global $ncm_blog_is_grid;
?>

<!-- content -->
<div class="container">
	<div class="<?php echo ($ncm_blog_is_grid ? "row-fluid" : "row"); ?>">
    
		<!-- date -->
		<div class="<?php echo ($ncm_blog_is_grid ? "span12" : "span8"); ?> <?php echo ncm_set_blog_position_relative_to_sidebar(); ?>">
			<div id="wrapperBlog">
				<div id="archive">
					<?php $post = $posts[0]; ?>
					<div class="archiveTitle">
						<?php if (is_day()): ?>
							<?php echo __("Posts from", NCM_I18N_DOMAIN); ?> <span class="patternTextColor">"<?php the_time('F d, Y'); ?>"</span>
						<?php elseif (is_month()): ?>
							<?php echo __("Posts from", NCM_I18N_DOMAIN); ?> <span class="patternTextColor">"<?php the_time('F Y'); ?>"</span>
						<?php else: ?>
							<?php echo __("Posts from", NCM_I18N_DOMAIN); ?> <span class="patternTextColor">"<?php the_time('Y'); ?>"</span>
						<?php endif; ?>
					</div>
				</div>
	
				<?php get_template_part("blog/post/post-archive"); ?>
                    
				<?php if(!have_posts()) : ?>
					<!-- case doesn't have posts -->
					<div class="<?php foreach(get_post_class() as $post_class) echo($post_class . " "); ?> <?php echo ($ncm_blog_is_grid ? "grid-404" : ""); ?> post">
						<h2><?php echo __("Nothing Found", NCM_I18N_DOMAIN); ?></h2>
						<h3><?php echo __("Error", NCM_I18N_DOMAIN); ?> 404</h3>
						<p><?php echo sprintf(__("Sorry, but this blog doesn't have posts published by author \"%s\" yet", NCM_I18N_DOMAIN), $author->nickname); ?>.</p>
						<?php if (is_user_logged_in()): ?>
							<p><?php echo __("Create your posts in the", NCM_I18N_DOMAIN); ?> <a href="<?php echo wp_login_url(get_permalink()); ?>" title="Login"><?php echo __("Administration Panel", NCM_I18N_DOMAIN); ?></a>.</p>
						<?php endif; ?>
					</div>
				<?php endif; ?>
            </div>    
        </div>
			
		<?php do_action("ncm_blog_sidebar"); ?>
        
	</div>
</div>

<?php get_footer(); ?>