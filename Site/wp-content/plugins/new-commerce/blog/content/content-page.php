<!-- content-page -->
<div class="<?php foreach(get_post_class() as $post_class) echo($post_class . " ") ?><?php echo (ncm_is_current_woocommerce() ? "" : "post"); ?>">
    <?php if(!ncm_is_current_woocommerce()) : ?>
		<h1 class="patternTextColor"><?php the_title(); ?></h1>
	<?php endif; ?>
    
    <div class="entry">
        <?php							
            if(has_post_thumbnail())
                the_post_thumbnail("full");
	
            the_content();
        ?>
        <?php 
            ncm_wp_link_pages();
        ?>
		<div class="clr"></div>
        <?php get_template_part("components/edit-post-link"); ?>
    </div>
</div>