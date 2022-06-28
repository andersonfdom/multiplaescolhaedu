<?php
global $ncm_blog_is_grid;
?>

<?php if($ncm_blog_is_grid) : ?>
<div class="row-fluid">
<?php endif; ?>

    <div class="<?php echo ($ncm_blog_is_grid ? "span12" : "span4"); ?> flr">
        <?php get_sidebar(); ?>
    </div>
        
<?php if($ncm_blog_is_grid) : ?>
</div>
<?php endif; ?>