(function ($) {
  'use strict';

  /* Define some variables */
  var $window = $(window),
    body = $('body'),
    app = $('.app'),
    mainPanel = $('.main-panel');

  /* Debouncer */
  function debounce(func, wait, immediate) {
    var timeout;
    return function() {
      var context = this, args = arguments;
      var later = function() {
        timeout = null;
        if (!immediate) {
          func.apply(context, args);
        }
      };
      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) {
        func.apply(context, args);
      }
    };
  }

  /* Toggle chat sidebar */
  var toggleChat = $('[data-toggle=layout-chat-open], [data-toggle=chat-dismiss]'),
    toggleChatBox = $('.chat-users #chat-list a, .chat-back'),
    isChatOpen = false,
    chatSidebar = $('.app > .chat-panel');

  function toggleChatSidebar() {

    if (isChatOpen) {
      app.removeClass('layout-chat-open');
    } else {
      app.addClass('layout-chat-open');
    }
    isChatOpen = !isChatOpen;
  }

  toggleChat.on('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    toggleChatSidebar();
  });

  toggleChatBox.on('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    chatSidebar.toggleClass('conversation-open');
  });

  $('.chat-input').keydown(function (e) {
    if (e.keyCode === 13) {
      e.preventDefault();

      var message = $(this).text();

      if (message === '') {
        return;
      }

      $('.chat-conversation-content').append('<div class=\'chat-conversation-user them\'><div class=\'chat-conversation-message\'><p>' + $(this).text() + '</p></div></div>');

      $(this).text('');
    }
  });


  /* Misc Toggles */
  var toggleActive = $('.toggle-active'),
    toggleSidebarPanel = $('[data-toggle=layout-small-menu]'),
    toggleQuickLaunchPanel = $('[data-toggle=quick-launch-panel]');

  toggleActive.on('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).toggleClass('active');
  });

  toggleSidebarPanel.on('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    app.toggleClass('layout-small-menu');
    if (app.hasClass('layout-small-menu')) {
      destroyScrollbars();
    }
    else if ($(window).width() > 768 && !psTarg.hasClass('ps-container')) {
      console.log('init');
      initScrollbars();
    }
  });

  toggleQuickLaunchPanel.on('click', function (e) {
    e.preventDefault();
    if (!body.hasClass('layout-quick-launch-panel')) {
      body.css({transition: '300ms cubic-bezier(.7,0,.3,1)'}).addClass('layout-quick-launch-panel stop-scrolling');
    }
    else {
      body.removeClass('layout-quick-launch-panel');
      debounce(function() {
        body.removeClass('stop-scrolling').css({transition: ''});
      }, 300);
    }
    window.scrollTo(0, 0);
  });

  $('.scroll-up').on('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    $('html,body').stop().animate({
      scrollTop: body.offset().top
    }, 1000);
    return false;
  });


  /* Smooth scroll to id */
  var smoothScroll = $('.smooth-scroll');

  smoothScroll.on('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html,body').stop().animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });

  /* Toggle Offscreen menu */
  var offscreenToggleBtn = $('[data-toggle=offscreen]'),
    offscreenDirection,
    offscreenDirectionClass,
    rapidClickCheck = false,
    isOffscreenOpen = false;

  function toggleMenu() {

    if (isChatOpen) {
      toggleChatSidebar();
    }

    if (isOffscreenOpen) {
      app.removeClass('offscreen move-left move-right');
    } else {
      app.addClass('offscreen ' + offscreenDirectionClass);
    }
    isOffscreenOpen = !isOffscreenOpen;

    rapidClickFix();
  }

  function rapidClickFix() {
    debounce(function() {
      rapidClickCheck = false;
    }, 300);
  }

  offscreenToggleBtn.on('click', function (e) {

    e.preventDefault();

    e.stopPropagation();

    offscreenDirection = $(this).data('move') ? $(this).data('move') : 'ltr';

    if (offscreenDirection === 'rtl') {
      offscreenDirectionClass = 'move-right';
    } else {
      offscreenDirectionClass = 'move-left';
    }

    if (rapidClickCheck) {
      return;
    }

    rapidClickCheck = true;

    toggleMenu();

  });

  mainPanel.on('click', function (e) {
    var target = e.target;

    if (isOffscreenOpen && target !== offscreenToggleBtn) {
      toggleMenu();
    }
  });

  /* Sidebar sub-menus */
  $('.sidebar-panel nav a').on('click', function (e) {

    var $this = $(this),
      links = $this.parents('li'),
      parentLink = $this.closest('li'),
      otherLinks = $('.sidebar-panel nav li').not(links),
      subMenu = $this.next();

    if (!subMenu.hasClass('sub-menu')) {
      toggleMenu();
      return;
    }

    if (app.hasClass('layout-small-menu') && parentLink.parent().hasClass('nav') && $(window).width() > 768) {
      return;
    }

    otherLinks.removeClass('open');

    if (subMenu.is('ul') && (subMenu.height() === 0)) {
      parentLink.addClass('open');
    } else if (subMenu.is('ul') && (subMenu.height() !== 0)) {
      parentLink.removeClass('open');
    }

    if ($this.attr('href') === '#') {
      e.preventDefault();
    }

    updateScrollbars();

    if (subMenu.is('ul')) {
      return false;
    }

    e.stopPropagation();

    return true;
  });

  $('.sidebar-panel').find('> li > .sub-menu').each(function () {
    if ($(this).find('ul.sub-menu').length > 0) {
      $(this).addClass('multi-level');
    }
  });

  $('.sidebar-panel').find('.sub-menu').each(function () {
      $(this).parent('li').addClass('menu-accordion');
  });

  var psTarg = $('.sidebar-panel > nav');

  function initScrollbars () {
    if (app.hasClass('layout-small-menu') || app.hasClass('layout-static-sidebar') || app.hasClass('layout-boxed')) {
      return;
    }

    $('.sidebar-panel > nav').perfectScrollbar({
      wheelPropagation: true,
      suppressScrollX: true
    });
  }

  function destroyScrollbars () {
    psTarg.perfectScrollbar('destroy').removeClass();
  }

  function updateScrollbars () {
    if (psTarg.hasClass('ps-container')) {
      psTarg.perfectScrollbar('update');
    }
  }

  initScrollbars();

  var watchScrollbars = debounce(function() {
    if (767 >= window.innerWidth) {
      if (psTarg.hasClass('ps-container')) {
        destroyScrollbars();
      }
      return;
    }
    else {
      if (!psTarg.hasClass('ps-container')) {
        initScrollbars();
      }
      return;
    }
  }, 300);

  window.addEventListener('resize', watchScrollbars);

})(jQuery);
