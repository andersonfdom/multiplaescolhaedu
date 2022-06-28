<?php
/*
Template Name: Blog Page
*/
?>

<?php get_header(); ?>

<?php do_action("ncm_breadcrumb"); ?>

<!-- page -->
<div class="container">
	<div class="row">
    
		<div class="<?php echo (ncm_is_current_woocommerce() ? "span12" : "span8"); ?> <?php echo ncm_set_blog_position_relative_to_sidebar(); ?>">
			<div id="wrapperBlog">
				<?php if (have_posts()): while (have_posts()): 
					the_post();
					get_template_part("blog/content/content-page", get_post_format()); 
				?>
				<?php endwhile;	else: ?>
					<div class="<?php foreach(get_post_class() as $post_class) echo($post_class . " "); ?>">
						<h2><?php echo __("Nothing Found", NCM_I18N_DOMAIN); ?></h2>
						<h3><?php echo __("Error", NCM_I18N_DOMAIN); ?> 404</h3>
						<p><?php echo __("Sorry, but this page cannot be found", NCM_I18N_DOMAIN); ?>.</p>
					</div>
				<?php endif; ?>
			</div>    
		</div>
		
		<?php if(!ncm_is_current_woocommerce()) : ?>
			<?php do_action("ncm_blog_sidebar"); ?>
		<?php endif; ?>
        
	</div>
</div>
		
<?php get_footer(); ?>