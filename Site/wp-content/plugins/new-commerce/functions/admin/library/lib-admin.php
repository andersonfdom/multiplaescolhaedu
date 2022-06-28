<?php
	/* LIBRARY - ADMIN */
	
	require_once("consts-admin.php");
	
	// adds a menu separator on the backend's left menu to a specific index
	function add_admin_menu_separator($position) {
		global $menu;
	
		$menu[$position] = array(
			0	=>	"",
			1	=>	"read",
			2	=>	"separator" . $position,
			3	=>	"",
			4	=>	"wp-menu-separator"
		);
	}
	
	// outputs the admin page
	function ncm_admin_page() {
		$name_submit = ncm_admin_options_current() . "[submit]";
		$name_reset = ncm_admin_options_current() . "[reset]";
		
		?>
			<div class="wrap">
            	<div id="ncm-wrapper">
                	<h2 id="panel-title"><?php echo NCM_NAME_TEXT; ?>&nbsp;<?php echo __("Settings", NCM_I18N_DOMAIN); ?></h2>
                    <div id="icon-themes" class="icon32"><br/></div>
                    
                    <?php ncm_admin_tab_pages(ncm_admin_get_current_tab()); ?>
                    
                	<?php if(ncm_admin_get_current_tab()) : ?>
                        <form method="post" action="options.php">
							<?php settings_fields(ncm_admin_options_current()); ?>
                            <?php do_settings_sections("ncm-page-custom-settings"); ?>
                            </div>

                            <?php if(!ncm_is_current_tab_import()) { ?>
                                <input name="<?php echo $name_submit; ?>" id="submit" type="submit" class="button-primary" value="<?php esc_attr_e("Save Changes", NCM_I18N_DOMAIN); ?>" />
							    <input name="<?php echo $name_reset; ?>" id="btn-reset" type="reset" class="button-secondary" value="<?php esc_attr_e("Reset", NCM_I18N_DOMAIN); ?>" />
                            <?php } else { ?>
                                <input name="<?php echo $name_submit; ?>" id="submit" type="button" class="button-primary new_commerce_import" value="<?php esc_attr_e("Import demo content", NCM_I18N_DOMAIN); ?>" />
                            <?php } ?>
                        </form>
                    <?php endif; ?>
				</div>
			</div>
		<?php
	}
	
	// check if its the edit_page for a post type
	function is_edit_page($new_edit = NULL) {
		global $pagenow;
		
		if (!is_admin())
			return false;
		
		if($new_edit == "edit")
			return in_array($pagenow, array("post.php"));
		else if($new_edit == "new")
			return in_array($pagenow, array("post-new.php"));
		else
			return in_array($pagenow, array("post.php", "post-new.php"));
	}
?>