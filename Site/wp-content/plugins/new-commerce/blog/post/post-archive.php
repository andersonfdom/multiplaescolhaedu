<?php
global $ncm_blog_is_grid;
$cont = 0; 
$init_row = true;
?>

<?php if (have_posts()): ?>
	<?php while (have_posts()): $cont++; ?>
        <?php if($init_row && $ncm_blog_is_grid) : ?>
            <?php $init_row = false; ?>
            <div class="row-fluid">
        <?php endif; ?>    
                    
        <?php the_post(); get_template_part("blog/content/content-archive", get_post_format()); ?>
        
        <?php if(($cont % 3 == 0) && $ncm_blog_is_grid) : ?>
            <?php $init_row = true; ?>
            </div>
        <?php endif; ?>
    <?php endwhile;	?>
    
	<?php if(($cont % 3 != 0) && $ncm_blog_is_grid) : ?>
        </div>
    <?php endif; ?>

    <?php get_template_part("components/pagination-blog"); ?>
<?php endif; ?>