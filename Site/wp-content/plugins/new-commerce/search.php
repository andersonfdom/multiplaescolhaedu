<?php get_header(); ?>

<?php
global $ncm_blog_is_grid;
?>

<!-- content -->
<div class="container">
	<div class="<?php echo ($ncm_blog_is_grid ? "row-fluid" : "row"); ?>">
		
        <!-- search -->
		<div class="<?php echo ($ncm_blog_is_grid ? "span12" : "span8"); ?> <?php echo ncm_set_blog_position_relative_to_sidebar(); ?>">
			<div id="wrapperBlog">
				<div id="archive">
					<div class="archiveTitle"><?php echo __("Posts found related to search term", NCM_I18N_DOMAIN); ?> <span class="patternTextColor">"<?php the_search_query(); ?>"</span></div>
				</div>

				<?php get_template_part("blog/post/post-archive"); ?>
                    
				<?php if(!have_posts()) : ?>
					<!-- case doesn't have posts -->
					<div class="<?php foreach(get_post_class() as $post_class) echo($post_class . " ") ?> <?php echo ($ncm_blog_is_grid ? "grid-404" : ""); ?> post">
						<h2><?php echo __("Nothing Found", NCM_I18N_DOMAIN); ?></h2>
						<h3><?php echo __("Error", NCM_I18N_DOMAIN); ?> 404</h3>
						<p><?php echo __("Sorry, but your search doesn't match any post", NCM_I18N_DOMAIN); ?>.</p>
						<p><?php echo __("Try searching using the form below", NCM_I18N_DOMAIN); ?>: </p>
						<p><?php get_search_form(); ?></p>
					</div>
				<?php endif; ?>
			</div>    
		</div>
		
		<?php do_action("ncm_blog_sidebar"); ?>
        
	</div>
</div>

<?php get_footer(); ?>