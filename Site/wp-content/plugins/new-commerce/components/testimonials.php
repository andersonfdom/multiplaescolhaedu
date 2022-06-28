<?php do_action("scripts_testimonial"); ?>

<?php global $ncm_options_front; ?>

<?php if(ncm_isset_and_not_empty($ncm_options_front["enable_testimonial"]) && $ncm_options_front["enable_testimonial"] == 1) : ?>
    <div class="span3">
        <div id="testimonials" class="wrapperStuff">
            <div class="stuff">
            
                <p class="title"><?php _e("TESTIMONIALS", NCM_I18N_DOMAIN); ?></p>
                <div id="testimonial-slider" class="flexslider">
                    <ul class="slides">
                        <?php 
                            $args = array(
                                "post_type" => "testimonial"
                            );
                            $loop = new WP_Query($args);
                            while($loop->have_posts()) : $loop->the_post(); 
                        ?>
                            <li>
                                <div class="testmonial">
                                    <p class="openQuotes fll"></p>
                                    <p class="text fll"><?php echo $post->post_content; ?></p>
                                    <div class="clr"></div>
                                    <p class="text2 fll"><?php echo get_post_meta(get_the_ID(), "_testmonial_author", TRUE); ?></p>
                                    <div class="clr"></div>
                                    <p class="text3 fll patternTextColor"><?php echo get_post_meta(get_the_ID(), "_testmonial_date", TRUE); ?></p>
                                    <p>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <div class="arrows flr unselectable" unselectable="on">
                    <span id="testmonial-prev" class="patternTextColorHover withOpacityTransitionEffect">&lt;</span>&nbsp;<span id="testmonial-next" class="patternTextColorHover withOpacityTransitionEffect">&gt;</span>
                </div>
                
            </div>
        </div>
    </div>
    
    <?php do_action("ncm_testimonials_execute_script"); ?>
    
<?php endif; ?>