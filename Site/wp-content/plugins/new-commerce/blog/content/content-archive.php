<?php
global $ncm_blog_is_grid, $ncm_options_blog;

$grid_class =  $ncm_blog_is_grid ? "span4 post-grid in" : "";
?>

<!-- content-archive -->
<div class="<?php foreach(get_post_class() as $post_class) echo($post_class . " ") ?> <?php echo $grid_class; ?> post single-post">
    <?php get_template_part("blog/post/post-metadata-archive"); ?>

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
			$text = get_the_content();
			
			if(strlen($text) > $ncm_options_blog["post_grid_call_max_char"]) :
				echo (substr(strip_tags($text), 0, $ncm_options_blog["post_grid_call_max_char"]) . "...");
				echo "<a href='" . get_the_permalink() . "'> &lt;" . __("read more", NCM_I18N_DOMAIN) . "&gt;</a>";
			else:
				echo $text;
			endif;
		else:
			the_content();
		endif;
		
        ?>
        <div class="clr"></div>
        <?php 
            ncm_wp_link_pages();
        ?>
		<div class="clr"></div>
        <?php get_template_part("components/edit-post-link"); ?>
    </div>
</div>

<?php if(!$ncm_blog_is_grid) : ?>
	<?php $ncm_options_blog = ncm_get_option_blog(); ?>
    <?php if(ncm_isset_and_not_empty($ncm_options_blog["enable_copy_post"]) && $ncm_options_blog["enable_copy_post"] == 1) : ?>
        <!-- copy post -->
        <div class="copyPost">
            <h3 class="title patternTextColor"><?php echo __("Copy this post to your website/blog", NCM_I18N_DOMAIN); ?></h3>
            <div>
                <p><?php echo __("Copy the code below and paste into the HTML editor of your blog and you're ready to publish.", NCM_I18N_DOMAIN); ?></p>
                <textarea rows="3" onclick="this.select();"><?php the_content(); ?><br /><?php echo __("Original Post", NCM_I18N_DOMAIN); ?>: <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><br /><?php echo __("Author", NCM_I18N_DOMAIN); ?>: <a href="<?php echo site_url(); ?>" title="<?php echo get_bloginfo('name'); ?>"><?php echo get_bloginfo('name'); ?></a></textarea>
            </div>
        </div>
    <?php endif; ?>
    
    <!-- comments template -->
    <?php comments_template(); ?>
<?php endif; ?>