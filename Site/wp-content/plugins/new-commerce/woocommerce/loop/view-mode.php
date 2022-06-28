<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $woocommerce, $wp_query, $ncm_options_shop;

if (1 == $wp_query->found_posts || !woocommerce_products_will_display())
    return;
?>

<?php if (isset($ncm_options_shop["enable_grid_list_toggle"]) && $ncm_options_shop["enable_grid_list_toggle"] == 0) : ?>
    <style type="text/css">
        #wrapper-view-mode {
            visibility: hidden!important;
        }
    </style>
<?php endif; ?>

<div id="wrapper-view-mode" class="span1 offset5 ncm-view-mode">
    <div class="row-fluid flex-mob flex-center-center-mob flex-wrap-mob">
        <a href="<?php echo add_query_arg("view", NCM_VIEW_MODE_GRID) ?>"><img data-toggle="tooltip" data-placement="left" alt="<?php _e("View as grid", NCM_I18N_DOMAIN); ?>" title="<?php _e("View as grid", NCM_I18N_DOMAIN); ?>" class="flr view-mode-grid" src="<?php echo get_template_directory_uri(); ?>/images/view-grid.png"/></a>
        <a href="<?php echo add_query_arg("view", NCM_VIEW_MODE_LIST) ?>"><img data-toggle="tooltip" data-placement="left" alt="<?php _e("View as list", NCM_I18N_DOMAIN); ?>" title="<?php _e("View as list", NCM_I18N_DOMAIN); ?>" class="flr view-mode-list" src="<?php echo get_template_directory_uri(); ?>/images/view-list.png"/></a>
    </div>
</div>