<?php
global $ncm_blog_is_grid, $ncm_options_blog;

$grid_class =  $ncm_blog_is_grid ? "span4 post-grid in" : "";
?>

<!-- content-index -->
<div class="<?php foreach(get_post_class() as $post_class) echo($post_class . " "); ?>  <?php echo $grid_class; ?>">
    <?php get_template_part("blog/post/post-metadata-index"); ?>

    <div class="entry">
		<?php
        if(has_post_thumbnail()) : ?>
            <?php if($ncm_blog_is_grid) : ?>
                <div class="post-overlay">
            <?php endif; ?>

				<?php the_post_thumbnail($ncm_blog_is_grid ? array($ncm_options_blog["post_grid_call_overlay_width"], $ncm_options_blog["post_grid_call_overlay_height"]) : "full"); ?>

			<?php if($ncm_blog_is_grid) : ?>
                </div>
	        <?php endif;
        endif;

		if($ncm_blog_is_grid) :
			$text = get_the_content("");
			
			if(strlen($text) > $ncm_options_blog["post_grid_call_max_char"]) :
				echo (substr(strip_tags($text), 0, $ncm_options_blog["post_grid_call_max_char"]) . "...");
				echo "<a href='" . get_the_permalink() . "'> &lt;" . __("read more", NCM_I18N_DOMAIN) . "&gt;</a>";
			else:
				echo $text;
			endif;
		else:
			the_content("");
		endif;
        
        ?>
        <div class="clr"></div>
        <?php 
            ncm_wp_link_pages();
        ?>
        <div class="clr"></div>
        <?php get_template_part("components/edit-post-link"); ?>
        <?php get_template_part("blog/post/post-options"); ?>
    </div>
</div>