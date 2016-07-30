(function ($) {
  'use strict';

  // Based off http://codyhouse.co/gem/custom-google-map/

  //set your google maps parameters
  var latitude = -29.8831577,
    longitude = 30.8624187,
    map_zoom = 14;

  //google map custom marker icon - .png fallback for IE11
  var is_internetExplorer11 = navigator.userAgent.toLowerCase().indexOf('trident') > -1;
  var marker_url = (is_internetExplorer11) ? 'images/cd-icon-location.png' : 'images/cd-icon-location.svg';

  //define the basic color of your map, plus a value for saturation and brightness
  var main_color = $.urbanApp.dark,
    saturation_value = -20,
    brightness_value = 5;

  //we define here the style of the map
  var style = [
    {
      //set saturation for the labels on the map
      elementType: 'labels',
      stylers: [
        {
          saturation: saturation_value
                }
            ]
        },
    { //poi stands for point of interest - don't show these lables on the map
      featureType: 'poi',
      elementType: 'labels',
      stylers: [
        {
          visibility: 'off'
                }
            ]
        },
    {
      //don't show highways lables on the map
      featureType: 'road.highway',
      elementType: 'labels',
      stylers: [
        {
          visibility: 'off'
                }
            ]
        },
    {
      //don't show local road lables on the map
      featureType: 'road.local',
      elementType: 'labels.icon',
      stylers: [
        {
          visibility: 'off'
                }
            ]
        },
    {
      //don't show arterial road lables on the map
      featureType: 'road.arterial',
      elementType: 'labels.icon',
      stylers: [
        {
          visibility: 'off'
                }
            ]
        },
    {
      //don't show road lables on the map
      featureType: 'road',
      elementType: 'geometry.stroke',
      stylers: [
        {
          visibility: 'off'
                }
            ]
        },
        //style different elements on the map
    {
      featureType: 'transit',
      elementType: 'geometry.fill',
      stylers: [
        {
          hue: main_color
                },
        {
          visibility: 'on'
                },
        {
          lightness: brightness_value
                },
        {
          saturation: saturation_value
                }
            ]
        },
    {
      featureType: 'poi',
      elementType: 'geometry.fill',
      stylers: [
        {
          hue: main_color
                },
        {
          visibility: 'on'
                },
        {
          lightness: brightness_value
                },
        {
          saturation: saturation_value
                }
            ]
        },
    {
      featureType: 'poi.government',
      elementType: 'geometry.fill',
      stylers: [
        {
          hue: main_color
                },
        {
          visibility: 'on'
                },
        {
          lightness: brightness_value
                },
        {
          saturation: saturation_value
                }
            ]
        },
    {
      featureType: 'poi.sport_complex',
      elementType: 'geometry.fill',
      stylers: [
        {
          hue: main_color
                },
        {
          visibility: 'on'
                },
        {
          lightness: brightness_value
                },
        {
          saturation: saturation_value
                }
            ]
        },
    {
      featureType: 'poi.attraction',
      elementType: 'geometry.fill',
      stylers: [
        {
          hue: main_color
                },
        {
          visibility: 'on'
                },
        {
          lightness: brightness_value
                },
        {
          saturation: saturation_value
                }
            ]
        },
    {
      featureType: 'poi.business',
      elementType: 'geometry.fill',
      stylers: [
        {
          hue: main_color
                },
        {
          visibility: 'on'
                },
        {
          lightness: brightness_value
                },
        {
          saturation: saturation_value
                }
            ]
        },
    {
      featureType: 'transit',
      elementType: 'geometry.fill',
      stylers: [
        {
          hue: main_color
                },
        {
          visibility: 'on'
                },
        {
          lightness: brightness_value
                },
        {
          saturation: saturation_value
                }
            ]
        },
    {
      featureType: 'transit.station',
      elementType: 'geometry.fill',
      stylers: [
        {
          hue: main_color
                },
        {
          visibility: 'on'
                },
        {
          lightness: brightness_value
                },
        {
          saturation: saturation_value
                }
            ]
        },
    {
      featureType: 'landscape',
      stylers: [
        {
          hue: main_color
                },
        {
          visibility: 'on'
                },
        {
          lightness: brightness_value
                },
        {
          saturation: saturation_value
                }
            ]

        },
    {
      featureType: 'road',
      elementType: 'geometry.fill',
      stylers: [
        {
          hue: main_color
                },
        {
          visibility: 'on'
                },
        {
          lightness: brightness_value
                },
        {
          saturation: saturation_value
                }
            ]
        },
    {
      featureType: 'road.highway',
      elementType: 'geometry.fill',
      stylers: [
        {
          hue: main_color
                },
        {
          visibility: 'on'
                },
        {
          lightness: brightness_value
                },
        {
          saturation: saturation_value
                }
            ]
        },
    {
      featureType: 'water',
      elementType: 'geometry',
      stylers: [
        {
          hue: main_color
                },
        {
          visibility: 'on'
                },
        {
          lightness: brightness_value
                },
        {
          saturation: saturation_value
                }
            ]
        }
    ];

  //set google map options
  var map_options = {
    scrollwheel: false,
    center: new google.maps.LatLng(latitude, longitude),
    zoom: map_zoom,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    styles: style,
  };

  //inizialize the map
  var map = new google.maps.Map(document.getElementById('google-container'), map_options);
  //add a custom marker to the map
  var marker = new google.maps.Marker({
    position: new google.maps.LatLng(latitude, longitude),
    map: map,
    visible: true,
    icon: marker_url,
  });


})(jQuery);
