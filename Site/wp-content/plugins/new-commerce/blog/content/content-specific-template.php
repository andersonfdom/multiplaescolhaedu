<!-- content-specific-template -->
<h1><?php the_title(); ?></h1>

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
</div>