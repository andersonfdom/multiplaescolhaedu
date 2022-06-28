<?php
	/* LIBRARY - CONTROL RENDERER */

	// outputs control input for admin backend
	function ncm_admin_page_render_input($args) {
		/* PARAMS
		- $handle = id do controle
		- $type = tipo do controle
		- $index = indíce do controle no array interno de valores
		- $size = tamanho do campo
		- $label_for = nome da label
		- $default = valor default do campo
		- $combo = valores de uma combo
		- $radio_pair = text/value de um controle radio
		- $textarea_rows = número de linhas do textarea
		- $textarea_cols = número de colunas do textarea
		- $second_td_output = output da segunda <td>
		- $js = custom javascript code to be put after the field
		- $hyp_href = hyperlink href
		- $hyp_text = hyperlink text
		- $default_font_name = font name
		- $spinner_max = valor máximo spinner
		- $spinner_min = valor mínimo spinner
		*/
		
		/* SUPORTE CAMPOS
		- textfield
		- textarea
		- tinymce
		- checkbox
		- radiobox
		- datepicker
		- colorpicker 
		- spinner (jQuery UI)
		- combo
		- upload
		- upload_preview
		- hyperlink
		- font
		*/
		
		$options = ncm_get_option_current();
		
		$handle = isset($args["handle"]) ? esc_attr($args["handle"]) : "";
		$type = isset($args["type"]) ? esc_attr($args["type"]) : "";
		$index = isset($args["index"]) ? esc_attr($args["index"]) : "";
		
		$size = (isset($args["size"]) ? esc_attr($args["size"]) : 0);
		$default = (isset($args["default"]) ? esc_attr($args["default"]) : "");
		$name = ncm_admin_options_current() . "[" . $index . "]";
		
		$value = ((isset($options[$index]) && !is_null($options[$index])) ? $options[$index] : $default);
		$valueText = (!empty($options[$index])) ? $options[$index] : $default;
		
		$textarea_rows = (isset($args["textarea_rows"]) ? esc_attr($args["textarea_rows"]) : "");
		$textarea_cols = (isset($args["textarea_cols"]) ? esc_attr($args["textarea_cols"]) : "");
			
		if($type == "text") {
			echo "<input id='$handle' name='$name' size='$size' type='text' value='$valueText' />";
		}
		if($type == "textarea") {
			echo "<textarea id='$handle' name='$name' rows='$textarea_rows' cols='$textarea_cols'>$valueText</textarea>";
		}
		else if($type == "tinymce") {
			$tinymce_settings = array(
				"textarea_name" 			=> $name
			,	"media_buttons"				=> FALSE
			,	"textarea_rows"				=> $textarea_rows
			,	"remove_linebreaks" 		=> FALSE
			,	"convert_newlines_to_brs" 	=> TRUE
			);
			 
			wp_editor($value, $handle, $tinymce_settings);
		}
		else if($type == "checkbox") {
			echo "<input id='$handle' name='$name' type='checkbox' value='1' " . (($value == 1) ? "checked='checked'" : "") . " />";
		}
		else if($type == "radio") {
			$radio_pair = $args["radio_pair"];
			
			echo "<input id='$handle' name='$name' type='radio' value='" . $radio_pair["value"] . "' " . (($value == $radio_pair["value"]) ? "checked='checked'" : "") . " />  " . $radio_pair["text"];
		}
		else if($type == "datepicker") {
			ncm_load_datepicker_assets();

			echo "<input id='$handle' name='$name' size='$size' type='text' value='$value' />";
			echo "
			<script type='text/javascript'>
			$('#" . $handle . "').datepicker({
				changeMonth: true,
				changeYear: true
			});
			</script>";
		}
		else if($type == "colorpicker") {
			ncm_load_colorpicker_assets();
			
			echo "<input id='$handle' name='$name' size='$size' type='text' value='$value' />";
			echo "<input id='" . $handle . "_demo' type='text' readonly='readonly' size='" . ($size - 6) . "'/>";
			echo "<input type='button' id='" . $handle . "_reset' value='Default' class='button-secondary' />";
			echo "
			<script type='text/javascript'>
				jQuery(document).ready(function($) {
					var element = $('#" . $handle . "_demo');
					element.css('background-color', ('#" . $value . "'));
					element.css('color', ('#" . $value . "'));
				
					$('#" . $handle . "').ColorPicker({
						onSubmit: function(hsb, hex, rgb, el) {
							$(el).val(hex);
							$(el).ColorPickerHide();
							
							var prev = $('#" . $handle . "_demo');
							$(prev).css('background-color', ('#' + hex));
							$(prev).css('color', ('#' + hex));
						},
						onBeforeShow: function() {
							$(this).ColorPickerSetColor(this.value);
						}
					})
					.bind('keyup', function() {
						$(this).ColorPickerSetColor(this.value);
						
						var demo = $('#" . $handle . "_demo');
						$(demo).css('background-color', ('#' + this.value));
						$(demo).css('color', ('#' + this.value));
					});
					
					$('#" . $handle . "_reset').click(function() {
						$('#" . $handle . "').val('$default');
						
						var prev = $('#" . $handle . "_demo');
						$(prev).css('background-color', ('#" .  $default . "'));
						$(prev).css('color', ('#" .  $default . "'));
					});
				});
			</script>";
		}
		else if($type == "spinner") {
			ncm_load_spinner_ui_assets();

			$min = isset($args["spinner_min"]) ? $args["spinner_min"] : NCM_UI_SPINNER_MIN;
			$max = isset($args["spinner_max"]) ? $args["spinner_max"] : NCM_UI_SPINNER_MAX;
			$step = NCM_UI_SPINNER_STEP;
			$format = NCM_UI_SPINNER_FORMAT;
			
			echo "<input id='$handle' name='$name' size='$size' type='text' value='$valueText' />";
			echo "
			<script type='text/javascript'>
				jQuery(document).ready(function($) {
					$('#" . $handle . "').spinner({
						min: $min,
						max: $max,
						step: $step,
						numberFormat: '$format'	
					});
					
					$('#" . $handle . "').change(function() {
						var min = $min;
						var max = $max;
						
						if(min < 1)
							min = 1;
						
						var value = jQuery(this).val();
						
						if(value < min || isNaN(value)) {
							jQuery(this).val(min);
						}
						else if(value > max) {
							jQuery(this).val(max);
						}
					});
				});
			</script>";
		}
		else if($type == "combo") {
			$combos = $args["combo"];

			echo "<select id='$handle' name='$name'>";
			foreach($combos as $key => $combo) {
				echo "<option value='$key' " . selected($value, $key) . ">" . $combo . "</option>";
			}
			echo "</select>";
		}
		else if($type == "upload") {
			ncm_load_uploader_assets();
			
			$delete_name = ncm_admin_options_current() . "[" . $index . "_delete_button]";
			
			echo "<input type='hidden' id='$handle' name='$name' value='$value' />";
			echo "<input id='" . $handle .  "_upload_logo_button' type='button' class='button' value='" . __("Upload an Image", NCM_I18N_DOMAIN) . "' />";
			
			if(!empty($value) && $value != NCM_FAVICON_URL) {
				echo "<input id='" . $handle . "_delete_logo_button' name='$name' type='submit' class='button button-delete' value='" . __("Delete the Image", NCM_I18N_DOMAIN) . "' />";
			}
		}
		else if($type == "upload_preview") {
            echo "<div id='" . $handle . "_upload_logo_preview' style='min-height: 100px;'>";
			echo 	"<img style='max-width: 100%;' src='$valueText' />";
			echo "</div>";
		}
		else if($type == "hyperlink") {
			$hyp_href = $args["hyp_href"];
			$hyp_text = $args["hyp_text"];

			echo "<a href='$hyp_href'>$hyp_text</a>";
		}
		else if($type == "font") {
			$default_font_name = "\'" . $args["default_font_name"] . "\'";
			
			$json_content = wp_remote_fopen(get_template_directory_uri() . "/functions/admin/library/google_fonts.json");
			$json_arr = json_decode($json_content, TRUE);
			$fonts = $json_arr["items"];
			
			echo "<link id='" . $handle . "_script' href='#' rel='stylesheet' type='text/css'>";
			
			echo "<select id='$handle' name='$name' class='fll'>";
			echo 	"<option value='$default'>" . __("Default Font", NCM_I18N_DOMAIN) . "</option>";
			foreach($fonts as $font) {
				echo "<option value='$font' " . selected($value, $font) . ">" . $font . "</option>";
			}
			echo "</select>";
			
			echo "<input type='text' class='fll font-preview' id='" . $handle . "_preview' value='" . __("This is the font preview text.", NCM_I18N_DOMAIN) . "' />";
			
			echo "
			<script type='text/javascript'>
				jQuery(document).ready(function($) {
					if('$valueText' == '$default') {
						$('#" . $handle . "_preview').attr('style', 'font-family: $default_font_name ;');
					}
					else {
						var font_value = '$valueText';
						
						$('#" . $handle . "_script').attr('href' , '" . NCM_GFONTS_HREF . "' + font_value);
						$('#" . $handle . "_preview').attr('style', 'font-family: \'$valueText\' ;');
					}
												
					$('#" . $handle . "').change(function() {
						var font_value = $(this).val();
						
						if(font_value == $default) {
							$('#" . $handle . "_preview').attr('style', 'font-family: $default_font_name ;');
						}
						else {
							$('#" . $handle . "_script').attr('href' , '" . NCM_GFONTS_HREF . "' + font_value);
							$('#" . $handle . "_preview').attr('style', 'font-family: \'' + font_value + '\';');
						}
					});
				});
			</script>";
		}
		
		// Outputs 2nd <TD>
		$second_td_output = (isset($args["second_td_output"])) ? $args["second_td_output"] : NULL;
		if(!is_null($second_td_output) && !empty($second_td_output))
			echo "<td><small>$second_td_output</small></td>";
			
		// Outputs the custom js
		$js = (isset($args["js"])) ? $args["js"] : NULL;
		if(!is_null($js) && !empty($js)) {
			echo "<script type='text/javascript'>";
			echo $js;
			echo "</script>";
		}
	}
	
	// outputs control input for post type metabox
	function ncm_admin_metabox_render_input($args) {
		/* PARAMS
		- $label = texto do controle
		- $label_for = nome da label
		- $handle = id do controle
		- $type = tipo do controle
		- $index = indíce do controle no array interno de valores
		- $size = tamanho do campo
		- $default = valor default do campo
		- $combo = valores de uma combo
		- $radio_pair = text/value de um controle radio
		- $textarea_rows = número de linhas do textarea
		- $textarea_cols = número de colunas do textarea
		- $second_td_output = output da segunda <td>
		- $spinner_max = valor máximo spinner
		- $spinner_min = valor mínimo spinner
		*/
		
		/* SUPORTE CAMPOS
		- textfield
		- textarea
		- checkbox
		- combo
		- datepicker
		- spinner (jQuery UI)
		*/
		
		global $post;
		
		$label = esc_attr($args["label"]);
		$label_for = (isset($args["label_for"]) ? esc_attr($args["label_for"]) : "");
		
		$handle = esc_attr($args["handle"]);
		$type = esc_attr($args["type"]);
		$index = esc_attr($args["index"]);
		
		$size = (isset($args["size"]) ? esc_attr($args["size"]) : 0);
		$default = (isset($args["default"]) ? esc_attr($args["default"]) : "");
		
		$values = array($index => get_post_meta($post->ID, $handle, TRUE));
		$value = ((isset($values[$index]) && !is_null($values[$index]) && !is_edit_page("new")) ? $values[$index] : $default);
		
		$textarea_rows = (isset($args["textarea_rows"]) ? esc_attr($args["textarea_rows"]) : "");
		$textarea_cols = (isset($args["textarea_cols"]) ? esc_attr($args["textarea_cols"]) : "");			
		
		echo "<tr>";
		
		echo "<td class='col-1'><label for='$label_for'>$label</label></td>";
		
		echo "<td class='col-2'>";
		if($type == "text") {
			echo "<input type='text' id='$handle' name='$handle' value='$value' size='$size' />";
		}
		else if($type == "textarea") {
			echo "<textarea id='$handle' name='$handle' rows='$textarea_rows' cols='$textarea_cols'>$value</textarea>";
		}
		else if($type == "datepicker") {
			ncm_load_datepicker_assets();
			
			echo "<input id='$handle' name='$handle' size='$size' type='text' value='$value' />";
			echo "
			<script type='text/javascript'>
			jQuery(document).ready(function($) {
				$('#" . $handle . "').datepicker({
					changeMonth: true,
					changeYear: true
				});
			});
			</script>";
		}
		else if($type == "checkbox") {
			echo "<input id='$handle' name='$handle' type='checkbox' value='1' " . (($value == 1) ? "checked='checked'" : "") . " />";
		}
		else if($type == "spinner") {
			ncm_load_spinner_ui_assets();

			$min = isset($args["spinner_min"]) ? $args["spinner_min"] : NCM_UI_SPINNER_MIN;
			$max = isset($args["spinner_max"]) ? $args["spinner_max"] : NCM_UI_SPINNER_MAX;
			$step = NCM_UI_SPINNER_STEP;
			$format = NCM_UI_SPINNER_FORMAT;
			
			echo "<input id='$handle' name='$handle' size='$size' type='text' value='$value' />";
			echo "
			<script type='text/javascript'>
				jQuery(document).ready(function($) {
					$('#" . $handle . "').spinner({
						min: $min,
						max: $max,
						step: $step,
						numberFormat: '$format'	
					});
					
					$('#" . $handle . "').change(function() {
						var min = $min;
						var max = $max;
						
						if(min < 1)
							min = 1;
						
						var value = jQuery(this).val();
						
						if(value < min || isNaN(value)) {
							jQuery(this).val(min);
						}
						else if(value > max) {
							jQuery(this).val(max);
						}
					});
				});
			</script>";
		}
		else if($type == "combo") {
			$combos = $args["combo"];

			echo "<select id='$handle' name='$handle'>";
			foreach($combos as $key => $combo) {
				echo "<option value='$key' " . selected($value, $key) . ">" . $combo . "</option>";
			}
			echo "</select>";
		}
		
		echo "</td>";		
		
		// Outputs 2nd <TD>
		$second_td_output = (isset($args["second_td_output"])) ? $args["second_td_output"] : NULL;
		if(!is_null($second_td_output) && !empty($second_td_output))
			echo "<td class='col-3'><small>$second_td_output</small></td>";
			
		echo "</tr>";
	}
?>