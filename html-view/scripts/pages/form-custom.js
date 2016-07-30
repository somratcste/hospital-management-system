(function ($) {
  'use strict';

  // Color picker
  $('.color-picker').colorpicker();
  $('.color-picker2').colorpicker({
    horizontal: true
  });

  // Timepicker
  $('.time-picker').timepicker();

  // Clockpicker
  $('.clockpicker').clockpicker({
    donetext: 'Done'
  });

  // Input tags
  $('#tags').tagsInput({
    width: 'auto'
  });

  // Chosen plugin
  $('.chosen').chosen();
  $('.chosen-select').chosen({
    disable_search_threshold: 10
  });

  // Checkbo plugin
  $('.checkbo').checkBo();

  // Telephone input plugin
  $('.telephone-input').intlTelInput();

  // Spinners
  $('.spinner1').TouchSpin({
    initval: 0
  });

  $('.spinner2').TouchSpin({
    initval: 0,
    buttondown_class: 'btn btn-success',
    buttonup_class: 'btn btn-success'
  });

  // Daterange picker
  $('.drp').daterangepicker({
    format: 'YYYY-MM-DD',
    startDate: '2015-01-01',
    endDate: '2015-12-31'
  });

})(jQuery);
