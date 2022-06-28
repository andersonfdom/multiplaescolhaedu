(function($) {
    "use strict";

    $(document).ready(function() {
        $('.new_commerce_import').click(function () {
            var $import_true = confirm('Proceed with the import of the New-Commerce\'s dummy content? It will overwrite all the existing data.');

            if ($import_true == false) return;

            $('.import_message').html('Data is being imported please be patient, while the awesomeness is being created :)');
            var data = {
                'action': 'my_action'
            };

            // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
            $.post(ajaxurl, data, function (response) {
                $('.import_message').html('<div class="import_message_success">' + response + '</div>');
            });
        });
    });

})(jQuery);