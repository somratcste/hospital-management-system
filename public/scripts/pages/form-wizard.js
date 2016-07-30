(function ($) {
  'use strict';

  // Credit card form
  $('#commentForm').card({container: '.card'});

  // Checkbo plugin
  $('.checkbo').checkBo();

  // Chosen plugin
  $('.chosen').chosen({
    disable_search_threshold: 10
  });

  // Jquery validator
  var $validator = $('#commentForm').validate({
    rules: {
      emailfield: {
        required: true,
        email: true,
        minlength: 3
      },
      namefield: {
        required: true,
        minlength: 3
      },
      passwordfield: {
        required: true,
        minlength: 6
      },
      cpasswordfield: {
        required: true,
        minlength: 6,
        equalTo: '#passwordfield'
      },
      description: {
        required: true
      },
      number: {
        required: true
      },
      name: {
        required: true
      },
      expiry: {
        required: true
      },
      cvc: {
        required: true
      }
    }
  });

  function checkValidation () {
    var $valid = $('#commentForm').valid();
    if (!$valid) {
      $validator.focusInvalid();
      return false;
    }
  }

  // Twitter bootstrap wizard
  $('#rootwizard').bootstrapWizard({
    tabClass: '',
    'nextSelector': '.button-next',
    'previousSelector': '.button-previous',
    onNext: checkValidation,
    onLast: checkValidation,
    onTabClick: checkValidation
  });

})(jQuery);
