(function ($) {
  'use strict';

  /* Panel controls */
  $('[data-toggle=panel-collapse]').on('click', function (e) {
    var parent = $(this).parents('.panel'),
      panelBody = parent.children('.panel-body');

    if (panelBody.is(':visible')) {
      parent.addClass('panel-collapsed');
      panelBody.slideUp(200);
    } else if (!panelBody.is(':visible')) {
      parent.removeClass('panel-collapsed');
      panelBody.slideDown(200);
    }
    e.preventDefault();
    e.stopPropagation();
  });

  $('[data-toggle=panel-refresh]').on('click', function (e) {
    var parent = $(this).parents('.panel');

    parent.addClass('panel-refreshing');
    window.setTimeout(function () {
      parent.removeClass('panel-refreshing');
    }, 3000);
    e.preventDefault();
    e.stopPropagation();
  });

  $('[data-toggle=panel-remove]').on('click', function (e) {
    var parent = $(this).parents('.panel');

    parent.addClass('animated zoomOut');

    parent.bind('animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd', function () {
      parent.remove();
    });

    e.preventDefault();
    e.stopPropagation();
  });

})(jQuery);
