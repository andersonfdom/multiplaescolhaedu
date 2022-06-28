<?php get_header(); ?>

<?php
global $ncm_blog_is_grid;
?>

<!-- content -->
<div class="container">
	<div class="<?php echo ($ncm_blog_is_grid ? "row-fluid" : "row"); ?>">

        <!-- index -->
		<div class="<?php echo ($ncm_blog_is_grid ? "span12" : "span8"); ?> <?php echo ncm_set_blog_position_relative_to_sidebar(); ?>">
			<div id="wrapperBlog">
            	
                <?php get_template_part("blog/post/post-index"); ?>
                    
				<?php if(!have_posts()) : ?>
					<!-- case doesn't have posts -->
					<div class="<?php foreach(get_post_class() as $post_class) echo($post_class . " ") ?>">
						<h2><?php echo __("Nothing Found", NCM_I18N_DOMAIN); ?></h2>
						<h3><?php echo __("Error", NCM_I18N_DOMAIN); ?> 404</h3>
						<p><?php echo __("Sorry, but this blog doesn't have posts yet", NCM_I18N_DOMAIN); ?>.</p>
						<?php if (is_user_logged_in()): ?>
							<p><?php echo __("Create your posts in the", NCM_I18N_DOMAIN); ?> <a href="<?php echo wp_login_url(get_permalink()); ?>" title="<?php _e("Login", NCM_I18N_DOMAIN); ?>"><?php echo __("Administration Panel", NCM_I18N_DOMAIN); ?></a>.</p>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>    
		</div>

		<?php do_action("ncm_blog_sidebar"); ?>
        
	</div>
</div>
	
<?php get_footer(); ?>