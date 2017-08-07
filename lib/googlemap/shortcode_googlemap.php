<?php

/*
  Shortcode Name: d4googlemap
  Usage: [d4googlemap api_key="" address=""]
  Version: 1.1.0
  Author: D4 Adv. Media
  License: GPL2
*/

function shortcode_d4googlemap( $atts ) {
    $attr = shortcode_atts( array(
      'api_key'         =>'',
      'address'         =>'',
      'pins'            =>'',
      'locationtext'    =>'',
      'click_activate'  =>'true',
    ), $atts );

    if ($attr['address'] == '') {
      $attr['address'] = do_shortcode('[socialbox key="addr1" style="text"]|[socialbox key="addr2" style="text"]');
    }

    if ($attr['locationtext'] != '') {
          $locationtext_array = explode('|',$attr['locationtext']);
    } else {
        $locationtext_array = get_bloginfo( 'name', 'display' );
    }

    if ($attr['click_activate'] != 'true') {
      $clickbox = '';
    } else {
      $clickbox = "<style>
        #map:after {
          position: absolute;
          content: '';
          left: 0;
          right: 0;
          bottom: 0;
          top: 0;
          display: block;
          z-index: 99;
        }

        #map.usemap:after {
          display: none;
        }

      </style>

      <script>
      jQuery(document).ready(function ($) {
        $('#map').click(function () {
          $(this).addClass('usemap');
        });
      });
      </script>

      ";
    }

    if ($attr['pins'] != '') {
        $pin_array = explode('|',$attr['pins']);
    } else {
        $pin_array = array('pin.png');
    }

    if ($attr['api_key'] != '') {
      $api_key = $attr['api_key'];
    } else {
      $api_key = 'AIzaSyCyYncL5imWnSmhF1PXk5NckeM4dObSZ4k';
    }

    //Split the addresses into an array and generate the javascript for each address var
    $address_array = explode('|',$attr['address']);

    $a = 1;
    foreach($address_array as $address) {
      $cleanaddress = strip_tags(str_replace(array(" ",","),"+",$address));
      $address_vars .= 'var address_'.$a.' = "'.$address.'";';
      $geocoder_vars .= 'geocoder_'.$a.' = new google.maps.Geocoder();';

      $geocoder_script .= 'geocoder_'.$a.'.geocode({
          "address": address_'.$a.'
        }, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {

              var infowindow = new google.maps.InfoWindow({
                content: "<b>'.$locationtext_array[$a-1].'<br>" + address_'.$a.' + "</b><br/><a target=_blank href=https://www.google.com/maps/place/'.$link_address_1.'>Get Directions</a>",
                size: new google.maps.Size(150, 50)
              });

              var marker = new google.maps.Marker({
                position: results[0].geometry.location,
                map: map,
                icon: '.$pin_array.',
                title: address_'.$a.'
              });

              bounds.extend(marker.getPosition());
              map.fitBounds(bounds);

              google.maps.event.addListener(marker, "click", function() {
                infowindow.open(map, marker);
              });

            } else {
              alert("No results found");
            }
          } else {
            alert("Geocode was not successful for the following reason: " + status);
          }
        });';
        $a++;
    }


    $script = '<script async defer src="https://maps.googleapis.com/maps/api/js?key='.$api_key.'&callback=initMap"></script>';
    $script .= '<script type="text/javascript">
function initMap() {
  setTimeout(function(){
  var geocoder;
  var map;
  '.$address_vars.'
  '.$geocoder_vars.'
  var latlng = new google.maps.LatLng(39.4419013,-119.7892523);
  var bounds = new google.maps.LatLngBounds();
  var myOptions = {
    styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a0d6d1"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#dedede"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#dedede"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f1f1f1"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}],
    zoom:14,
    mapTypeControl: true,
    mapTypeControlOptions: {
      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
    },
    navigationControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById("map"), myOptions);

  '.$geocoder_script.'
  

 }, 2000); 
}
</script>';

    $output = '';
    $output .= $script;
    $output .= $clickbox;
    $output .= '<div id="map" style="cursor: pointer; height: 500px; width: 100%; position:relative"></div>';
    return $output;

}

add_shortcode( 'd4googlemap', 'shortcode_d4googlemap' );
?>