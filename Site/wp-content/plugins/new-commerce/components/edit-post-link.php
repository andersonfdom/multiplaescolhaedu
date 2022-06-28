<?php
global $ncm_blog_is_grid;
?>

<p class="edit-post <?php echo ($ncm_blog_is_grid ? "flr" : ""); ?>">
	<?php edit_post_link(is_page() ? 
		__("edit page", NCM_I18N_DOMAIN) : 
		__("edit post", NCM_I18N_DOMAIN)); 
	?>
</p>