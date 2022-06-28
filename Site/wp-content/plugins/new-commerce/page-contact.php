<?php
/* 
Template Name: Contact
*/
?>

<?php get_header(); ?>

<?php do_action("ncm_contact_scripts"); ?>

<?php do_action("ncm_breadcrumb"); ?>

<?php
	global $ncm_options_shop, $ncm_options_blog;
    $showSidebar = isset($ncm_options_blog["enable_sidebar_on_contact"]) && $ncm_options_blog["enable_sidebar_on_contact"] == 1;

	$args = array (
		"post_type"		=> "ncm_contact_category",
		"orderby"		=> "title",
		"order" 		=> "ASC"
	);
	$query = new WP_Query($args);
	$categories = !empty($query->posts) ? $query->posts : array();

	$args = array (
		"post_type"		=> "contact",
		"meta_key" 		=> "_contact_use",
		"meta_value"	=> 1
	);
	$query = new WP_Query($args);

	if(!empty($query->posts)) :
		$contact = $query->posts[0];
		$response = "";
		
		$missing_content 	= get_post_meta($contact->ID, "_contact_error_message_missing_content", TRUE);
		$email_invalid   	= get_post_meta($contact->ID, "_contact_error_message_bad_format", TRUE);
		$message_not_sent  	= get_post_meta($contact->ID, "_contact_error_message_not_sent", TRUE);
		$message_sent    	= get_post_meta($contact->ID, "_contact_success_message", TRUE);
		
		$button_alignment 	= get_post_meta($contact->ID, "_contact_align_send_button", TRUE);
		$to 				= get_post_meta($contact->ID, "_contact_receiver", TRUE);
		
		$name 		= isset($_POST["message_name"]) ? $_POST["message_name"] : "";
		$subject 	= isset($_POST["message_subject"]) ? $_POST["message_subject"] : "";
		$email 		= isset($_POST["message_email"]) ? $_POST["message_email"] : "";
		$message 	= isset($_POST["message_text"]) ? $_POST["message_text"] : "";
		
		$headers = 
			'From: ' . $name . "<" . $email . ">\r\n" .
			'Reply-To: ' . $email . "\r\n";
		$body = get_post_meta($contact->ID, "_contact_email_body", TRUE);
		$body = ncm_contact_form_switch_key_email_body(NCM_CONTACT_EMAIL_BODY_HOLDER_MESSAGE, $message, $body);
		$body = ncm_contact_form_switch_key_email_body(NCM_CONTACT_EMAIL_BODY_HOLDER_NAME, $name, $body);
		$body = ncm_contact_form_switch_key_email_body(NCM_CONTACT_EMAIL_BODY_HOLDER_EMAIL, $email, $body);
		$body = "Department: " . ((isset($_POST["message_category"]) ? $_POST["message_category"] : "-") . "\n") . $body;
		
		if(isset($_POST["submitted"]) && $_POST["submitted"]) {
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				ncm_contact_form_generate_response("error", $email_invalid);
			}
			else {
				if(empty($name) || empty($message) || empty($subject)) {
					ncm_contact_form_generate_response("error", $missing_content);
				}
				else {
					$sent = wp_mail($to, $subject, strip_tags($body), $headers);
					if($sent) {
						ncm_contact_form_generate_response("success", $message_sent);
						$_POST["message_name"] = "";
						$_POST["message_subject"] = "";
						$_POST["message_email"] = "";
						$_POST["message_text"] = "";
					}
					else {
						ncm_contact_form_generate_response("error", $message_not_sent);
					}
				}
			}
		}
?>

<!-- content -->
<div class="container">
	<div class="row">
		<!-- contact -->
		<div class="<?php echo ($showSidebar ? 'span8' : 'span12'); ?> <?php echo ncm_set_blog_position_relative_to_sidebar(); ?>">
			<div id="wrapperBlog">
            	<div id="contact-form">
					<?php 
                        while (have_posts()) : 
                            the_post(); 
                            get_template_part("blog/content/content-specific-template", get_post_format()); 
                        endwhile;
                    ?>
                    
                    <?php if(ncm_isset_and_not_empty($ncm_options_shop["shop_latitude"]) && ncm_isset_and_not_empty($ncm_options_shop["shop_longitude"])) : ?>
                        <div id="map" class="patternBorderColorWithoutHover"></div>
						<?php do_action("ncm_contact_execute_script"); ?>
                    <?php endif; ?>
                    
                    <?php if(!empty($ncm_options_shop["shop_address"])) : ?>
                        <pre>
                            <p id="address"><?php echo $ncm_options_shop["shop_address"]; ?></p>
                        </pre>
                    <?php endif; ?>
                    
                    <?php echo $response; ?>
                    <form action="<?php the_permalink(); ?>" method="post">
                        <p>
                            <label for="name"><?php _e("Name", NCM_I18N_DOMAIN); ?>: <abbr class="required">*</abbr><br />
                                <input type="text" name="message_name" value="<?php echo ((isset($_POST["message_name"])) ? esc_attr($_POST["message_name"]) : ""); ?>">
                            </label>
                        </p>
                        
						<p>
                            <label for="message_subject"><?php _e("Subject", NCM_I18N_DOMAIN); ?>: <abbr class="required">*</abbr><br />
                                <input type="text" name="message_subject" value="<?php echo ((isset($_POST["message_subject"])) ? esc_attr($_POST["message_subject"]) : ""); ?>">
                            </label>
                        </p>
                        
                        <p>
                            <label for="message_email"><?php _e("Email", NCM_I18N_DOMAIN); ?>: <abbr class="required">*</abbr><br />
                                <input type="text" name="message_email" value="<?php echo ((isset($_POST["message_email"])) ? esc_attr($_POST["message_email"]) : ""); ?>">
                            </label>
                        </p>
                        
                        <p>
                            <label for="message_category"><?php _e("Department", NCM_I18N_DOMAIN); ?>:<br />
                            	<select name="message_category">
                                	<?php foreach($categories as $key => $category) : ?>
                                    	<?php 
										$name = $category->post_title;
										$first = ($category == $categories[0]);
										?>
                                    	<option <?php echo ($first ? "selected='selected'" : ""); ?> value="<?php echo $name; ?>"><?php echo $name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </label>
                        </p>
                        
                        <p>
                            <label for="message_text"><?php _e("Message", NCM_I18N_DOMAIN); ?>: <abbr class="required">*</abbr><br />
                                <textarea type="text" name="message_text"><?php echo ((isset($_POST["message_text"])) ? esc_attr($_POST["message_text"]) : ""); ?></textarea>
                            </label>
                        </p>
                        
                        <input type="hidden" name="submitted" value="1">
                        <p style="text-align: <?php echo $button_alignment; ?>"><input class="ncm-button" type="submit" value="<?php echo __("Send", NCM_I18N_DOMAIN); ?>"></p>
                    </form>
                    
                    <?php get_template_part("components/edit-post-link"); ?>
				</div>
			</div>
		</div>

        <?php if($showSidebar) : ?>
		    <?php do_action("ncm_blog_sidebar"); ?>
        <?php endif; ?>
	</div>
</div>

<?php endif; ?>

<?php get_footer(); ?>