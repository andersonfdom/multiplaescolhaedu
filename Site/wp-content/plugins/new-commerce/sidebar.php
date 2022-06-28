<?php if (function_exists("dynamic_sidebar")): ?>
	<?php
	global $ncm_blog_is_grid;
    $grid_class = $ncm_blog_is_grid ? "grid" : "";
    ?>
    
    <div id="wrapperSidebars" class="<?php echo $grid_class; ?>">
    
        <?php if (!is_active_sidebar("sidebar-blog")) : ?>
            <p><?php echo __("The blog sidebar is inactive and doesn't have widgets", NCM_I18N_DOMAIN); ?>.</p>
        <?php endif; ?>
        
        <!-- blog sidebar -->
        <div id="sidebar-top" class="sidebar">
            <?php if (is_active_sidebar("sidebar-blog")) dynamic_sidebar("sidebar-blog"); ?>
        </div>
        
    </div>
<?php endif; ?>