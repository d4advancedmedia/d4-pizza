<?php

/*
  Shortcode Name: d4googlemap
  Usage: [d4googlemap api_key="" address=""]
  Version: 1.0.0
  Author: D4 Adv. Media
  License: GPL2
*/

function shortcode_d4googlemap( $atts ) {
    $attr = shortcode_atts( array(
		  'api_key'         =>'',
			'address'         =>'',
      'pin_1'           =>'',
      'pin_2'           =>'',
      'locationtext_1'  =>'',
      'locationtext_2'  =>'',
		), $atts );

		if ($attr['address'] != '') {
			$address = $attr['address'];
		} else {
			$address_1 = do_shortcode('[socialbox key="addr1" style="text"]');
      $address_2 = do_shortcode('[socialbox key="addr2" style="text"]');
		}

    if ($attr['pin_1'] != '') {
        $pin_1 = $attr['pin_1'];
    } else {
        $pin_1 = plugins_url( 'pin.png' , __FILE__ );
    }

    if ($attr['pin_2'] != '') {
        $pin_2 = $attr['pin_2'];
    } else {
        $pin_2 = plugins_url( 'pin.png' , __FILE__ );
    }

    if ($attr['locationtext_1'] != '') {
        $locationtext_1 = $attr['locationtext_1'];
    } else {
        $locationtext_1 = get_bloginfo( 'name', 'display' );
    }

    if ($attr['locationtext_2'] != '') {
        $locationtext_2 = $attr['locationtext_2'];
    } else {
        $locationtext_2 = get_bloginfo( 'name', 'display' );
    }

    $cleanaddress_1 = strip_tags($address_1);
    $cleanaddress_2 = strip_tags($address_2);

    $link_address_1 = str_replace(array(" ",","),"+",$cleanaddress_1);
    $link_address_2 = str_replace(array(" ",","),"+",$cleanaddress_2);

    if ($attr['api_key'] != '') {
			$api_key = $attr['api_key'];
		} else {
      $api_key = 'AIzaSyCyYncL5imWnSmhF1PXk5NckeM4dObSZ4k';
    }


		$script = '<script async defer src="https://maps.googleapis.com/maps/api/js?key='.$api_key.'&callback=initMap"></script>';
		$script .= '<script type="text/javascript">
function initMap() {
  setTimeout(function(){
	var geocoder;
	var map;
	var address_1 = "'.$cleanaddress_1.'";
  var address_2 = "'.$cleanaddress_2.'";
  geocoder_1 = new google.maps.Geocoder();
  geocoder_2 = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng(-34.397, 150.644);
  var myOptions = {
    styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a0d6d1"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#dedede"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#dedede"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f1f1f1"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}],
    zoom:14,
    center: latlng,
    mapTypeControl: true,
    mapTypeControlOptions: {
      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
    },
    navigationControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById("map"), myOptions);
  if (geocoder_1) {
    geocoder_1.geocode({
      "address": address_1
    }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {

          var infowindow = new google.maps.InfoWindow({
            content: "<b>'.$locationtext_1.'<br>" + address_1 + "</b><br/><a target=_blank href=https://www.google.com/maps/place/'.$link_address_1.'>Get Directions</a>",
            size: new google.maps.Size(150, 50)
          });

          var marker = new google.maps.Marker({
            position: results[0].geometry.location,
            map: map,
            icon: "'.$pin_1.'",
            title: address_1
          });
          google.maps.event.addListener(marker, "click", function() {
            infowindow.open(map, marker);
          });

        } else {
          alert("No results found");
        }
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }
  if (geocoder_2) {
    geocoder_2.geocode({
      "address": address_2
    }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
          map.setCenter(results[0].geometry.location);

          var infowindow = new google.maps.InfoWindow({
            content: "<b>'.$locationtext_2.'<br>" + address_2 + "</b><br/><a target=_blank href=https://www.google.com/maps/place/'.$link_address_2.'>Get Directions</a>",
            size: new google.maps.Size(150, 50)
          });

          var marker = new google.maps.Marker({
            position: results[0].geometry.location,
            map: map,
            icon: "'.$pin_2.'",
            title: address_2
          });
          google.maps.event.addListener(marker, "click", function() {
            infowindow.open(map, marker);
          });

        } else {
          alert("No results found");
        }
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }
 }, 2000); 
}
</script>';

		$output = '';
		$output .= $script;
		$output .= '<div id="map" style="cursor: pointer; height: 500px; width: 100%;"></div>';
		return $output;
	}

add_shortcode( 'd4googlemap', 'shortcode_d4googlemap' );
?>