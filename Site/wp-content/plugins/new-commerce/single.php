<?php get_header(); ?>

<!-- content -->
<div class="container">
    <div class="row">
    
        <!-- single -->
        <div class="span8 <?php echo ncm_set_blog_position_relative_to_sidebar(); ?>">				
            <div id="wrapperBlog">
                <?php get_template_part("blog/post/post-single"); ?>
                    
				<?php if(!have_posts()) : ?>
				<!-- case doesn't have posts -->
					<div class="<?php foreach(get_post_class() as $post_class) echo($post_class . " ") ?>">
						<h2><?php echo __("Nothing Found", NCM_I18N_DOMAIN); ?></h2>
						<h3><?php echo __("Error", NCM_I18N_DOMAIN); ?> 404</h3>
						<p><?php echo __("Sorry, but this post cannot be found", NCM_I18N_DOMAIN); ?>.</p>
					</div>
				<?php endif; ?>
            </div>
        </div>
        
        <?php do_action("ncm_blog_sidebar"); ?>
        
    </div>
</div>

<?php get_footer(); ?>