<?php
/*
Template Name: FAQ
*/
?>

<?php get_header(); ?>

<?php do_action("ncm_breadcrumb"); ?>

<?php
	global $ncm_options_shop, $ncm_options_blog;
    $showSidebar = isset($ncm_options_blog["enable_sidebar_on_faq"]) && $ncm_options_blog["enable_sidebar_on_faq"] == 1;

	$args = array("post_type" => "faq");
	$query = new WP_Query($args);

	if(!empty($query->posts) && (!isset($ncm_options_shop["enable_faq"]) || (isset($ncm_options_shop["enable_faq"]) && $ncm_options_shop["enable_faq"]))) : ?>

		<?php do_action("ncm_faq_scripts"); ?>

        <!-- content -->
        <div class="container">
            <div class="row">
            
                <!-- contact -->
                <div class="<?php echo ($showSidebar ? 'span8' : 'span12'); ?> <?php echo ncm_set_blog_position_relative_to_sidebar(); ?>">
                    <div id="wrapperBlog">
                        <div id="faq-page">
                            <?php 
								while (have_posts()) : 
									the_post(); 
									get_template_part("blog/content/content-specific-template", get_post_format()); 
								endwhile;
							?>
                            
                            <div id="faq-accordion">
								<?php
                                    $args = array("post_type" => "faq");
                                    $loop = new WP_Query($args);
                                    
                                    while($loop->have_posts()) : $loop->the_post(); 	
                                ?>
                                    <h3 class="withTransitionEffect patternBorderColorHover"><?php echo $post->post_title; ?></h3>
                                    <div><p><?php echo $post->post_content; ?></p></div>    
                                <?php endwhile; ?>
							</div>
                            
                            <?php get_template_part("components/edit-post-link"); ?>
                        </div>    
                    </div>
                </div>

                <?php if($showSidebar) : ?>
				    <?php do_action("ncm_blog_sidebar"); ?>
                <?php endif; ?>

                <?php do_action("ncm_faq_execute_script"); ?>
            </div>
        </div>
	<?php endif; 
?>

<?php get_footer(); ?>