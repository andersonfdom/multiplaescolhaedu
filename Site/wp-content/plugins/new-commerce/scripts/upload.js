jQuery(document).ready(function($) {
	$("#ncm_favicon_upload_logo_button").click(function() {
		tb_show("Upload a logo", "media-upload.php?referer=ncm-page-custom-settings&type=image&TB_iframe=true&post_id=0", false);
		return false;
	});
	
	window.send_to_editor = function(html) {
		var image_url = $("img", html).attr("src");
		$("#ncm_favicon").val(image_url);
		tb_remove();
		$("#ncm_favicon_preview_upload_logo_preview img").attr("src", image_url);
		$("#submit").trigger("click");
	}
});