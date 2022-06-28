(function($) {
  "use strict";
  $(document).on("click", ".icon-remove", function() {
    $(this)
      .closest(".container")
      .remove();
  });
})(jQuery);
