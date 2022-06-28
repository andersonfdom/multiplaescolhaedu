<?php
/* TAB - SHOP */

// adds all the controls for the Shop tab
function ncm_tab_shop_add_settings()
{
    add_settings_section("ncm_section_tab_shop_1", "", "ncm_tab_shop_section_1_text", "ncm-page-custom-settings");
    add_settings_section("ncm_section_tab_shop_2", "", "ncm_tab_shop_section_2_text", "ncm-page-custom-settings");
    //add_settings_section("ncm_section_tab_shop_3", "", "ncm_tab_shop_section_3_text", "ncm-page-custom-settings");
    //add_settings_section("ncm_section_tab_shop_4", "", "ncm_tab_shop_section_4_text", "ncm-page-custom-settings");
    add_settings_section("ncm_section_tab_shop_5", "", "ncm_tab_shop_section_5_text", "ncm-page-custom-settings");
    add_settings_section("ncm_section_tab_shop_6", "", "ncm_tab_shop_section_6_text", "ncm-page-custom-settings");
    add_settings_section("ncm_section_tab_shop_7", "", "ncm_tab_shop_section_7_text", "ncm-page-custom-settings");
    add_settings_section("ncm_section_tab_shop_8", "", "ncm_tab_shop_section_8_text", "ncm-page-custom-settings");
    add_settings_section("ncm_section_tab_shop_9", "", "ncm_tab_shop_section_9_text", "ncm-page-custom-settings");
    $sizeText = 25;
    $sizeSpinner = 10;

    // SECTION 1
    // ----------------------------------------------
    // -- Shop Options
    // ----------------------------------------------
    // Shop Phone Number
    $args = array(
        "handle" => "ncm_phone_number"
    , "type" => "text"
    , "index" => "phone_number"
    , "size" => $sizeText
    , "label_for" => "ncm_phone_number"
    );
    add_settings_field($args["handle"], __("Phone Number", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_1", $args);

    // Shop Address
    $args = array(
        "handle" => "ncm_shop_address"
    , "type" => "tinymce"
    , "index" => "shop_address"
    , "textarea_rows" => 5
    , "textarea_cols" => 80
    , "label_for" => "ncm_shop_address"
    , "second_td_output" => "<p><em>" . __("This can be your full address e.g.:<br/>30 South Park Avenue<br/>San Francisco, CA 94108<br/>USA", NCM_I18N_DOMAIN) . "</em></p>"
    );
    add_settings_field($args["handle"], __("Address", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_1", $args);

    // SECTION 2
    // ----------------------------------------------
    // -- Shop Map
    // ----------------------------------------------
    // Coordinates - Latitude
    $args = array(
        "handle" => "ncm_shop_latitude"
    , "type" => "text"
    , "index" => "shop_latitude"
    , "size" => $sizeText
    , "label_for" => "ncm_shop_latitude"
    , "second_td_output" => "<p><em>" . __("You can use any coordinates online service to discover your latitude", NCM_I18N_DOMAIN) . "</em></p>"
    );
    add_settings_field($args["handle"], __("Latitude", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_2", $args);

    // Coordinates - Longitude
    $args = array(
        "handle" => "ncm_shop_longitude"
    , "type" => "text"
    , "index" => "shop_longitude"
    , "size" => $sizeText
    , "label_for" => "ncm_shop_longitude"
    , "second_td_output" => "<p><em>" . __("You can use any coordinates online service to discover your longitude", NCM_I18N_DOMAIN) . "</em></p>"
    );
    add_settings_field($args["handle"], __("Longitude", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_2", $args);

    // Default Zoom
    $args = array(
        "handle" => "ncm_shop_map_zoom"
    , "type" => "spinner"
    , "index" => "shop_map_zoom"
    , "size" => $sizeSpinner
    , "label_for" => "ncm_shop_map_zoom"
    , "default" => NCM_ADM_MAP_ZOOM
    , "spinner_max" => 21
    , "spinner_min" => 1
    , "second_td_output" => "<p><em>" . __("Bigger values (max of 21), means more zoom and vice versa", NCM_I18N_DOMAIN) . "</em></p>"
    );
    add_settings_field($args["handle"], __("Default zoom", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_2", $args);

    // Maximum Zoom
    $args = array(
        "handle" => "ncm_shop_map_zoom_max"
    , "type" => "spinner"
    , "index" => "shop_map_zoom_max"
    , "size" => $sizeSpinner
    , "label_for" => "ncm_shop_map_zoom_max"
    , "default" => NCM_ADM_MAP_ZOOM_MAX
    , "spinner_max" => 21
    , "spinner_min" => 2
    );
    add_settings_field($args["handle"], __("Maximum zoom", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_2", $args);

    // Minimum Zoom
    $args = array(
        "handle" => "ncm_shop_map_zoom_min"
    , "type" => "spinner"
    , "index" => "shop_map_zoom_min"
    , "size" => $sizeSpinner
    , "label_for" => "ncm_shop_map_zoom_min"
    , "default" => NCM_ADM_MAP_ZOOM_MIN
    , "spinner_max" => 20
    , "spinner_min" => 1
    );
    add_settings_field($args["handle"], __("MInimum zoom", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_2", $args);

    // Google Maps Key
    $args = array(
        "handle" => "ncm_shop_map_key"
    , "type" => "text"
    , "index" => "shop_map_key"
    , "size" => $sizeText
    , "label_for" => "ncm_shop_map_key"
    , "second_td_output" => "<p><em>" . __("It's REQUIRED to use your own key for the map to work. Generate your own key here: ", NCM_I18N_DOMAIN) . "<a href='https://developers.google.com/maps/documentation/javascript/get-api-key?#key' target='_blank'>Link</a></em></p>"
    );
    add_settings_field($args["handle"], __("Google's Map Key", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_2", $args);

    /*
    // SECTION 3
    // ----------------------------------------------
    // -- Shopindex Revolution Slider
    // ----------------------------------------------
    // Revolution Slider Default
    $args = array (
        "handle" 			=> "ncm_shopindex_revslider_default"
    ,	"type"				=> "checkbox"
    ,	"index"				=> "shopindex_revslider_default"
    ,	"label_for"			=> "ncm_shopindex_revslider_default"
    ,	"default"			=> 1
    ,	"second_td_output"	=> "<p><em>" . __("Enable this option if you wish to use the default Revolution Slider (1st one, you have created).<br/>Else, disable this option and use the Alias field", NCM_I18N_DOMAIN) . "</em></p>"
    );
    add_settings_field($args["handle"], __("Revolution Slider Default", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_3", $args);

    $options_shop = ncm_get_option_shop();
    $revslider_use_default = (empty($options_shop["shopindex_revslider_default"]) ? 0 : 1);

    // Revolution Slider Alias
    $args = array (
        "handle" 			=> "ncm_shopindex_revslider_alias"
    ,	"type"				=> "text"
    ,	"index"				=> "shopindex_revslider_alias"
    ,	"size"				=> $sizeText
    ,	"label_for"			=> "ncm_shopindex_revslider_alias"
    ,	"second_td_output"	=> "<p><em>" . __("First, create a new slider on the Revolution Slider Menu (or use one that has been already created), and then, copy/paste it's alias here", NCM_I18N_DOMAIN) . "</em></p>"
    ,	"js"				=>
            "jQuery(document).ready(function($) {
                var obj = $('#ncm_shopindex_revslider_alias');

                if(1 == " . $revslider_use_default . ") {
                    $(obj).attr('readonly', 'readonly');
                }

                $('#ncm_shopindex_revslider_default').click(function() {
                    if(obj.attr('readonly') != 'readonly') {
                        $(obj).attr('readonly', 'readonly');
                    }
                    else {
                        $(obj).removeAttr('readonly');
                    }
                });
            });"
    );
    add_settings_field($args["handle"], __("Revolution Slider Alias", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_3", $args);

    // SECTION 4
    // ----------------------------------------------
    // -- Shopindex Layer Slider
    // ----------------------------------------------
    // Layer Slider Default
    $args = array (
        "handle" 			=> "ncm_shopindex_layerslider_default"
    ,	"type"				=> "checkbox"
    ,	"index"				=> "shopindex_layerslider_default"
    ,	"label_for"			=> "ncm_shopindex_layerslider_default"
    ,	"default"			=> 1
    ,	"second_td_output"	=> "<p><em>" . __("Enable this option if you wish to use the default Layer Slider (1st one, you have created).<br/>Else, disable this option and use the ID field", NCM_I18N_DOMAIN) . "</em></p>"
    );
    add_settings_field($args["handle"], __("Layer Slider Default", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_4", $args);

    $options_shop = ncm_get_option_shop();
    $layerslider_use_default = (empty($options_shop["shopindex_layerslider_default"]) ? 0 : 1);

    // Layer Slider ID
    $args = array (
        "handle" 			=> "ncm_shopindex_layerslider_id"
    ,	"type"				=> "text"
    ,	"index"				=> "shopindex_layerslider_id"
    ,	"size"				=> $sizeText
    ,	"label_for"			=> "ncm_shopindex_layerslider_id"
    ,	"second_td_output"	=> "<p><em>" . __("First, create a new slider on the Layer Slider Menu (or use one that has been already created), and then, copy/paste it's ID here", NCM_I18N_DOMAIN) . "</em></p>"
    ,	"js"				=>
            "jQuery(document).ready(function($) {
                var obj = $('#ncm_shopindex_layerslider_id');

                if(1 == " . $layerslider_use_default . ") {
                    $(obj).attr('readonly', 'readonly');
                }

                $('#ncm_shopindex_layerslider_default').click(function() {
                    if(obj.attr('readonly') != 'readonly') {
                        $(obj).attr('readonly', 'readonly');
                    }
                    else {
                        $(obj).removeAttr('readonly');
                    }
                });
            });"
    );
    add_settings_field($args["handle"], __("Layer Slider ID", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_4", $args);
    */

    // SECTION 5
    // ----------------------------------------------
    // -- Sidebar Position
    // ----------------------------------------------
    // Left Align
    $args = array(
        "handle" => "ncm_sidebar_position_left"
    , "type" => "radio"
    , "index" => "sidebar_position"
    , "label_for" => "ncm_sidebar_position_left"
    , "radio_pair" =>
            array(
                "text" => __("Left Align", NCM_I18N_DOMAIN)
            , "value" => NCM_ADM_SIDEBAR_POS_ALIGN_L
            )
    , "default" => NCM_ADM_SIDEBAR_POS_ALIGN_L
    );
    add_settings_field($args["handle"], __("Sidebar Align Position", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_5", $args);

    // Right Align
    $args = array(
        "handle" => "ncm_sidebar_position_right"
    , "type" => "radio"
    , "index" => "sidebar_position"
    , "label_for" => "ncm_sidebar_position_right"
    , "radio_pair" =>
            array(
                "text" => __("Right Align", NCM_I18N_DOMAIN)
            , "value" => NCM_ADM_SIDEBAR_POS_ALIGN_R
            )
    , "default" => NCM_ADM_SIDEBAR_POS_ALIGN_L
    );
    add_settings_field($args["handle"], "", "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_5", $args);

    // SECTION 6
    // ----------------------------------------------
    // -- View mode
    // ----------------------------------------------
    // Grid
    $args = array(
        "handle" => "ncm_default_view_mode_grid"
    , "type" => "radio"
    , "index" => "default_view_mode"
    , "label_for" => "ncm_default_view_mode_grid"
    , "radio_pair" =>
            array(
                "text" => __("Grid View", NCM_I18N_DOMAIN)
            , "value" => NCM_ADM_DEFAULT_VIEW_MODE_GRID
            )
    , "default" => NCM_ADM_DEFAULT_VIEW_MODE_GRID
    );
    add_settings_field($args["handle"], __("Default View Mode", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_6", $args);

    // List
    $args = array(
        "handle" => "ncm_sidebar_position_right_list"
    , "type" => "radio"
    , "index" => "default_view_mode"
    , "label_for" => "ncm_sidebar_position_right_list"
    , "radio_pair" =>
            array(
                "text" => __("List View", NCM_I18N_DOMAIN)
            , "value" => NCM_ADM_DEFAULT_VIEW_MODE_LIST
            )
    , "default" => NCM_ADM_DEFAULT_VIEW_MODE_GRID
    );
    add_settings_field($args["handle"], "", "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_6", $args);

    // SECTION 7
    // ----------------------------------------------
    // -- Products Total
    // ----------------------------------------------

    // Main loop total products
    $args = array(
        "handle" => "ncm_products_main_count"
    , "type" => "spinner"
    , "index" => "products_main_count"
    , "size" => $sizeSpinner
    , "label_for" => "ncm_products_main_count"
    , "default" => NCM_TOTAL_PRODUCTS_MAIN
    );
    add_settings_field($args["handle"], __("Shop Index Total Products", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_7", $args);

    // Slider total products
    $args = array(
        "handle" => "ncm_products_sliders_count"
    , "type" => "spinner"
    , "index" => "products_sliders_count"
    , "size" => $sizeSpinner
    , "label_for" => "ncm_products_sliders_count"
    , "default" => NCM_TOTAL_PRODUCTS_SLIDERS
    , "second_td_output" => "<p><em>" . __("Products which appears inside a slider (like Recommeded Products or Featured Products)", NCM_I18N_DOMAIN) . "</em></p>"
    );
    add_settings_field($args["handle"], __("Sliders Total Products", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_7", $args);

    // SECTION 8
    // ----------------------------------------------
    // -- Features
    // ----------------------------------------------
    $second_td_output_raw = __("Enable / Disable %s", NCM_I18N_DOMAIN);
    $second_td_output = "<p><em>" . sprintf($second_td_output_raw, "") . "</em></p>";

    // FAQ
    $args = array(
        "handle" => "ncm_enable_faq"
    , "type" => "checkbox"
    , "index" => "enable_faq"
    , "label_for" => "ncm_enable_faq"
    , "default" => 1
    , "second_td_output" => $second_td_output
    );
    add_settings_field($args["handle"], __("FAQ Page", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_8", $args);

    // Contact
    $args = array(
        "handle" => "ncm_enable_contact"
    , "type" => "checkbox"
    , "index" => "enable_contact"
    , "label_for" => "ncm_enable_contact"
    , "default" => 1
    , "second_td_output" => $second_td_output
    );
    add_settings_field($args["handle"], __("Contact Page", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_8", $args);

    // Products Custom Review
    $args = array(
        "handle" => "ncm_enable_products_custom_review"
    , "type" => "checkbox"
    , "index" => "enable_products_custom_review"
    , "label_for" => "ncm_enable_products_custom_review"
    , "default" => 0
    , "second_td_output" => $second_td_output
    );
    add_settings_field($args["handle"], __("Products Custom Review", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_8", $args);

    // Slides - Recommended
    $args = array(
        "handle" => "ncm_enable_slides_recommended"
    , "type" => "checkbox"
    , "index" => "enable_slides_recommended"
    , "label_for" => "ncm_enable_slides_recommended"
    , "default" => 1
    , "second_td_output" => $second_td_output
    );
    add_settings_field($args["handle"], __("Recommended Products Slides", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_8", $args);

    // Slides - Special Offers
    $args = array(
        "handle" => "ncm_enable_slides_special_offers"
    , "type" => "checkbox"
    , "index" => "enable_slides_special_offers"
    , "label_for" => "ncm_enable_slides_special_offers"
    , "default" => 1
    , "second_td_output" => $second_td_output
    );
    add_settings_field($args["handle"], __("Special Offers Products Slides", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_8", $args);

    // Slides - Best Sellers
    $args = array(
        "handle" => "ncm_enable_slides_best_sellers"
    , "type" => "checkbox"
    , "index" => "enable_slides_best_sellers"
    , "label_for" => "ncm_enable_slides_best_sellers"
    , "default" => 1
    , "second_td_output" => $second_td_output
    );
    add_settings_field($args["handle"], __("Best Sellers Products Slides", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_8", $args);

    // Slides - Best Sellers
    $args = array(
        "handle" => "ncm_enable_grid_list_toggle"
    , "type" => "checkbox"
    , "index" => "enable_grid_list_toggle"
    , "label_for" => "ncm_enable_grid_list_toggle"
    , "default" => 1
    , "second_td_output" => $second_td_output
    );
    add_settings_field($args["handle"], __("Grid / View toggle button", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_8", $args);


    // SECTION 9
    // ----------------------------------------------
    // -- Product layout on loop
    // ----------------------------------------------

    // Product margin bottom
    $args = array(
        "handle" => "ncm_product_layout_margin_bottom"
    , "type" => "spinner"
    , "index" => "product_layout_margin_bottom"
    , "size" => $sizeSpinner
    , "label_for" => "ncm_product_layout_margin_bottom"
    , "default" => NCM_PRODUCT_MARGIN_BOTTOM_DEFAULT
    , "spinner_max" => 999
    , "spinner_min" => 1
    , "second_td_output" => "<p><em>" . __("This setting may be useful to help fit products with big images (in px)", NCM_I18N_DOMAIN) . "</em></p>"
    );
    add_settings_field($args["handle"], __("Product margin bottom", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_9", $args);

    /*
    // Revolution Slider
    $second_td_output = "<p><em>" . sprintf($second_td_output_raw, sprintf(__("(Enabling this option will disable the %s)", NCM_I18N_DOMAIN), "Layer Slider")) . "</em></p>";
    $args = array (
        "handle" 			=> "ncm_enable_revslider"
    ,	"type"				=> "checkbox"
    ,	"index"				=> "enable_revslider"
    ,	"label_for"			=> "ncm_enable_revslider"
    ,	"default"			=> 0
    ,	"second_td_output"	=> $second_td_output
    ,	"js"				=>
            "jQuery(document).ready(function($) {
                $('#ncm_enable_revslider').click(function() {
                    $('#ncm_enable_layerslider').prop('checked', false);
                });
            });"
    );
    add_settings_field($args["handle"], __("Revolution Slider", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_8", $args);

    // Layer Slider
    $second_td_output = "<p><em>" . sprintf($second_td_output_raw, sprintf(__("(Enabling this option will disable the %s)", NCM_I18N_DOMAIN), "Revolution Slider")) . "</em></p>";
    $args = array (
        "handle" 			=> "ncm_enable_layerslider"
    ,	"type"				=> "checkbox"
    ,	"index"				=> "enable_layerslider"
    ,	"label_for"			=> "ncm_enable_layerslider"
    ,	"default"			=> 0
    ,	"second_td_output"	=> $second_td_output
    ,	"js"				=>
            "jQuery(document).ready(function($) {
                $('#ncm_enable_layerslider').click(function() {
                    $('#ncm_enable_revslider').prop('checked', false);
                });
            });"
    );
    add_settings_field($args["handle"], __("Layer Slider", NCM_I18N_DOMAIN), "ncm_admin_page_render_input", "ncm-page-custom-settings", "ncm_section_tab_shop_8", $args);
    */
}

// the text output for the 1st section
function ncm_tab_shop_section_1_text()
{
    echo '<div class="postbox">';
    echo "<h3 class='box-title'>" . __("Shop Options", NCM_I18N_DOMAIN) . "</h3>";
    echo "<div class='box-description'>";
    echo "<p>" . __("Customize some information about your store", NCM_I18N_DOMAIN) . ":</p>";
    echo "</div>";
}

// the text output for the 2nd section
function ncm_tab_shop_section_2_text()
{
    echo "</div>";
    echo '<div class="postbox">';
    echo "<h3 class='box-title'>" . __("Shop Map", NCM_I18N_DOMAIN) . "</h3>";
    echo "<div class='box-description'>";
    echo "<p>" . __("Configure the settings of your shop's contact page map", NCM_I18N_DOMAIN) . ":</p>";
    echo "</div>";
}

// the text output for the 3rd section
function ncm_tab_shop_section_3_text()
{
    echo "</div>";
    echo '<div class="postbox">';
    echo "<h3 class='box-title'>" . __("Revolution Slider", NCM_I18N_DOMAIN) . "</h3>";
    echo "<div class='box-description'>";
    echo "<p>" . __("Customize the information about the Shop's index Revolution Slider", NCM_I18N_DOMAIN) . ":</p>";
    echo "</div>";
}

// the text output for the 4th section
function ncm_tab_shop_section_4_text()
{
    echo "</div>";
    echo '<div class="postbox">';
    echo "<h3 class='box-title'>" . __("Layer Slider", NCM_I18N_DOMAIN) . "</h3>";
    echo "<div class='box-description'>";
    echo "<p>" . __("Customize the information about the Shop's index Layer Slider", NCM_I18N_DOMAIN) . ":</p>";
    echo "</div>";
}

// the text output for the 5th section
function ncm_tab_shop_section_5_text()
{
    echo "</div>";
    echo '<div class="postbox">';
    echo "<h3 class='box-title'>" . __("Sidebar Position", NCM_I18N_DOMAIN) . "</h3>";
    echo "<div class='box-description'>";
    echo "<p>" . __("Choose which side the Shop's sidebar will be set to", NCM_I18N_DOMAIN) . ":</p>";
    echo "</div>";
}

// the text output for the 6th section
function ncm_tab_shop_section_6_text()
{
    echo "</div>";
    echo '<div class="postbox">';
    echo "<h3 class='box-title'>" . __("Product Default View Mode", NCM_I18N_DOMAIN) . "</h3>";
    echo "<div class='box-description'>";
    echo "<p>" . __("Choose which view mode the products on the Shop page will be shown (note that this setting doesn't apply to sliders like the 'Best Sellers' or 'Recommended', etc)", NCM_I18N_DOMAIN) . ":</p>";
    echo "</div>";
}

// the text output for the 7th section
function ncm_tab_shop_section_7_text()
{
    echo "</div>";
    echo '<div class="postbox">';
    echo "<h3 class='box-title'>" . __("Shop Total Products", NCM_I18N_DOMAIN) . "</h3>";
    echo "<div class='box-description'>";
    echo "<p>" . __("Customize how many products will appear on the shop", NCM_I18N_DOMAIN) . ":</p>";
    echo "</div>";
}

// the text output for the 8th section
function ncm_tab_shop_section_8_text()
{
    echo "</div>";
    echo '<div class="postbox">';
    echo "<h3 class='box-title'>" . __("Shop Features", NCM_I18N_DOMAIN) . "</h3>";
    echo "<div class='box-description'>";
    echo "<p>" . __("Customize which features should be active on your shop", NCM_I18N_DOMAIN) . ":</p>";
    echo "</div>";
}

// the text output for the 9th section
function ncm_tab_shop_section_9_text()
{
    echo "</div>";
    echo '<div class="postbox">';
    echo "<h3 class='box-title'>" . __("Products", NCM_I18N_DOMAIN) . "</h3>";
    echo "<div class='box-description'>";
    echo "<p>" . __("Customize the layout of the products (inside the loop)", NCM_I18N_DOMAIN) . ":</p>";
    echo "</div>";
}

// validate the input for the Shop tab
function ncm_tab_shop_validate($input)
{
    // SECTION 1
    $return["phone_number"] = sanitize_text_field($input["phone_number"]);
    $return["shop_address"] = $input["shop_address"];

    // SECTION 2
    $return["shop_latitude"] = sanitize_text_field($input["shop_latitude"]);
    $return["shop_longitude"] = sanitize_text_field($input["shop_longitude"]);
    $return["shop_map_zoom"] = sanitize_text_field($input["shop_map_zoom"]);
    $return["shop_map_zoom_max"] = sanitize_text_field($input["shop_map_zoom_max"]);
    $return["shop_map_zoom_min"] = sanitize_text_field($input["shop_map_zoom_min"]);
    $return["shop_map_key"] = sanitize_text_field($input["shop_map_key"]);

    /*
    // SECTION 3
    $return["shopindex_revslider_default"] = sanitize_text_field($input["shopindex_revslider_default"]);
    $return["shopindex_revslider_alias"] = sanitize_text_field($input["shopindex_revslider_alias"]);

    // SECTION 4
    $return["shopindex_layerslider_default"] = sanitize_text_field($input["shopindex_layerslider_default"]);
    $return["shopindex_layerslider_id"] = sanitize_text_field($input["shopindex_layerslider_id"]);
    */

    // SECTION 5
    $return["sidebar_position"] = sanitize_text_field($input["sidebar_position"]);

    // SECTION 6
    $return["default_view_mode"] = sanitize_text_field($input["default_view_mode"]);

    // SECTION 7
    $return["products_main_count"] = sanitize_text_field($input["products_main_count"]);
    $return["products_sliders_count"] = sanitize_text_field($input["products_sliders_count"]);

    // SECTION 8
    $return["enable_faq"] = sanitize_text_field($input["enable_faq"]);
    $return["enable_contact"] = sanitize_text_field($input["enable_contact"]);
    $return["enable_products_custom_review"] = sanitize_text_field($input["enable_products_custom_review"]);
    $return["enable_slides_recommended"] = sanitize_text_field($input["enable_slides_recommended"]);
    $return["enable_slides_special_offers"] = sanitize_text_field($input["enable_slides_special_offers"]);
    $return["enable_slides_best_sellers"] = sanitize_text_field($input["enable_slides_best_sellers"]);
    $return["enable_grid_list_toggle"] = sanitize_text_field($input["enable_grid_list_toggle"]);

    // SECTION 9
    $return["product_layout_margin_bottom"] = sanitize_text_field($input["product_layout_margin_bottom"]);

    /*
    $return["enable_revslider"] = sanitize_text_field($input["enable_revslider"]);
    $return["enable_layerslider"] = sanitize_text_field($input["enable_layerslider"]);
    */

    return $return;
}

?>