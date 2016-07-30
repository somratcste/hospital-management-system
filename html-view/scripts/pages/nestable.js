(function ($) {
  'use strict';

  // activate Nestable for list 1
  $('#nestable').nestable({
    group: 1
  });

  // activate Nestable for list 2
  $('#nestable2').nestable({
    group: 1
  });

  $('#nestable3').nestable();

})(jQuery);
