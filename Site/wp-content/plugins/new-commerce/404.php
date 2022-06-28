<?php get_header(); ?>

<?php
global $ncm_blog_is_grid;
$grid_class =  $ncm_blog_is_grid ? "span12 grid-404" : "span8";
?>

<!-- content -->
<div class="container">
	<div class="<?php echo ($ncm_blog_is_grid ? "row-fluid" : "row"); ?>">
    
		<!-- 404 -->
		<div class="<?php echo $grid_class; ?> <?php echo ncm_set_blog_position_relative_to_sidebar(); ?>">	
			<div id="wrapperBlog">    
				<div class="post">
					<div class="entry">
						<h2><?php echo sprintf(__("Error %s - Nothing Found", NCM_I18N_DOMAIN), "404"); ?></h2>
						<p><?php echo __("Sorry, but what you are looking for could not be found", NCM_I18N_DOMAIN); ?>.</p>
						<p style="margin-bottom:15px;"><?php echo __("Maybe, it could have been moved to another place or doesn't exist anymore", NCM_I18N_DOMAIN); ?>.</p>
						<p><?php echo __("Try searching what you are looking for using the form below", NCM_I18N_DOMAIN); ?>:</p>
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
			
		<?php do_action("ncm_blog_sidebar"); ?>
        
	</div>
</div>

<?php get_footer(); ?>