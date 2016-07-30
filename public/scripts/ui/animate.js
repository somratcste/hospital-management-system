(function ($) {
  'use strict';

  /* Animation API */
  var animationTarget = $('[data-animation]'),
    countTarget = $('.count'),
    progressBarTarget = $('.progress-bar');

  // Animate.css
  if ($.fn.onScreen && animationTarget.length) {
    //run animation when in viewport
    animationTarget.onScreen({
      doIn: function () {
        if ($(this).hasClass('animation--done')) {
          return;
        }
        var $this = $(this),
          animation = $this.data('animation') || 'fadeIn',
          delay = $this.data('delay') || 0;

        setTimeout(function () {
          $this.addClass('animation--done animated ' + animation);
        }, delay);
      }
    });
  } else if (animationTarget.length) {
    animationTarget.each(function () {
      if ($(this).hasClass('animation--done')) {
        return;
      }
      var $this = $(this),
        animation = $this.data('animation') || 'fadeIn',
        delay = $this.data('delay') || 0;

      setTimeout(function () {
        $this.addClass('animation--done animated ' + animation);
      }, delay);
    });
  }

  // Animated numbers
  if ($.fn.onScreen && countTarget.length) {
    /* count up when in viewport */
    countTarget.each(function () {
      var $this = $(this);
      $this.onScreen({
        doIn: function () {
          $this.countTo({
            onComplete: function () {
              $this.removeClass('count');
            }
          });
        },
      });
    });
  } else if (countTarget.length) {
    countTarget.each(function () {
      var $this = $(this);
      $this.countTo({
        onComplete: function () {
          $this.removeClass('count');
        }
      });
    });
  }

  // Animated progress bars
  if ($.fn.onScreen && progressBarTarget.length) {
    /* animate width when in viewport */
    progressBarTarget.onScreen({
      doIn: function () {
        if ($(this).hasClass('animation--done')) {
          return;
        }
        var $this = $(this),
          percent = $this.data('percent');
        $this.addClass('animation--done').animate({
          width: Math.ceil(percent) + '%'
        }, 800, 'easeInCubic');
      }
    });
  } else if (progressBarTarget.length) {
    progressBarTarget.each(function () {
      if ($(this).hasClass('animation--done')) {
        return;
      }
      var $this = $(this),
        percent = $this.data('percent');
      $this.addClass('animation--done').animate({
        width: Math.ceil(percent) + '%'
      }, 800, 'easeInCubic');
    });
  }

})(jQuery);
