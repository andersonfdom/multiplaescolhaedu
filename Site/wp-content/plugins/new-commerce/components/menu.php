<div class="clr"></div>

<!-- menu -->
<div id="wrapperMenu">
	<div class="container">
		<div class="navbar">
            <a id="btn-collapse" class="btn ncm-button btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            
            <?php
				wp_nav_menu(
					array(
						"theme_location" 	=> "nav_top",
						"container_class" 	=> "collapse nav-collapse",
						"menu_class" 		=> "nav",
						"items_wrap"      	=> '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
						"fallback_cb"		=> "ncm_menu_callback"
					)
				);
            ?>
		</div>
    </div>
</div>

<?php do_action("ncm_menu_execute_script"); ?>