(function ($) {
  'use strict';

  var colorClass;

  function externalEvents(elm) {
    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
    // it doesn't need to have a start or end
    var eventObject = {
      title: $.trim(elm.text()), // use the element's text as the event title
      className: elm.data('class')
    };

    // store the Event Object in the DOM element so we can get to it later
    elm.data('eventObject', eventObject);

    // make the event draggable using jQuery UI
    elm.draggable({
      zIndex: 999,
      revert: true, // will cause the event to go back to its
      revertDuration: 0 //  original position after the drag
    });
  }

  $('.event-type > li > a').on('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    colorClass = $(this).data('class');

    $('.event-type').find('a').removeClass('active');

    $(this).addClass('active');
  });

  $('.new-event-form').submit(function (e) {

    if (typeof colorClass === 'undefined') {
      colorClass = 'primary';
    }

    var newEvent = $('.new-event').val(),
      markup = $('<div class=\'external-event event-' + colorClass + '\' data-class=\'event-' + colorClass + '\'>' + newEvent + '</div>');

    if (newEvent !== '') {
      $('.external-events').append(markup);

      externalEvents(markup);

      $('.new-event').val('');
    }

    e.preventDefault();
    e.stopPropagation();
  });

  // initialize the external events
  $('#external-events div.external-event').each(function () {
    externalEvents($(this));
  });

  // initialize the calendar
  $('.fullcalendar').fullCalendar({
    defaultView: 'month',
    header: {
      left: 'title',
      right: 'month,agendaWeek,agendaDay today prev,next'
    },
    buttonIcons: {
      prev: ' fa fa-caret-left',
      next: ' fa fa-caret-right',
    },
    editable: true,
    droppable: true, // this allows things to be dropped onto the calendar !!!
    axisFormat: 'h:mm',
    columnFormat: {
      month: 'ddd', // Mon
      week: 'ddd D', // Mon 7
      day: 'dddd M/d', // Monday 9/7
      agendaDay: 'dddd D'
    },
    allDaySlot: false,
    drop: function (date) { // this function is called when something is dropped

      // retrieve the dropped element's stored Event Object
      var originalEventObject = $(this).data('eventObject');

      // we need to copy it, so that multiple events don't have a reference to the same object
      var copiedEventObject = $.extend({}, originalEventObject);

      // assign it the date that was reported
      copiedEventObject.start = date;

      // render the event on the calendar
      // the last `true` argument determines if the event 'sticks' (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
      $('.fullcalendar').fullCalendar('renderEvent', copiedEventObject, true);

      // is the 'remove after drop' checkbox checked?
      if ($('#drop-remove').is(':checked')) {
        // if so, remove the element from the 'Draggable Events' list
        $(this).remove();
      }

    },
    defaultDate: moment().format('YYYY-MM-DD'),
    aspectRatio: 1.5,
    events: [
      {
        title: 'Go Shopping',
        start: moment().format('YYYY-MM-DD'),
        className: 'event-success'
            },
      {
        title: 'Launch Product',
        start: moment(moment().format('YYYY-MM-DD')).subtract(1, 'day').format('YYYY-MM-DD'),
        className: 'event-primary'
            },
      {
        title: 'Meeting',
        start: moment(moment().format('YYYY-MM-DD')).subtract(6, 'day').format('YYYY-MM-DD'),
        end: moment(moment().format('YYYY-MM-DD')).subtract(3, 'day').format('YYYY-MM-DD'),
        className: 'event-info'
            },
      {
        title: 'Lunch',
        start: moment(moment().format('YYYY-MM-DD')).add(4, 'day').format('YYYY-MM-DD'),
        className: 'event-warning'
            },
      {
        title: 'Go to link',
        url: 'http://nyasha.me/',
        start: moment(moment().format('YYYY-MM-DD')).add(8, 'day').format('YYYY-MM-DD'),
        className: 'event-danger'
            }
        ]
  });

})(jQuery);
