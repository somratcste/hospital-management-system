(function ($) {
  'use strict';

  /* Accordion UI Element */
  var accordionBody = $('.accordion > .accordion-container > .accordion-body'),
    accordionTitleTarget = $('.accordion > .accordion-container > .accordion-title > a');

  if ($('.accordion').length) {
    accordionBody.hide();

    $('.accordion').each(function () {
      $(this).find('.accordion-body').first().show();
      $(this).find('.accordion-container').first().addClass('active');
    });
  }

  accordionTitleTarget.on('click', function (e) {
    e.preventDefault();
    e.stopPropagation();

    var thisParent = $(this).parent();

    if (!$(this).closest('.accordion').hasClass('accordion-toggle')) {
      $(this).closest('.accordion').find('.accordion-body').slideUp();
      $(this).closest('.accordion').find('.accordion-container').removeClass('active');
    }

    if (thisParent.next().css('display') !== 'block') {
      thisParent.next().slideDown();
      thisParent.parent().addClass('active');

      return false;
    } else if (thisParent.next().css('display') === 'block') {

      thisParent.next().slideUp();
      thisParent.parent().removeClass('active');

      return false;
    }
    return false;

  });

})(jQuery);
