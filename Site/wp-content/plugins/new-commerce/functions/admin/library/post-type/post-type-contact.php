<?php 
	/* POST TYPE - CONTACT */

	// register the contact post type
	function ncm_register_post_type_contact() {
		$labels = array(
			"name" => __("Contacts", NCM_I18N_DOMAIN),
			"singular_name" => __("Contact", NCM_I18N_DOMAIN),
			"add_new" => __("Add New", NCM_I18N_DOMAIN),
			"add_new_item" => __("Add New Contact", NCM_I18N_DOMAIN),
			"edit_item" => __("Edit Contact", NCM_I18N_DOMAIN),
			"new_item" => __("New Contact", NCM_I18N_DOMAIN),
			"all_items" => __("All Contacts", NCM_I18N_DOMAIN),
			"view_item" => __("View Contact", NCM_I18N_DOMAIN),
			"search_items" => __("Search Contacts", NCM_I18N_DOMAIN),
			"not_found" => __("No Contacts found", NCM_I18N_DOMAIN),
			"not_found_in_trash" => __("No Contacts found in Trash", NCM_I18N_DOMAIN), 
			"parent_item_colon" => "",
			"menu_name" => __("Contacts", NCM_I18N_DOMAIN)
	  	);
	  	$args = array(
			"labels" => $labels,
			"public" => false,
			"show_ui" => true,
			"rewrite" => array("slug" => "contact"),
			"capability_type" => "post",
			"hierarchical" => false,
			"menu_position" => 28,
			"menu_icon"	=> "dashicons-email-alt",
			"supports" => array("title"),
			"register_meta_box_cb" => "ncm_add_metabox_post_type_contact"
	  	); 
    	register_post_type("contact", $args);
	}

	// adds the contact metabox
	function ncm_add_metabox_post_type_contact() {
		add_meta_box("ncm_add_metabox_post_type_contact_output", __("Contact Settings", NCM_I18N_DOMAIN), "ncm_add_metabox_post_type_contact_output", "contact", "normal", "default");
	}
	
	// adds all necessary controls for the contact metabox
	function ncm_add_metabox_post_type_contact_output() {
		$sizeText = 50;
		
		echo "<table>";
		
		// nonce
		echo "<input type='hidden' name='_post_contact_nonce' id='post_contact_nonce' value='" . wp_create_nonce(admin_url()) . "' />";
		
		// Receiver
		$args = array(
			"label" 			=> __("Receiver(s)", NCM_I18N_DOMAIN)
		,	"handle" 			=> "_contact_receiver"
		,	"type"				=> "text"
		,	"index"				=> "contact_receiver"
		,	"size"				=> $sizeText
		,	"default"			=> get_bloginfo("admin_email")
		,	"second_td_output" 	=> __("Separate emails with a comma", NCM_I18N_DOMAIN)
		);
		ncm_admin_metabox_render_input($args);
		
		// Email Body
		$args = array(
			"label" 			=> __("Email Body", NCM_I18N_DOMAIN)
		,	"handle" 			=> "_contact_email_body"
		,	"type"				=> "textarea"
		,	"index"				=> "contact_email_body"
		,	"default"			=> 
			sprintf(
				__("Message sent: %1s \n From: %2s <%3s> \n Sent from blog '%4s'", NCM_I18N_DOMAIN)
			,	NCM_CONTACT_EMAIL_BODY_HOLDER_MESSAGE
			,	NCM_CONTACT_EMAIL_BODY_HOLDER_NAME
			,	NCM_CONTACT_EMAIL_BODY_HOLDER_EMAIL
			,	get_bloginfo("name")
			)
		,	"textarea_rows"		=> 5
		,	"textarea_cols"		=> 52
		,	"second_td_output" 	=> 
			sprintf(
				__("Keys for the body content are:<br />%1s (stands for the message sent);<br />%2s (stands for the name of the sender);<br />%3s (stands for the email of the sender);", NCM_I18N_DOMAIN)
			,	NCM_CONTACT_EMAIL_BODY_HOLDER_MESSAGE
			,	NCM_CONTACT_EMAIL_BODY_HOLDER_NAME
			,	NCM_CONTACT_EMAIL_BODY_HOLDER_EMAIL
			)
		);
		ncm_admin_metabox_render_input($args);
		
		// Send Button Alignment
		$args = array(
			"label" 			=> __("Send Button Alignment", NCM_I18N_DOMAIN)
		,	"handle" 			=> "_contact_align_send_button"
		,	"type"				=> "combo"
		,	"combo"				=> 	
			array (
				NCM_CONTACT_BUTTON_POS_ALIGN_L	=> __("Left Align", NCM_I18N_DOMAIN)
			,	NCM_CONTACT_BUTTON_POS_ALIGN_C	=> __("Center Align", NCM_I18N_DOMAIN)
			,	NCM_CONTACT_BUTTON_POS_ALIGN_R	=> __("Right Align", NCM_I18N_DOMAIN)
			)
		,	"default"			=> NCM_CONTACT_BUTTON_POS_ALIGN_L
		,	"index"				=> "contact_align_send_button"
		,	"second_td_output" 	=> __("The alignment of the send button on the contact form", NCM_I18N_DOMAIN)
		);
		ncm_admin_metabox_render_input($args);
		
		// Sucess Message
		$args = array(
			"label" 			=> __("Success Message", NCM_I18N_DOMAIN)
		,	"handle" 			=> "_contact_success_message"
		,	"type"				=> "text"
		,	"index"				=> "contact_success_message"
		,	"default"			=> __("Thanks! Your message has been sent.", NCM_I18N_DOMAIN)
		,	"size"				=> $sizeText
		);
		ncm_admin_metabox_render_input($args);
		
		// Error Message - Email format
		$args = array(
			"label" 			=> __("Message for bad email format", NCM_I18N_DOMAIN)
		,	"handle" 			=> "_contact_error_message_bad_format"
		,	"type"				=> "text"
		,	"index"				=> "contact_error_message_bad_format"
		,	"default"			=> __("The email address is invalid.", NCM_I18N_DOMAIN)
		,	"size"				=> $sizeText
		,	"second_td_output" 	=> __("The message used when the user inputs an incorrect email format", NCM_I18N_DOMAIN)
		);
		ncm_admin_metabox_render_input($args);
		
		// Error Message - Email not sent
		$args = array(
			"label" 			=> __("Message for email not sent", NCM_I18N_DOMAIN)
		,	"handle" 			=> "_contact_error_message_not_sent"
		,	"type"				=> "text"
		,	"index"				=> "contact_error_message_not_sent"
		,	"default"			=> __("The message couldn't be sent. Please, try again.", NCM_I18N_DOMAIN)
		,	"size"				=> $sizeText
		,	"second_td_output" 	=> __("The message used when the system can't send the email of contact", NCM_I18N_DOMAIN)
		);
		ncm_admin_metabox_render_input($args);
		
		// Error Message - Missing content
		$args = array(
			"label" 			=> __("Message for missing content", NCM_I18N_DOMAIN)
		,	"handle" 			=> "_contact_error_message_missing_content"
		,	"type"				=> "text"
		,	"index"				=> "contact_error_message_missing_content"
		,	"default"			=> __("Please supply all information.", NCM_I18N_DOMAIN)
		,	"size"				=> $sizeText
		,	"second_td_output" 	=> __("The message used when the user didn't input all the necessary information", NCM_I18N_DOMAIN)
		);
		ncm_admin_metabox_render_input($args);
		
		// Use This?
		$args = array(
			"label" 			=> __("Active", NCM_I18N_DOMAIN)
		,	"handle" 			=> "_contact_use"
		,	"type"				=> "checkbox"
		,	"index"				=> "contact_use"
		,	"default"			=> 1
		,	"second_td_output" 	=> __("Use this contact configuration", NCM_I18N_DOMAIN)
		);
		ncm_admin_metabox_render_input($args);	
		
		echo "</table>";
	}

?>