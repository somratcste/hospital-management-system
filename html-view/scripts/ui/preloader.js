(function ($) {
  'use strict';

  /* Remove preloader once page is loaded */
  var pagePreloader = $('body > .pageload');

  $(window).on('load', function () {
    if ($.fn.onScreen && pagePreloader.length) {
      pagePreloader.onScreen({
        doIn: function () {
          if ($(this).hasClass('page-loaded')) {
            return;
          }
          pagePreloader.addClass('page-loaded');
        }
      });
    } else if (pagePreloader.length) {
      pagePreloader.addClass('page-loaded');
    }
  });


})(jQuery);
