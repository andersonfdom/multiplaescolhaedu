<?php
global $ncm_blog_is_grid;
?>

<p class="postOptions <?php echo ($ncm_blog_is_grid ? "fll" : ""); ?>">
    <?php if (strstr($post->post_content, "<!--more-->") || has_excerpt()) : ?>
        <a href="<?php the_permalink(); ?>"><?php echo __("read more", NCM_I18N_DOMAIN); ?></a>
    <?php endif; ?>
</p>