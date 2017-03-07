<?php

/*
  Shortcode Name: d4googlemap
  Usage: [d4googlemap api_key="" address=""]
  Version: 7Mar17
  Author: D4 Adv. Media
  License: GPL2
*/

function d4shortcode_googlemap( $atts ) {
		$attr = shortcode_atts( array(
			'api_key'=>'',
			'address'=>''
		), $atts );

		if ($attr['address'] != '') {
			$address = $attr['address'];
		} else {
			$address_1 = do_shortcode('[socialbox key="addr1" style="text"]');
      $address_2 = do_shortcode('[socialbox key="addr2" style="text"]');
		}

    //$address_1 = get_post_meta( '19','Address' , true);
    //$address_2 = get_post_meta( '21','Address' , true);

    $cleanaddress_1 = strip_tags($address_1);
    $cleanaddress_2 = strip_tags($address_2);

    $link_address_1 = str_replace(array(" ",","),"+",$cleanaddress_1);
    $link_address_2 = str_replace(array(" ",","),"+",$cleanaddress_2);

		//get the global api key set in the base theme plugin config file
    global $d4google_apikey;

    if ($attr['api_key'] != '') {
			$api_key = $attr['api_key'];
		} else {
      $d4google_apikey = 'AIzaSyCyYncL5imWnSmhF1PXk5NckeM4dObSZ4k';
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
            content: "<b>KAHL Office Design<br>" + address_1 + "</b><br/><a target=_blank href=https://www.google.com/maps/place/'.$link_address_1.'>Get Directions</a>",
            size: new google.maps.Size(150, 50)
          });

          var marker = new google.maps.Marker({
            position: results[0].geometry.location,
            map: map,
            icon: "'.get_template_directory_uri().'/img/pin-retail.png",
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
            content: "<b>KAHL Office Retail<br>" + address_2 + "</b><br/><a target=_blank href=https://www.google.com/maps/place/'.$link_address_2.'>Get Directions</a>",
            size: new google.maps.Size(150, 50)
          });

          var marker = new google.maps.Marker({
            position: results[0].geometry.location,
            map: map,
            icon: "'.get_template_directory_uri().'/img/pin-design.png",
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


		/*'<div class="contact-block">'.
			'<div class="one_half contact-left">'.
				'<div class="skivdiv-content">'.
					'<h1>Contact</h1>'.				
					do_shortcode('[socialbox key="addr1, phone1, email1" style="text"]').
					$title.
					$content.
			'</div>'.
		'</div>'.*/
	}

add_shortcode( 'd4googlemap', 'd4shortcode_map' );
?>