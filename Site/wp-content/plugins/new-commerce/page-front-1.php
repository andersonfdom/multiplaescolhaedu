<?php
/*
Template Name: Front Page
*/
?>

<?php get_header(); ?>

<?php ncm_set_view_mode_lock(); ?>

<div id="wrapperBlog" class="container">
    <div class="row">
    
        <div class="span12">
            <div id="wrapperFront">
            	<div class="stuff <?php foreach(get_post_class() as $post_class) echo($post_class . " ") ?><?php echo (ncm_is_current_woocommerce() ? "" : "post"); ?>">
					<?php if (have_posts()): while (have_posts()): 
                        the_post();
                        get_template_part("blog/content/content-front-page", get_post_format()); 
                    ?>
                    <?php endwhile; endif; ?>
				</div>
            </div>
        
        	<?php echo do_shortcode("[ncm_product_added_message]"); ?>
        
        	<?php get_template_part("components/slides-box-front"); ?>
        </div>
        
    </div>
</div>

<div id="wrapperBottomSidebar">
    <div class="container">
        <div class="row">
            
            <!-- left -->
            <?php get_template_part("components/front-page-banner"); ?>
            
            <!-- mid -->
            <?php get_template_part("components/testimonials"); ?>
            
            <!-- right -->
            <?php get_template_part("components/last-comments"); ?>
            
        </div>
    </div>
</div>
    
<?php get_footer(); ?>