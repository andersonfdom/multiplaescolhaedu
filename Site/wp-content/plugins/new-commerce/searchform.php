<form action="<?php echo home_url("/"); ?>" class="searchform">
	<input type="text" name="s" value="<?php echo(is_search() ? the_search_query() : __("Type your search here...", NCM_I18N_DOMAIN)); ?>" />
	<input type="submit" class="search_button" value="<?php echo __("SEARCH", NCM_I18N_DOMAIN); ?>" />
    <div class="clear"></div>
</form>