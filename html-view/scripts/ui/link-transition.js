(function ($) {
  'use strict';

  /* Page fade out transitions on anchor click */
  var linkLocation,
    transitionAnchor = $('a.transition');

  function redirectPage() {
    $(window).location = linkLocation;
  }
  transitionAnchor.on('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    linkLocation = this.href;
    $('body').fadeOut(1000, redirectPage);
    return;
  });


})(jQuery);
