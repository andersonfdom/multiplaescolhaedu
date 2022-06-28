<?php
	/* LIBRARY - CONTACT */

	// generates the response for the contact page
	function ncm_contact_form_generate_response($type, $message) {	
		global $response;
		
		if($type == "success") 
			$response = "<div class='ncm-message success'>$message</div>";
		else 
			$response = "<div class='ncm-message error'>$message</div>";
	}
	
	// switches a key for a value on the email's body
	function ncm_contact_form_switch_key_email_body($key, $value, $body) {	
		return str_replace(html_entity_decode($key), $value, $body);
	}
?>